<?php
	include("database.php");
	$users = findAllFromTable("user");
	$accounts = findAllFromTable("account");
?>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<div>
	<table> 
		<tr> 
			<th colspan="3">User table</th>
			<th>Account table</th>
			<th>Currency table </th>
		</tr>
		<tr>
			<th>name</th>
			<th>surname</th>
			<th>middle name </th>
			<th>money</th>
			<th>currency</th>
		</tr>
		<?php 
			if ($users->num_rows > 0) {
    			while($account = $accounts->fetch_assoc()) {
    				$userId = $account["user_id"];
    				$user = findByIdFromTable($userId, "user")->fetch_assoc();
    				$currency = findByIdFromTable($account["currency_d"], "currency")-> fetch_assoc();
        			echo "<tr> 
        				<td>".$user["name"]."</td>
        				<td>".$user["surname"]."</td>
        				<td>".$user["middle_name"]."</td>
        				<td>".$account["amount"]."</td>
        				<td>".$currency["name"]."</td>
        			</tr>";
    		}
			} else {
   				echo "0 found";
			}
		?>
	</table>
</div>