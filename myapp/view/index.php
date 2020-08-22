<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://unpkg.com/mvp.css">
  <title>Search</title>
</head>

<body>
  <main>
    <h1>Search</h1>

    <form action="/" method="post">
      <h2>登録</h2>
      <p>スペース区切りで単語を入力</p>
      <input type="text" name="words" size="50" maxlength="1000">
      <input type="submit" value="登録">
    </form>

    <form action="index.php" method="post">
      <h2>検索</h2>
      <input type="text" name="keyword"
        value="<?php echo $_POST['keyword']?>"
        size="50" maxlength="20">
      <input type="submit" value="検索">
    </form>

    <?php   if ($searchResults) { ?>
    <h3>結果</h3>
    <pre>
  <?php
      echo implode(" ", $searchResults);
  }
?>
  </pre>
  </main>
</body>