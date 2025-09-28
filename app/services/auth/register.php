<?php
include __DIR__ . '../../../config/database.php'; // melakukan pemanggilan file database
session_start(); 

$data = json_decode(file_get_contents("php://input"), true); // mengambil data kiriman berbentuk json
$name = trim($data['name']); // trim untuk menghapus whitespate atau spasi
$email = trim($data['email']);
$password = trim($data['password']);

function getListUser() {
    global $database; // mengambil variable $pdo sebagai variable global
    global $email;
    global $password;
    global $name;

    // mengambil seluruh email yang ada ditable users
    $queryCheckEmail = $database->prepare("SELECT * FROM users WHERE email = :email");
    $queryCheckEmail->execute([':email'=> $email]);
    $queryCheckEmail->fetch(PDO::FETCH_ASSOC);
    
    // membuat query SQL mengambil data user admin
    $queryCheckRole = $database->query("SELECT * FROM users WHERE role = 'admin'");
    $userAdmin = $queryCheckRole->fetchAll(PDO::FETCH_ASSOC);

   
    if($queryCheckEmail->rowCount() > 0) {  // validasi email yang sudah dipakai atau belum
        echo json_encode([
            'message'   => 'Email sudah terdaftar'
        ]);
        http_response_code(409);
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);     // melakukan hassing password
    $baseUrl = "/e-cashier-native"; 
    
    if (count($userAdmin) > 0) { // melakukan validasi role admin
        $role = "cashier";
        $message = "User Cashier berhasil dibuat";
        $redirect = $baseUrl . "/app/views/cashier/dashboard.php";
    } else {
        $role = "admin";
        $message = "User admin berhasil dibuat";
        $redirect = $baseUrl . "/app/views/admin/dashboard.php";
    }

    $queryInsert = $database->prepare("INSERT INTO users(name, email, password, role) VALUES (:name, :email, :password, :role)");
    $queryInsert->execute([
        ':name'  =>  $name,
        ':password' => $hashedPassword,
        ':email'    => $email,
        ':role'     => $role
    ]);
   
    $userId = $database->lastInsertId();  // mengambil id user yang terakhir dibuat

    $_SESSION['user'] = [     // membuat session user
        'id'    => $userId,
        'name'  => $name,
        'email' => $email,
        'role'  => $role
    ];

    echo json_encode([
        'message'   => $message,
        'redirect'  => $redirect
    ]);
    http_response_code(201);
    exit;
}

getListUser();
