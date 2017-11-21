<?php 
	include("database.php");

	$account = findByIdFromTable($_GET['id'], "account")->fetch_assoc();
	$user = findByIdFromTable($account["user_id"], "user")->fetch_assoc();
	$currency = findByIdFromTable($account["currency_d"], "currency")->fetch_assoc();
?>

<div> 
	<h3> Account info </h3>
	<?php 
	echo
	"<div>
		<label>name</label>
		<p>".$user["name"]."</p>
		<br>

		<label>surname</label>
		<p>".$user["surname"]."</p>
		<br>

		<label>middle name</label>
		<p>".$user["middle_name"]."</p>
		<br>

		<label>money</label>
		<p>".$account["amount"]."</p>
		<br>

		<label>currency</label>
		<p>".$currency["name"]."</p>
	</div>"
	?>
</div>