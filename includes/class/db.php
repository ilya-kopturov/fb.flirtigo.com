<?php
/**
 * Replaced original db with PEAR::MDB2
 * @see http://pear.php.net/manual/en/package.database.mdb2.php
 * @author Mateiaș Gâscaru
 *
 * $Id: db.php 529 2008-06-12 20:29:41Z andi $
 */

//include_once('/usr/share/pear/MDB2.php');
//include_once('/usr/share/pear/MDB2/Driver/mysql.php');
include_once($cfg['path']['dir_site'].'pear/MDB2.php');

include_once($cfg['path']['dir_site'].'MDB2/Driver/mysql.php');

class DFDB extends MDB2 {
	public function & factory($dsn, $options = false) {
		$dsninfo = MDB2::parseDSN($dsn);
		if (empty($dsninfo['phptype'])) {
			$err = & MDB2::raiseError(MDB2_ERROR_NOT_FOUND, null, null, 'no RDBMS driver specified');
			return $err;
		}

		$db = & new DFDB_Driver();
		$db->setDSN($dsninfo);
		MDB2::setOptions($db, $options);
		if (MDB2::isError($err = $db->connect())) return $err;

		return $db;
	}
}
class DFDB_Driver extends MDB2_Driver_mysql {
	public function __construct() {
		parent::__construct();
		$this->setFetchMode(MDB2_FETCHMODE_ASSOC);
	}

	public function get_var($query = null, $x = 0, $y = 0) {
		return $this->queryOne($query);
	}

	public function get_row($query = null, $output = ARRAY_A, $y = 0) {
		return $this->queryRow($query);
	}

	public function get_col($query = null, $x = 0) {}

	public function get_results($query = null, $output = ARRAY_A) {
		$result = $this->query($query);
		if (!MDB2::isResultCommon($result)) {
			return $result;
		}
		$all = $result->fetchAll($fetchmode, $rekey, $force_array, $group);
		$this->num_rows = $result->numRows();
		$result->free();
		return $all;
	}

	public function query($query) {
		return parent::query($query);
	}

	public function escape($text) {
		return parent::escape($text);
	}

	public function numRows() {
		return $this->num_rows;
	}

	public function close() {
		$this->disconnect();
	}
}

class db
{
	var $show_errors = True;
	var $num_queries = 0;
	var $last_query;
	var $col_info;

	function db($dbuser, $dbpassword, $dbname, $dbhost)
	{
		$this->conn = @mysql_connect($dbhost,$dbuser,$dbpassword);

		if ( ! $this->conn )
		{
			$this->print_error("<b>Database Connection Error!</b>");
        }

		$this->select($dbname);
	}

	function select($db)
	{
		if ( !@mysql_select_db($db,$this->conn))
		{
			$this->print_error("<b>Error selecting database: $db</b>");
		}
	}

	function close()
	{
		if ( $this->conn )
		{
			if ( $this->result )
			{
				@mysql_free_result($this->result);
			}

			$result = @mysql_close( $this->conn );

			return $result;
		}
		else
		{
			return FALSE;
		}
	}

	function escape($str)
	{
		return mysql_real_escape_string($str);
	}

	function print_error($str = "")
	{
		global $_SERVER;

		if ( !$str ) $str = mysql_error();

	    $SQL_ERROR[] = array(
							 "query" => $this->last_query,
							 "error_str"  => $str
							 );

		if ( $this->show_errors )
		{
			$message  = "<font color='red'>Sql/DB ERROR: " . mysql_errno() .
			             " $str</font><br>
			             Statement: \"$this->last_query\" in " . __FILE__ . ' line ' . __LINE__;

			if (defined('DEBUG')) die($message);

			foreach($_SERVER as $key => $value){
				$message .= "
				$key => $value,
				";
			}

			header("Location: http://www.flirtigo.com/sql_error.php");
			exit;
		}
		else
		{
			return false;
		}
	}

