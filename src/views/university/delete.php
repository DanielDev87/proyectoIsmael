<?php

inc
include 'db.php';

if (isset($_GET['id'])) {
    
  
$id = $_GET['id'];

    $sql = "DELETE FROM universities WHERE id = :id";
    
    
$stmt = $pdo->prepare($sql);
    
  
$stmt->execute(['id' => $id]);

    echo "Universidad eliminada con éxito.";
}
?>