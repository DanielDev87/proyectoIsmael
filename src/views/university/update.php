<?php

i
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  
$id = $_POST['id'];
    
    $
$name = $_POST['name'];
    $city = $_POST['city'];

    

  
$sql = "UPDATE universities SET name = :name, city = :city WHERE id = :id";
    
    $
$stmt = $pdo->prepare($sql);
    
  
$stmt->execute(['name' => $name, 'city' => $city, 'id' => $id]);

    echo "Universidad actualizada con éxito.";
} 
} els
else {
    if (isset($_GET['id'])) {
        
      
$id = $_GET['id'];
        
     
$sql = "SELECT * FROM universities WHERE id = :id";
        
   
$stmt = $pdo->prepare($sql);
        
      
$stmt->execute(['id' => $id]);
        $university = $stmt->fetch();
    }
}

   
?>

<form action=

<"update.php" method="POST">
    <input type=
    <input 

    
"hidden" name="id" value="<?php echo $university['id']; ?>">
    Nombre de la universidad: <input type=
    Nombre de la universidad: <input t

    Nombre de la universidad:

    Nombre de la un
"text" name="name" value="<?php echo $university['name']; ?>" required><br>
    Ciudad: <input type=
    Ciudad: <input typ

    Ciudad: <

    
"text" name="city" value="<?php echo $university['city']; ?>" required><br>
    <input type=
    <input
"submit" value="Actualizar universidad">
</form>

</form>
``