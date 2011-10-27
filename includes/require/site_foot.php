<?php
/* $Id: site_foot.php 576 2008-06-19 08:36:52Z bogdan $ */

if (!defined('IN_MAINSITE')) die("Critical Error!");

$lu = LiveUser::getUser();
$db->close();
ob_end_flush(); 
?>
<?php
/* set page title*/
if(isset($_GET['tag'])){
	$pageTitle = "Horny Book - " . urldecode($_GET['tag']);
}elseif($lu['screenname']){
	$pageTitle = "Horny Book :: " . $lu['screenname'];
}else{
	$pageTitle = "Horny Book Adult Dating and Personals";
}
/* end set page title */
?>
<?php //if (!defined('DEBUG')): ?>
<?php if(!$_SESSION['sess_id']){?>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<?php }?>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-1817400-9");
pageTracker._trackPageview();
} catch(err) {}</script>
<? //endif; ?>
