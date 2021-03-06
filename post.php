<?php

  $dsn = 'mysql:dbname=SkillTest1;host=localhost';
  $user = 'root';
  $password = '';
  $dbh = new PDO($dsn, $user, $password);
  $dbh->query('SET NAMES utf8');

  if (!empty($_POST)) {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $detail = $_POST['detail'];

    $sql = 'INSERT INTO `tasks` SET `title`=?, `date`=?, `detail`=?';
    $data = array($title,$date,$detail);
    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    header('Location: schedule.php');

  }

  $dbh = null;


?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Skill Test</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body style="margin-top: 60px">
  <div class="container">
    <div class="row">
      <div class="col-xs-8 col-xs-offset-2 thumbnail">
        <h2 class="text-center content_header">タスク追加</h2>

        <form method="POST" action="">
          <div class="form-group">
            <label for="task">タイトル</label>
            <input name="title" class="form-control">
          </div>
          <div class="form-group">
            <label for="date">日程</label>
            <input type="date" name="date" class="form-control">
          </div>
          <div class="form-group">
            <label for="detail">詳細</label>
            <textarea name="detail" class="form-control" rows="3"></textarea><br>
          </div>
          <input type="submit" class="btn btn-primary" value="投稿">
        </form>

      </div>
    </div>
  </div>
  <script src="assets/js/jquery-3.1.1.js"></script>
  <script src="assets/js/jquery-migrate-1.4.1.js"></script>
  <script src="assets/js/bootstrap.js"></script>
</body>
</html>