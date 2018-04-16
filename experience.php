<?php
include_once('includes/connection.php');
include_once('includes/experience.php');

$experience = new experience;

if(isset($_GET['id'])){
  $id= $_GET['id'];
  $data = $experience->fetch_data($id);
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
<link rel="stylesheet" type="text/css" href="assets/style.css">
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

        <h4><?php echo $data['experience_title']; ?></h4>
        <p><?php echo $data['experience_content']; ?></p>
        <a href="index.php">&larr; Back</a>
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
  header('Location: index.php');
  exit();
}
 ?>
