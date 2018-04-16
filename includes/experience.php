<?php

class experience {
  public function fetch_all() {
    global $pdo;

    $query = $pdo->prepare("SELECT * from experience");
    $query->execute();

    return $query->fetchALL();

  }

  public function fetch_data($experience_id) {
    global $pdo;

    $query = $pdo->prepare("SELECT * from experience WHERE experience_id=?");
    $query->bindValue(1, $experience_id);
    $query->execute();

    return $query->fetch();
  }

}

?>
