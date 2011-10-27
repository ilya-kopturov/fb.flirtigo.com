  {include file="site/dirtyflirting/login/menu.tpl"}
{php}
$ret = @ini_get("allow_url_fopen");
if (empty($ret)) {
  die("Please enable the PHP allow_url_fopen option\n\n");
}

$m_host ="auth.x2k.com";
$m_subscriberId = "178199204";
$m_secret = "130f282443";
$m_siteId = "29";
$m_mode = "site";
$m_url = sprintf("http://%s:%s@%s/auth/%s/%s", 
  urlencode($m_subscriberId), 
  urlencode($m_secret), 
  urlencode($m_host), 
  urlencode($m_mode), 
  urlencode($m_siteId));

$options = Array();
$options["mode"] = "url";
$options["ip"] = $_SERVER["REMOTE_ADDR"];

foreach($options as $key => $val) {
  $m_url .= sprintf("%s%s=%s", strpos($m_url, "?") === FALSE ? "?" : "&", urlencode($key), urlencode($val));
}

$m_ret = @file_get_contents($m_url);
if ($m_ret === FALSE) {
  printf("There was a problem communicating with the server. Please try again.");
} else {
//  syslog(LOG_INFO, var_export( $data["url",true));
  $data = @unserialize($m_ret);
    if ($data === FALSE) {
    printf("There was an internal error[a] on the server. Please try again.");
  } else if (!isset($data["url"])) {
    printf("There was an internal error[b] on the server. Please try again.");
  } else {
    $data["url"]=$data["url"].'?page=videos';
    syslog(LOG_INFO, var_export( $data["url"],true));
    header("HTTP/1.1 303 See Other"); 
    header("Location: ".$data["url"]);

   
  }
}

{/php}