	function show_errors()
	{
		$this->show_errors = true;
	}

	function hide_errors()
	{
		$this->show_errors = false;
	}

	function flush()
	{
		$this->last_result = null;
		$this->col_info = null;
		$this->last_query = null;
	}

	function query($query)
	{
		$return_val = 0;
		$this->flush();
		$this->last_query = $query;
		$this->result = @mysql_query($query,$this->conn);
		$this->num_queries++;

		if ( mysql_error() )
		{
			$this->print_error();
			return false;
		}

		if ( preg_match("/^\\s*(insert|delete|update|replace) /i",$query) )
		{
			$this->rows_affected = mysql_affected_rows();

			if ( preg_match("/^\\s*(insert|replace) /i",$query) )
			{
				$this->insert_id = mysql_insert_id($this->conn);
			}
			$return_val = $this->rows_affected;
		}
		else
		{
			$i=0;
			while ($i < @mysql_num_fields($this->result))
			{
				$this->col_info[$i] = @mysql_fetch_field($this->result);
				$i++;
			}

			$num_rows=0;
			while ( $row = @mysql_fetch_object($this->result) )
			{
				$this->last_result[$num_rows] = $row;
				$num_rows++;
			}

			@mysql_free_result($this->result);

			$this->num_rows = $num_rows;

			$return_val = $this->num_rows;
		}

		return $return_val;
	}

	function get_var($query=null,$x=0,$y=0)
	{
		if ( $query )
		{
			$this->query($query);
		}

		if ( $this->last_result[$y] )
		{
			$values = array_values(get_object_vars($this->last_result[$y]));
		}

		return (isset($values[$x]) && $values[$x]!=='')?$values[$x]:null;
	}

	function get_row($query=null,$output=ARRAY_A,$y=0)
	{
		if ( $query )
		{
			$this->query($query);
		}

		if ( $output == OBJECT )
		{
			return $this->last_result[$y]?$this->last_result[$y]:null;
		}
		elseif ( $output == ARRAY_A )
		{
			return $this->last_result[$y]?get_object_vars($this->last_result[$y]):null;
		}
		elseif ( $output == ARRAY_N )
		{
			return $this->last_result[$y]?array_values(get_object_vars($this->last_result[$y])):null;
		}
		else
		{
			$this->print_error(" \$db->get_row(string query, output type, int offset) -- Output type must be one of: OBJECT, ARRAY_A, ARRAY_N");
		}
	}

	function get_col($query=null,$x=0)
	{
		if ( $query )
		{
			$this->query($query);
		}

		for ( $i=0; $i < count($this->last_result); $i++ )
		{
			$new_array[$i] = $this->get_var(null,$x,$i);
		}

		return $new_array;
	}

	function get_results($query=null, $output = ARRAY_A)
	{
		if ( $query )
		{
			$this->query($query);
		}

		if ( $output == OBJECT )
		{
			return $this->last_result;
		}
		elseif ( $output == ARRAY_A || $output == ARRAY_N )
		{
			if ( $this->last_result )
			{
				$i=0;
				foreach( $this->last_result as $row )
				{
					if ( $output == ARRAY_A )
					{
						$new_array[$i] = get_object_vars($row);
					}
					else
					{
						if($row->name){
							$new_array[$row->id] = $row->name;
						} else {
							$new_array[$row->id] = $row->whisper;
						}
					}

					$i++;
				}

				return $new_array;
			}
			else
			{
				return null;
			}
		}
	}

	function get_col_info($info_type="name",$col_offset=-1)
	{
		if ( $this->col_info )
		{
			if ( $col_offset == -1 )
			{
				$i=0;

				foreach($this->col_info as $col )
				{
					$new_array[$i] = $col->{$info_type};
					$i++;
				}

				return $new_array;
			}
			else
			{
				return $this->col_info[$col_offset]->{$info_type};
			}
		}
	}

}

