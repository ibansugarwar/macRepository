<?php
  // POSTされた値に問題があれば登録画面へ戻す

  session_start();
  if($_POST['']){
    header('location : user_regist.php');
    return;
  }
  // POSTされた値に問題がなければDBへ登録処理をする
  if(isset($_POST['regit'])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    try{
      $db = new PDO("mysql:host=localhost;dbname=sample","user","user");
      $sql = "insert into users(username,password) values(?,?)";
      $stmt = $db->prepare($sql);
      $stmt->execute(array($username,$password));
      $stmt=null;
      $db=null;

      header('location:http://localhost:8888/gitRepository/index.php');
      exit;

    }catch(PDOException $e){
      echo "接続失敗：".$e->getMassage();
      exit;
    }
  }
?>

<!-- <!DOCTYPE html>
  <head>
    <meta charset="UTF-8">
    <title>完了画面</title>
  </head>

  <body>
    <h1>登録が完了しました</h1>

    <a href="index.php">トップへ戻る</a>
  </body>
</html> -->