<?php
  if(isset($_POST['login'])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    
    try{
      
      $db = new PDO("mysql:host=localhost;dbname=sample","user","user");
      $sql = "SELECT count(*) FROM users WHERE username=? and password=?";
      $stmt = $db->prepare($sql);
      $stmt->execute(array($username,$password));
      $result = $stmt->fetch();

      $stmt=null;
      $db=null;

      if($result[0] > 0){
        header('location:http://localhost:8888/gitRepository/home.php');
        exit;
      }else{
        $err_msg="ユーザ名またはパスワードが違います";
      }


    }catch(PDOException $e){
      echo "接続失敗：".$e->getMassage();
      exit;
    }
  }
?>


<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="main.css">
  <script src="main.js" defar></script>

  <title>トップ画面</title>
</head>

<header>
<div class="index-header">
  
  <a href="#" class="header-btn">ボタン１</a>
  <a href="#" class="header-btn">ボタン２</a>
  <a href="#" class="header-btn">ボタン３</a>

</div>
</header>



<body>

<div class="test">
  <p>テスち</p><br>
</div>

  <div>
    <h1>トップ画面</h1>
    <?php
      if($err_msg !==null and $err_msg !==""){
        echo $err_msg."<br>";
      }
    ?>
    <form action=""method="POST">
        ユーザID<input type="text" name="username" value=""><br>
        パスワード<input type="password" name="password" value="">
        <input type="submit" name="login" value="ログイン">
      </form>

    <a href="user_regist.php">新規登録はコチラ</a>
  </div>
</body>
</html>