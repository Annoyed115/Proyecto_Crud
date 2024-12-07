<?php 
include "db_conn.php";
include "req/read.php";
if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $user = readById($conn, $id);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proyecto CRUD - Actualizar</title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Lexend:wght@100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
      <div class="form-holder">
      	<a href="index.php" class="link">Ver | Buscar</a>
      	<form action="req/update.php"
      	      method="POST">
            <?php if (isset($_GET['error'])) { ?>
            	<p class="error">
            		<?=htmlspecialchars($_GET['error'])?>
            	</p>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
            	<p class="success">
            		<?=htmlspecialchars($_GET['success'])?>
            	</p>
            <?php } ?>
      	    
      		<label>Nombre</label>
      		<input type="text" 
                         name="first_name"
                         value="<?=$user['first_name']?>"><br>

      		<label>Apellido</label>
      		<input type="text" 
                         name="last_name"
                         value="<?=$user['last_name']?>"> <br>

      		<label>Email</label>
      		<input type="text" 
                         name="email"
                         value="<?=$user['email']?>"> <br>

                  <input type="text" 
                         name="id" 
                         value="<?=$user['id']?>"
                         hidden>

            <button type="submit" class="btn-create">Actualizar</button>
      	</form>
      </div>
</body>
</html>
<?php }else {
      header("Location: index.php");
} ?>