<?php 
	include("database.php");

	$transaction = findByIdFromTable($_GET['id'], "transaction")->fetch_assoc();
	$accountFrom = findByIdFromTable($transaction["from_account"], "account") -> fetch_assoc();
	$accountTo = $transaction["to_account"];
	$currency = findByIdFromTable($accountFrom["currency_d"], "currency")->fetch_assoc();
?>

<div> 
	<h3> Transaction info </h3>
	<?php 
	echo
	"<div>
		<label>transaction id</label>
		<p>".$transaction["id"]."</p>
		<br>

		<label>date</label>
		<p>".$transaction["date"]."</p>
		<br>

		<label>from account</label>
		<p>".$transaction["from_account"]."
		<a href=account.php?id=".$accountFrom["id"].">link</a></p>
		<br>

		<label>to account</label>
		<p>".$transaction["to_account"]."
		<a href=account.php?id=".$accountTo.">link</a></p>
		<br>

		<label>currency</label>
		<p>".$currency["name"]."</p>
		<br>

		<label>amount</label>
		<p>".$transaction["amount"]."</p>
	</div>"
	?>
</div>