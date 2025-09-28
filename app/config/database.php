<?php 
$app = include __DIR__ . '/app.php';

// membuat DSN
  $dsn = "mysql:host={$app['db_host']};dbname={$app['db_name']}";
  // membuat objek PDO./
  try {
    $database = new PDO($dsn, $app['db_user'], $app['db_pass'], $app['db_options']);
  } catch (PDOException $error) {
    // menangkap error 
     throw new PDOException($error->getMessage(), (int)$error->getCode());
  }
  return $database;