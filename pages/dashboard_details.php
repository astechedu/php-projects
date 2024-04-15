<?php

include '../config/connection.php';

function NoOfCustomers($pdo){
  $sql = 'select *from users';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $users = $stmt->fetchAll(PDO::FETCH_COLUMN);
  return count($users);
}

$TotalNoOfCustomers = NoOfCustomers($pdo);


?>


<h1>No Of Customers:<?= $TotalNoOfCustomers ?></h1>