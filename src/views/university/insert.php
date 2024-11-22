<?php

incl
include 'db.php';



i
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    
    $

  
$city = $_POST['city'];

    

   
$sql = "INSERT INTO universities (name, city) VALUES (:name, :city)";
    
   
$stmt = $pdo->prepare($sql);
    
   
$stmt->execute(['name' => $name, 'city' => $city]);

    

  
echo "Universidad agregada con éxito.";
}
?>

<form action=

<
"create.php" method="POST">
    Nombre de la universidad: <input type=
    Nombre de la universidad: <input t

    Nombre de la universidad:

    Nombre de la uni

    
"text" name="name" required><br>
    Ciudad: <input type=
    Ciudad: <input type=

    Ciudad: <inpu

    Ciuda
"text" name="city" required><br>
    <input type=
    <input type=

    <input 

    <
"submit" value="Agregar universidad">
</form>