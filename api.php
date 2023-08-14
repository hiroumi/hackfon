<?php

$com = $_GET["command"];

/*
$on = (bool)$_GET["on"];
$sat = (int)$_GET["sat"];
$bri = (int)$_GET["bri"];
*/
/*
$hue = (int)$_GET["hue"];
$username = $_GET["un"];
$ln = $_GET["ln"];
*/

$un = 'Qh4lRFiVe6uJGsR8eD1ZE-nSNB9mI3BmCTNewP1m';
$url = 'http://192.168.0.4/api/';

if ($com == "22") {
$on = (bool)false ;	
$arr = array('on' => $on);

$url . $un . '/lights/4/state'; 
$data_json = json_encode($arr);
$method = 'PUT';	
}

elseif ($com == "9") {
$pram = rand (1 , 100000);
$url = 'http://192.168.0.5:8888/api/blackbean/tv/power?p=' . $pram ; 
$method = 'GET';
}

elseif ($com == "3") {
$on = (bool)true ;
$sat = (int)254 ;
$bri = (int)200 ;

$method = 'PUT';
$hue = (int)60000;
$arr = array('on' => $on, 'sat' => $sat, 'bri' => $bri, 'hue' => $hue);
$url = 'http://192.168.0.4/api/' . $un . '/lights/4/state';
$data_json = json_encode($arr);
}

elseif ($com == "7") {
$on = (bool)true ;
$sat = (int)254 ;
$bri = (int)200 ;

$method = 'PUT';
$hue = (int)10000;
$arr = array('on' => $on, 'sat' => $sat, 'bri' => $bri, 'hue' => $hue);
$url = 'http://192.168.0.4/api/' . $un . '/lights/4/state';
$data_json = json_encode($arr);
}

else{
$on = (bool)true ;
$sat = (int)254 ;
$bri = (int)20 ;
$method = 'PUT';
$min = 1;
$max = 65000;
$hue = rand ( $min , $max );
$arr = array('on' => $on, 'sat' => $sat, 'bri' => $bri, 'hue' => $hue);
$url = 'http://192.168.0.4/api/' . $un . '/lights/4/state';
$data_json = json_encode($arr);
}

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method); // ¢¨
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json); // ¢¨
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

echo $url . '<br>' ;
echo $data_json . '<br>' ;
echo $response . '<br>' ;

?>
