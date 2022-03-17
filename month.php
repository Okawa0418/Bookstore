<?php
require_once('database1.php');
$data1=new Database1();
$dbh = $data1->dbConnect();

$sql = "SELECT * FROM purchase";
$sth = $dbh -> query($sql);
$count = $sth -> rowCount();

echo $count.'件SELECTしました。';
?>