$on = (bool)$_GET["on"];
$sat = (int)$_GET["sat"];
$bri = (int)$_GET["bri"];
$hue = (int)$_GET["hue"];

$arr = array('devicetype' => 'my_hue_app#iphone peter');


$url = 'http://192.168.0.4/api/';//hueブリッジのIPアドレスを指定
$data_json = json_encode($arr);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST'); 
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_json);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
curl_close($curl);

echo $url;
echo $data_json;
echo $response;
