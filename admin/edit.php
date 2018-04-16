<?php

session_start();
include_once('../includes/connection.php');
include_once('../includes/experience.php');

$experience = new experience;


if(isset($_SESSION['logged_in'])) {

  if(isset($_POST['title'], $_POST['content'])){
    $title = $_POST['title'];
    $content = nl2br($_POST['content']);
    $id= $_POST['id'];
    if(empty($title) or empty($content)) {
      $error = 'Cannot submit empty!';
    } else {
      $query = $pdo->prepare('UPDATE experience SET experience_title = ?, experience_content = ? WHERE experience_id = ?');
      $query->bindValue(1, $title);
      $query->bindValue(2, $content);
      $query->bindValue(3, $id);

      $query->execute();
      header('Location: index.php');
    }
  }
  $experiences = $experience->fetch_all();

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
        <h4>Select an experience to edit</h4>

        <form action="edit.php" method="POST">
          <select onchange="this.form.submit();" name="id">
              <?php foreach($experiences as $experience) { ?>
                  <option value="<?php echo $experience['experience_id']; ?>" <?php if($experience['experience_id'] == $_POST['id']): ?> selected="selected"<?php endif; ?>>
                      <?php echo $experience['experience_title']; ?>
                  </option>
              <?php } ?>
          </select>
        </br></br>
            <textarea rows="1" cols="30" name="title" placeholder="Title"><?php echo $data['experience_title']; ?></textarea></br>
            <textarea rows="15" cols="50" name="content" placeholder="Content"><?php echo $data['experience_content']; ?></textarea></br>
            <input type="submit" value="Edit Experience"/>
        </form>
      </div>
    </div>

    <div class="parallax"></div>
    <script>
      $(window).on('unload', function() {
        $(window).scrollTop(0);
      });
    </script>
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
}

?>
