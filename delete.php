<?php
    include_once 'dbconfig.php';
    $id = $_POST['id']??null;
    if(!$id){
        header('Location:index.php');
        exit;
    }
    $statement = $pdo->prepare("DELETE FROM items where id=$id");
    $statement->execute();
    header('Location:index.php');
?>