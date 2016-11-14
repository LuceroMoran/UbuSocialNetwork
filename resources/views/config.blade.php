<?php
session_start();
$user_id = $_SESSION['uid'];
// echo $user_id;
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/estilosperfil.css">
  <link rel="shortcut icon" href="Images/logo.png">
  <link rel="stylesheet" href="sweetalert/sweetalert.css">
  <title>Mi Perfil</title>

  <script type="text/javascript">
    var user_id = "<?php echo $user_id;?>"
  </script>
</head>
<body>
  <form action="upload" id="upload" enctype="multipart/form-data">
      <input type="file" name="file[]" multiple><br />
      <input type="submit">
  </form>
  <div id="msg"></div>

  <script src="js/angular/angular.min.js"></script>
  <script src="js/angular/angular-ui-router.min.js"></script>
  <script src="js/angular/modules/user_perfil.js"></script>
  <script src="sweetalert/sweetalert.min.js" ></script>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/upload.js"></script>
</body>
</html>
