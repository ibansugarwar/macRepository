<!DOCTYPE html>
  <head>
    <meta charset="UTF-8">
    <title>ブログ投稿画面</title>
  </head>

  <body>
    <h1>ブログ投稿画面</h1>
    <form action="blog_create_comp.php" method="POST">
      タイトル<input type="text" name="blog_title" value=""><br>
      本文<input type="text" name="blog_content" value=""><br>
      カテゴリ<input type="text" name="blog_category" value=""><br>
      <input type="submit" name="blog_create" value="投稿">
    </form>

    <a href="index.php">トップへ戻る</a>

  </body>
</html>