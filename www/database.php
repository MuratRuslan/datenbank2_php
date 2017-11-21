<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "db2_bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

function findAllFromTable($tableName) {
	global $conn;
	$sql = "SELECT * FROM $tableName";
	return ($conn->query($sql));
}

function findByIdFromTable($id, $tableName) {
	global $conn;
	$sql = "SELECT * FROM $tableName WHERE id = $id";
	return ($conn->query($sql));
}

function findAccountsForCurrency($currencyId) {
	global $conn;
	$sql = "SELECT * from account where account.currency_d = $currencyId";
	return ($conn->query($sql));
}

function findTransactionsForAccount($accountId) {
	global $conn;
	$sql = "SELECT * from transaction where from_account = $accountId or to_account = $accountId";
	return ($conn->query($sql));
}
?>