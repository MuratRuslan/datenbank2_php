<?php
	include("database.php");
	$currencies = findAllFromTable("currency");
?>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<div>
	<table> 
		<tr> 
			<th>Currency table</th>
			<th>Account table</th>
		</tr>
		<tr>
			<th>currency</th>
			<th>accounts</th>
		</tr>
		<?php 
			if ($currencies->num_rows > 0) {
    			while($currency = $currencies->fetch_assoc()) {
    				echo "<tr>
    						<td>".$currency["name"]."</td>
    						<td>";
    				$accounts = findAccountsForCurrency($currency["id"]);
    				while ($account = $accounts->fetch_assoc()) {
    					echo "<span> <a href=account.php?id=".$account["id"].">".$account["id"]."</a> </span>";
    				}
        			echo "</td></tr>";
    		}
			} else {
   				echo "0 found";
			}
		?>
	</table>
</div>