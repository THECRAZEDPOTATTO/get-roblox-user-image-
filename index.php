<?php
echo "Enter roblox user id >>> ";
$curn  = "https://api.roblox.com/currency/balance";
$usid = rtrim(fgets(STDIN));
$name = "https://users.roblox.com/v1/users/$usid";
$url = "https://thumbnails.roblox.com/v1/users/avatar?userIds=$usid&size=420x420&format=Png&isCircular=false";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo $resp;


$curl2 = curl_init($name);
curl_setopt($curl2, CURLOPT_URL, $name);
curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);

$headers2 = array(
   "Accept: application/json",
);
curl_setopt($curl2, CURLOPT_HTTPHEADER, $headers2);
//for debug only!
curl_setopt($curl2, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl2, CURLOPT_SSL_VERIFYPEER, false);

$resp2 = curl_exec($curl2);
curl_close($curl2);
echo $resp2;

$json = fopen("pic.json", "w") or die("Unable to open file!");
$txt1 = "$resp";
fwrite($json, $txt1);
fclose($json);
$json2 = fopen("user.json", "w") or die("Unable to open file!");
$txt2 = "$resp2";
fwrite($json2, $txt2);
fclose($json2);
?>
<?php

?>

