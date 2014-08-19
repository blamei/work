<html>
	<body>
		<table border="0" cellpadding="3">
			<tr>
				<td bgcolor="#CCCC" align="center">Distance</td>
				<td bgcolor="#CCCC" align="center">Cost</td>
			</tr>
			
			<?php
			/*
			$distance=50;
			
			while ($distance <= 250) {
			echo "	
			<tr>
				<td align=\"right\">".$distance."</td>
				<td align=\"right\">".($distance/10)."</td>
			</tr>\n";
			 
			 *  $distance+=50;	
			}		
			
			*/
			
			for($distance=50; $distance <= 250; $distance){
				echo "	
			<tr>
				<td align=\"right\">".$distance."</td>
				<td align=\"right\">".($distance/10)."</td>
			</tr>\n";
			 
				$distance+=50;	
			
			}
			
			?>
			
		</table>
	</body>
</html>