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





<body>

  <header class="index-header">
      <!-- <p>Banri Sugawara's</p> -->
  
      <a href="#" class="header-btn"><p>Portfolio</p></a>
      <a href="#" class="header-btn"><p>Skill</p></a>
      <a href="#" class="header-btn"><p>AboutMe</p></a>
    <!-- </div> -->
  </header>



  <div class="startup-img">
    <img src="images/startup.webp" alt="startup">
    <p>Bansri Sugawara's<br>Profile</p>
  </div>


  <div class = "about-me">
    <p>AboutMe</p>
    <div class = "about-me-content">
      <td>
        <li>名前　　：菅原 万里</li>
        <li>現住所　：東京都中野区弥生町</li>
        <li>学歴　　：北海道情報専門学校 システムエンジニア科</li>
        <li>生年月日：1994/3/15</li>
        <li>その他　：</li>
      </td>
    </div>

    <div class = "skill">
      <p>skill</p>
      
    </div>
  </div>























  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <div class="main-content">
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




      <footer>フッター</footer>

</body>
</html>