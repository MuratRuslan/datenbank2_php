<?php
	include("database.php");
	$accounts = findAllFromTable("account");
?>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<div>
	<table> 
		<tr> 
			<th>Account table</th>
			<th>Transaction table</th>
		</tr>
		<tr>
			<th>Account id</th>
			<th>Trasaction id</th>
		</tr>
		<?php 
			if ($accounts->num_rows > 0) {
    			while($account = $accounts->fetch_assoc()) {
    				echo "<tr>
    						<td><a href=account.php?id=".$account["id"].">".$account["id"]."</a></td>
    						<td>";
    				$transactions = findTransactionsForAccount($account["id"]);
    				while ($transaction = $transactions->fetch_assoc()) {
    					echo "<span> <a href=transaction.php?id=".$transaction["id"].">".$transaction["id"]."</a> </span>";
    				}
        			echo "</td></tr>";
    		}
			} else {
   				echo "0 found";
			}
		?>
	</table>
</div>