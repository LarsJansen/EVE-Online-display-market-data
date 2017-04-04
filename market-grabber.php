<?php
$servername = "localhost";
$username = "xxxxx";
$password = "xxxxx";
$dbname = "xxxxx";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$typeids=array(29668,3898,40519,40520);
$url="http://api.eve-central.com/api/marketstat?regionlimit=10000002&typeid=".join('&typeid=',$typeids);
$pricexml=file_get_contents($url);
$xml=new SimpleXMLElement($pricexml);

foreach($typeids as $typeid)
{
    $item=$xml->xpath('/evec_api/marketstat/type[@id='.$typeid.']');
	$buyper= (float) $item[0]->buy->percentile;
	$buyvol= (float) $item[0]->buy->volume;
	$sellper= (float) $item[0]->sell->percentile;
 	$sellvol= (float) $item[0]->sell->volume;

	$result = "INSERT INTO `eve_data`.`$typeid` (`buy_per`, `buy_vol`, `sell_per`, `sell_vol`) VALUES ('$buyper','$buyvol','$sellper','$sellvol')";
	 
if (mysqli_query($conn, $result)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $result . "<br>" . mysqli_error($conn);
}
	
}
mysqli_close($conn);
?>
