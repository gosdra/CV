<?php

session_start();

include_once('../includes/connection.php');

if(isset($_SESSION['logged_in'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta Tags for Bootstrap 4 -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap 4 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../assets/style.css">
<title>MyCV</title>
  </head>
  <body>
    <div class="parallax">
        <!-- Parallax captions -->
        <h1 class="caption">Dragos Munteanu</h1>
    </div>

    <div class="jumbotron-fluid">
      <div class="container">

        <a href="index.php" id="experience">What I've done so far</a>
        </br>
        <ul>
          <li><a href="add.php">Add Experience</a></li>
          <li><a href="delete.php">Remove Experience</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
    <div class="parallax"></div>
    <script
    			  src="http://code.jquery.com/jquery-3.3.1.min.js"
    			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>

<?php
} else {
  if(isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    if(empty($username) or empty($password)){
      $error = 'All fields are required!';
    } else {
      $query= $pdo->prepare("SELECT * FROM users WHERE user_name= ? AND user_password= ?");
      $query->bindValue(1, $username);
      $query->bindValue(2, $password);

      $query->execute();

      $num = $query->rowCount();
      if($num ==1) {
        //correct details
        $_SESSION['logged_in'] = true;
        header('Location: index.php');
        exit();
      } else {
        //incorrect details
        $error = 'Incorrect details!';
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- Meta Tags for Bootstrap 4 -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap 4 CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../assets/style.css">
<title>MyCV</title>
  </head>
  <body>
    <div class="parallax">
        <!-- Parallax captions -->
        <h1 class="caption">Dragos Munteanu</h1>
    </div>
    <div class="jumbotron-fluid">
      <div class="container">
        <a href="index.php" id="experience">What I've done so far</a>
        </br></br>

      <?php if(isset($error)) { ?>
          <small style="color:red;"><?php echo $error; ?></small>
          </br></br>
      <?php } ?>

        <form action="index.php" method="POST">
          <input type="text" name="username" placeholder="Username"/>
          <input type="password" name="password" placeholder="Password"/>
          <input type="submit" value="Login"/>
        </form>
      </div>
    </div>
    <div class="parallax"></div>
    <script
    			  src="http://code.jquery.com/jquery-3.3.1.min.js"
    			  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
            integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>

</html>

<?php
}


?>
