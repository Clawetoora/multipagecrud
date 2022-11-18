<?php
session_start();
$_INNER_PATH = $_SERVER['DOCUMENT_ROOT'] . "/php/multipagecrud";
$_OUTER_PATH = "http://" . $_SERVER['SERVER_NAME'] . "/php/multipagecrud";
// include "$_INNER_PATH/controllers/CarsController.php";
// include "$_INNER_PATH/models/Car.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- CSS only -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="<?=$_OUTER_PATH . "/css/loginstyle.css"?>" />
    <title>Create user</title>
  </head>
  <body>
    <div class="login-container">
      <h1><ion-icon name="checkbox-outline"></ion-icon></h1>
      <form class="login-form"  action="<?=$_OUTER_PATH . "/routes.php"?>" method="POST">
        <input
          type="text"
          name="usercreate"
          id="username"
          placeholder="Username"
          required
        />
        <input
          type="password"
          name="passcreate"
          id="password"
          placeholder="Password"
          required
        />
        <button type="submit" >Create user</button>
        <a href="">Forgot user name or password?</a>
      </form>
    </div>

    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
