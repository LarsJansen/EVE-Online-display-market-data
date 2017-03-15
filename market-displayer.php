<?php
$servername = "localhost";
$username = "xxxxx";
$password = "xxxxx";
$dbname = "xxxxx";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

//========== PLEX ==========
$plex = "SELECT id, date, buy_per, buy_vol, sell_per, sell_vol FROM larsja5_eve_data.29668 ORDER BY ID DESC LIMIT 1";
$plexresult = $conn->query($plex);

$old_plex = "SELECT id, date, buy_per, buy_vol, sell_per, sell_vol FROM larsja5_eve_data.29668 ORDER BY ID DESC LIMIT 2";
$old_plexresult = $conn->query($old_plex);

if ($plexresult->num_rows > 0) {

    while($row = $plexresult->fetch_assoc()) {

	$counter=0;
	while($row1 = $old_plexresult->fetch_assoc())
	{
		$counter++;
		if($counter==2)
		{
			$old_buy_per=$row1["buy_per"];
			$old_buy_per=number_format((float)( $row["buy_per"] - $old_buy_per ) / $old_buy_per, 3, '.', '');
			
			$old_buy_vol=$row1["buy_vol"];
			$old_buy_vol=number_format((float)( $row["buy_vol"] - $old_buy_vol ) / $old_buy_vol, 3, '.', '');
			
			$old_sell_per=$row1["sell_per"];
			$old_sell_per=number_format((float)( $row["sell_per"] - $old_sell_per ) / $old_sell_per, 3, '.', '');
			
			$old_sell_vol=$row1["sell_vol"];
			$old_sell_vol=number_format((float)( $row["sell_vol"] - $old_sell_vol ) / $old_sell_vol, 3, '.', '');
			
		}
	}

if ($old_buy_per <= 0) { $obp_posneg = 'negative'; } else { $obp_posneg = 'positive'; }
if ($old_buy_vol <= 0) { $obv_posneg = 'negative'; } else { $obv_posneg = 'positive'; }
if ($old_sell_per <= 0) { $osp_posneg = 'negative'; } else { $osp_posneg = 'positive'; }
if ($old_sell_vol <= 0) { $osv_posneg = 'negative'; } else { $osv_posneg = 'positive'; }
	
	
	
	if ($plexresult->num_rows > 0) {
		
		echo "<li><a href='/eve-markets/' style='font-family: monospace;'><img src='/wp-content/uploads/29668_32.png'>PLEX: Buy " . $row["buy_per"]. " <span class='value-" . $obp_posneg . "'>" . $old_buy_per. "%</span> / Vol " . $row["buy_vol"]. " <span class='value-" . $obv_posneg . "'>" .$old_buy_vol. "%</span> / Sell " . $row["sell_per"]. " <span class='value-" . $osp_posneg . "'>" . $old_sell_per. "%</span> / Vol " . $row["sell_vol"]. " <span class='value-" . $osv_posneg . "'>" . $old_sell_vol . "%</span></a></li>";

	}
	else
	{
		echo "<li><a href='/eve-markets/' style='font-family: monospace;'><img src='/wp-content/uploads/29668_32.png'>PLEX: Buy " . $row["buy_per"]. " / 100% - Vol " . $row["buy_vol"]. " / 100% - Sell " . $row["sell_per"]. " / 100% - Vol " . $row["sell_vol"]. " / 100%</a></li>";

	}
		
    }
	
} else {
    echo "0 results";
}

//========== QUAFEZERO ==========
$quafe = "SELECT id, date, buy_per, buy_vol, sell_per, sell_vol FROM larsja5_eve_data.3898 ORDER BY ID DESC LIMIT 1";
$quaferesult = $conn->query($quafe);

$old_quafe = "SELECT id, date, buy_per, buy_vol, sell_per, sell_vol FROM larsja5_eve_data.3898 ORDER BY ID DESC LIMIT 2";
$old_quaferesult = $conn->query($old_plex);

