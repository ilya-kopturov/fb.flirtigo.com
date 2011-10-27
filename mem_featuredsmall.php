<?php
/* DIRTYFLIRTING.COM                                                                         
                                                                                           
                                                                                           
                                                                                         */

define("IN_MAINSITE", TRUE);

include ("./includes/" . "require" . "/" . "site_head.php");





$featured = @$db->get_results("SELECT `id`, `screenname`, `country`, `city`, `typeloc`, `rating`
                               FROM `tblUsers` 
                               WHERE `featured` = 'Y'");



for($i=0; $i<count($featured); $i++)
{
	$table[$i] = "<table cellspacing=\"0\" cellpadding=\"0\" style=\"border: 0px;\">";
	  $table[$i] .= "<tr>";
	    $table[$i] .= "<td style=\"text-align: center; vertical-align: middle;\">";
	      $table[$i] .= "<a href=\"" . $cfg['path']['url_site'] . "profileid.php?profile=" . $featured[$i]['id'] . "\"
	                        target=\"_self\">
	                        <img src=\"" . $cfg['path']['url_site'] . "showphoto.php?id=" . $featured[$i]['id'] . "&m=Y&t=r&p=1\" style=\"border: 1px solid #FFFFFF; width: 75px; height: 75px;\" alt=\"" . $featured[$i]['screenname'] . "\" />
	                     </a> ";
	    $table[$i] .= "<td>";
	    
	    $table[$i] .= "<td style=\"text-align: left; vertical-align: middle; padding-left: 4px;\">";
	      $table[$i] .= "<div class=\"featuredBoxText\">";
	        $table[$i] .= "<a href=\"" . $cfg['path']['url_site'] . "profileid.php?profile=" . $featured[$i]['id'] . "\" target=\"_self\" class=\"featuredBoxLink\">" . $featured[$i]['screenname'] . "</a><br />";
	        $paramsr  = array("id" => $featured[$i]['id'],
	                         "screenname" => $featured[$i]['screenname'],
	                         "rating" => $featured[$i]['rating']);
	        $table[$i] .= smarty_rateme($paramsr) . "<br />";
	        
	        $paramsl  = array("country" => $featured[$i]['country'],"city"    => $featured[$i]['city'],
	                         "typeloc" => $featured[$i]['typeloc'],"type"    => "short");
	        $table[$i] .= smarty_location($paramsl) . "<br />";
	        
	        $views = $db->get_var("SELECT `photo_viewed` FROM `tblPhotos` 
	                               WHERE `user_id` = '" . $featured[$i]['id'] . "' 
	                               ORDER BY `photo_viewed` DESC LIMIT 1");
	        $table[$i] .= $views . " views" . "<br />";
	        
	        $paramso = array("user_id" => $featured[$i]['id']);
	        $table[$i] .= smarty_online($paramso);
	        
	      $table[$i] .= "</div>";
	    $table[$i] .= "</td>";
	  $table[$i] .= "</tr>";
	$table[$i] .= "</table>";
}

$html  = "<table cellspacing=\"0\" cellpadding=\"0\" style=\"border: 0px;\">";
  $html .= "<tr>";
    $html .= "<td>" . $table[0] . "</td>";
  $html .= "</tr>";
  $html .= "<tr>";
    $html .= "<td>" . $table[2] . "</td>";
  $html .= "</tr>";
  $html .= "<tr>";
    $html .= "<td>" . $table[1] . "</td>";
  $html .= "</tr>";
$html .= "</table>";

echo $html;
?>