<?php
	$tireqty = 0; //$_POST['tireqty'];
	$oilqty = 0; //$_POST['oilqty'];
	$sparkqty = 0; //$_POST['sparkqty'];
	$address = ""; //$_POST['address'];
	$date =date('H:i, js F Y');
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
			
			$totalqty = 0;
			$totalqty = $tireqty + $oilqty + $sparkqty;
			echo "Items ordered: ".$totalqty."<br/>";
						
			if($totalqty == 0){
				echo "You did not order anything on the previous page!<br/>";
			}else{
				if($tireqty > 0){
					echo $tireqty.' tires<br />';
				}
				if($oilqty > 0){
					echo $oilqty.' oilqty<br />'; 
				};
				if($sparkqty > 0){
					echo $sparkqty.' sparkqty<br />'; 
				}
			}
			
			$totalamount = 0.00;
			
			define('TIREPRICE', 100);
			define('OILPRICE', 10);
			define('SPARKPRICE', 4);
			
			$totalamount = $tireqty * TIREPRICE 
						 + $oilqty * OILPRICE 
						 + $sparkqty * SPARKPRICE;
			
			echo "Subtotal: $".number_format($totalamount,3)."<br/>";
			
			$taxrate = 0.10;
			$totalamount = $totalamount * (1 + $taxrate);
			echo "Total including tax $".number_format($totalamount,2)."<br/>";
			
		?>
	</body>
</html>