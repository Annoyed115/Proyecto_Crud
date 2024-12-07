<?php 
include "db_conn.php";
include "req/read.php";
$users = read($conn);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proyecto CRUD</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lexend:wght@100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
	<div class="holder">
	<h2>Proyecto CRUD</h2>
       <a href="create.php" class="link">Crear</a>
      <?php if (isset($_GET['success'])) { ?>
     	<p class="success">
     	   <?=htmlspecialchars($_GET['success'])?>
     	</p>
     <?php } ?>
       <?php if ($users != 0) { ?>
        <table>
	<tr>
		<td>ID</td>
		<td>Nombre</td>
		<td>Apellido</td>
		<td>Email</td>
		<td>Acciones</td>
	</tr>	
       <?php	
        foreach ($users as $user) {
       	?>
      
	<tr>
		<td><?=$user['id']?></td>
		<td><?=$user['first_name']?></td>
		<td><?=$user['last_name']?></td>
		<td><?=$user['email']?></td>
		<td>
			<a href="update.php?id=<?=$user['id']?>" class="btn btn-update">Actualizar</a>
			<a href="req/delete.php?id=<?=$user['id']?>" class="btn btn-delete">Eliminar</a>
		</td>
	</tr>
       
       <?php } ?> 
       </table>
       <?php }else { ?>
       	<p class="error">ERROR: No data found in the Database.</p>
       <?php } ?>
       </div>
</body>
</html>