if ($quaferesult->num_rows > 0) {

    while($row = $quaferesult->fetch_assoc()) {

		$counter=0;
	while($row1 = $old_quaferesult->fetch_assoc())
	{
		$counter++;
		if($counter==2)
		{
			$old_buy_per=$row1["buy_per"];
			$old_buy_per=number_format((float)( $row["buy_per"] - $old_buy_per ) / $old_buy_per, 3, '.', '');
			
			$old_buy_vol=$row1["buy_vol"];
			$old_buy_vol=number_format((float)( $row["buy_vol"] - $old_buy_vol ) / $old_buy_vol, 3, '.', '');
			
			$old_sell_per=$row1["sell_per"];
			$old_sell_per=number_format((float)( $row["sell_per"] - $old_sell_per ) / $old_sell_per, 3, '.', '');
			
			$old_sell_vol=$row1["sell_vol"];
			$old_sell_vol=number_format((float)( $row["sell_vol"] - $old_sell_vol ) / $old_sell_vol, 3, '.', '');
		}
	}

if ($old_buy_per <= 0) { $obp_posneg = 'negative'; } else { $obp_posneg = 'positive'; }
if ($old_buy_vol <= 0) { $obv_posneg = 'negative'; } else { $obv_posneg = 'positive'; }
if ($old_sell_per <= 0) { $osp_posneg = 'negative'; } else { $osp_posneg = 'positive'; }
if ($old_sell_vol <= 0) { $osv_posneg = 'negative'; } else { $osv_posneg = 'positive'; }



	if ($quaferesult->num_rows > 0) {
		
		echo "<li><a href='/eve-markets/' style='font-family: monospace;'><img src='/wp-content/uploads/3898_32.png'>Quafezero: Buy " . $row["buy_per"]. " <span class='value-" . $obp_posneg . "'>" . $old_buy_per. "%</span> / Vol " . $row["buy_vol"]. " <span class='value-" . $obv_posneg . "'>" .$old_buy_vol. "%</span> / Sell " . $row["sell_per"]. " <span class='value-" . $osp_posneg . "'>" . $old_sell_per. "%</span> / Vol " . $row["sell_vol"]. " <span class='value-" . $osv_posneg . "'>" . $old_sell_vol . "%</span></a></li>";

	}
	else
	{
		echo "<li><a href='/eve-markets/' style='font-family: monospace;'><img src='/wp-content/uploads/3898_32.png'>Quafezero: Buy " . $row["buy_per"]. " / 100% - Vol " . $row["buy_vol"]. " / 100% - Sell " . $row["sell_per"]. " / 100% - Vol " . $row["sell_vol"]. " / 100%</a></li>";

	}
    }
} else {
    echo "0 results";
}

//========== EXTRACTORS ==========
$extractor = "SELECT id, date, buy_per, buy_vol, sell_per, sell_vol FROM larsja5_eve_data.40519 ORDER BY ID DESC LIMIT 1";
$extractorresult = $conn->query($extractor);

$old_extractor= "SELECT id, date, buy_per, buy_vol, sell_per, sell_vol FROM larsja5_eve_data.40519 ORDER BY ID DESC LIMIT 2";
$old_extractorresult = $conn->query($old_plex);

if ($extractorresult->num_rows > 0) {

    while($row = $extractorresult->fetch_assoc()) {

	$counter=0;
	while($row1 = $old_extractorresult->fetch_assoc())
	{
		$counter++;
		if($counter==2)
		{
			$old_buy_per=$row1["buy_per"];
			$old_buy_per=number_format((float)( $row["buy_per"] - $old_buy_per ) / $old_buy_per, 3, '.', '');
			
			$old_buy_vol=$row1["buy_vol"];
			$old_buy_vol=number_format((float)( $row["buy_vol"] - $old_buy_vol ) / $old_buy_vol, 3, '.', '');
			
			$old_sell_per=$row1["sell_per"];
			$old_sell_per=number_format((float)( $row["sell_per"] - $old_sell_per ) / $old_sell_per, 3, '.', '');
			
			$old_sell_vol=$row1["sell_vol"];
			$old_sell_vol=number_format((float)( $row["sell_vol"] - $old_sell_vol ) / $old_sell_vol, 3, '.', '');
		}
	}

if ($old_buy_per <= 0) { $obp_posneg = 'negative'; } else { $obp_posneg = 'positive'; }
if ($old_buy_vol <= 0) { $obv_posneg = 'negative'; } else { $obv_posneg = 'positive'; }
if ($old_sell_per <= 0) { $osp_posneg = 'negative'; } else { $osp_posneg = 'positive'; }
if ($old_sell_vol <= 0) { $osv_posneg = 'negative'; } else { $osv_posneg = 'positive'; }



	if ($extractorresult->num_rows > 0) {
		
		echo "<li><a href='/eve-markets/' style='font-family: monospace;'><img src='/wp-content/uploads/40519_32.png'>Skill Extractor: Buy " . $row["buy_per"]. " <span class='value-" . $obp_posneg . "'>" . $old_buy_per. "%</span> / Vol " . $row["buy_vol"]. " <span class='value-" . $obv_posneg . "'>" .$old_buy_vol. "%</span> / Sell " . $row["sell_per"]. " <span class='value-" . $osp_posneg . "'>" . $old_sell_per. "%</span> / Vol " . $row["sell_vol"]. " <span class='value-" . $osv_posneg . "'>" . $old_sell_vol . "%</span></a></li>";

	}
	else
	{
		echo "<li><a href='/eve-markets/' style='font-family: monospace;'><img src='/wp-content/uploads/40519_32.png'>Skill Extractor: Buy " . $row["buy_per"]. " / 100% - Vol " . $row["buy_vol"]. " / 100% - Sell " . $row["sell_per"]. " / 100% - Vol " . $row["sell_vol"]. " / 100%</a></li>";

	}
    }
} else {
    echo "0 results";
}

