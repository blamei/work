<?php
	$tireqty = 0; //$_POST['tireqty'];
	$oilqty = 0; //$_POST['oilqty'];
	$sparkqty = 0; //$_POST['sparkqty'];
?>
<html>
	<meta charset="UTF-8">
	<head>
		<title>Bob's Auto Parts - Order Results</title>
	</head>
	<body>
		<h1>Bob's Auto Parts</h1>
		<h2>Order Results</h1>
		<?php
			echo "<p>Order processed at ".date('H:i, jS F Y')."</p>";
			
			echo "<p>Your order is as follows: </p>";
			echo $tireqty.' tires<br/>'; 
			echo $oilqty.' oilqty<br/>'; 
			echo $sparkqty.' sparkqty<br/>'; 
			
			$totalqty = 0;
			$totalqty = $tireqty + $oilqty + $sparkqty;
			echo "Items ordered: ".$totalqty."<br/>";
			$totalamount = 0.00;
			
			define('TIREPRICE', 100);
			define('OILPRICE', 10);
			define('SPARKPRICE', 4);
			
			$totalamount = $tireqty * TIREPRICE + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;
			
			echo "Subtotal: $".number_format($totalamount,3)."<br/>";
			
			$taxrate = 0.10;
			$totalamount = $totalamount * (1 + $taxrate);
			echo "Total including tax $".number_format($totalamount,2)."<br/>";
			
		?>
	</body>
</html>