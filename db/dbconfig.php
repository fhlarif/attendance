<?php   
    //development
    // $host='127.0.0.1';
    // $db='attendance_db';
    // $user='root';
    // $pass='';
    // $charset='utf8mb4';

    //production
    $host='sql12.freemysqlhosting.net';
    $db='sql12339559';
    $user='sql12339559';
    $pass='EpC3NH3zru';
    $charset='utf8mb4';

    $dsn="mysql:host=$host; dbname=$db; charset=$charset";

    try {
        $pdo =new PDO($dsn,$user,$pass); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'Database connected!';
    } catch (PDOException $e) {
        //echo "<p class='text-danger'>No Database found</p>";
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    $crud=new crud($pdo);
?>