//========== INJECTORS ==========
$injector = "SELECT id, date, buy_per, buy_vol, sell_per, sell_vol FROM larsja5_eve_data.40520 ORDER BY ID DESC LIMIT 1";
$injectorresult = $conn->query($injector);

$old_injector = "SELECT id, date, buy_per, buy_vol, sell_per, sell_vol FROM larsja5_eve_data.40520 ORDER BY ID DESC LIMIT 2";
$old_injectorresult = $conn->query($old_injector);

if ($injectorresult->num_rows > 0) {

    while($row = $injectorresult->fetch_assoc()) {

		$counter=0;
	while($row1 = $old_injectorresult->fetch_assoc())
	{
		$counter++;
		if($counter==2)
		{
			$old_buy_per=$row1["buy_per"];
			$old_buy_per=number_format((float)( $row["buy_per"] - $old_buy_per ) / $old_buy_per, 3, '.', '');
			
			$old_buy_vol=$row1["buy_vol"];
			$old_buy_vol=number_format((float)( $row["buy_vol"] - $old_buy_vol ) / $old_buy_vol, 3, '.', '');
			
			$old_sell_per=$row1["sell_per"];
			$old_sell_per=number_format((float)( $row["sell_per"] - $old_sell_per ) / $old_sell_per, 3, '.', '');
			
			$old_sell_vol=$row1["sell_vol"];
			$old_sell_vol=number_format((float)( $row["sell_vol"] - $old_sell_vol ) / $old_sell_vol, 3, '.', '');
		}
	}

if ($old_buy_per <= 0) { $obp_posneg = 'negative'; } else { $obp_posneg = 'positive'; }
if ($old_buy_vol <= 0) { $obv_posneg = 'negative'; } else { $obv_posneg = 'positive'; }
if ($old_sell_per <= 0) { $osp_posneg = 'negative'; } else { $osp_posneg = 'positive'; }
if ($old_sell_vol <= 0) { $osv_posneg = 'negative'; } else { $osv_posneg = 'positive'; }



	if ($injectorresult->num_rows > 0) {
		
		echo "<li><a href='/eve-markets/' style='font-family: monospace;'><img src='/wp-content/uploads/40520_32.png'>Skill Injector: Buy " . $row["buy_per"]. " <span class='value-" . $obp_posneg . "'>" . $old_buy_per. "%</span> / Vol " . $row["buy_vol"]. " <span class='value-" . $obv_posneg . "'>" .$old_buy_vol. "%</span> / Sell " . $row["sell_per"]. " <span class='value-" . $osp_posneg . "'>" . $old_sell_per. "%</span> / Vol " . $row["sell_vol"]. " <span class='value-" . $osv_posneg . "'>" . $old_sell_vol . "%</span></a></li>";

	}
	else
	{
		echo "<li><a href='/eve-markets/' style='font-family: monospace;'><img src='/wp-content/uploads/40520_32.png'>Skill Injector: Buy " . $row["buy_per"]. " / 100% - Vol " . $row["buy_vol"]. " / 100% - Sell " . $row["sell_per"]. " / 100% - Vol " . $row["sell_vol"]. " / 100%</a></li>";

	}
    }
} else {
    echo "0 results";
}

$conn->close();
?>