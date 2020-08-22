<form action="index.php" method="post">
  <h2>登録</h2>
  <input type="text" name="words" size="100" maxlength="100">
  <input type="submit" value="送信">
</form>

<form action="index.php" method="post">
  <h2>検索</h2>
  <input type="text" name="keyword" value="<?php echo $_POST['keyword']?>" size="100" maxlength="100">
  <input type="submit" value="送信">
</form>

<?php

  if ($searchResults) {
      echo implode(" ", $searchResults);
  }
?>