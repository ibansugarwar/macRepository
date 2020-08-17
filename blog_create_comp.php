<?php
  // POSTされた値に問題があれば登録画面へ戻す

  session_start();
  if($_POST['']){
    header('location : user_regist.php');
    return;
  }
  // POSTされた値に問題がなければDBへ登録処理をする
  if(isset($_POST['blog_create'])){
    $blog_title=$_POST["blog_title"];
    $blog_content=$_POST["blog_content"];
    $blog_category=$_POST["blog_category"];

    try{
      $db = new PDO("mysql:host=localhost;dbname=sample","user","user");
      $sql = "insert into blogs(title,content,category) values(?,?,?,)";
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
