<?php
$dsn = 'mysql:dbname=heroku_a363adc302f4535;host=us-cdbr-east-06.cleardb.net;charset=utf8mb4';
$user = 'b3297b92456728';
$password = 'ee5fcde4';

try {
  $pdo = new PDO($dsn, $user, $password);
  $sql_delete = 'DELETE FROM products WHERE id = :id';
  $stmt_delete = $pdo->prepare($sql_delete);
  $stmt_delete->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
  $stmt_delete->execute();
  $count = $stmt_delete->rowCount();
  $message = "商品を{$count}件削除しました。";
  header("Location: read.php?message={$message}");
} catch (PDOException $e) {
  exit($e->getMessage());
}
?>
