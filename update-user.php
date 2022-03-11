<?php

require_once 'includes.php';


if (mb_strtolower($_SERVER['REQUEST_METHOD']) === 'post') {
    $updateUser = $connection->prepare(
        "UPDATE `user`
        SET full_name = :full_name, first_name = :first_name, name = :name, gender = :gender, email = :email, phone = :phone
        WHERE id= :id"
    );
    $updateUser->bindValue('full_name', $_POST['first_name'] . ' ' . $_POST['name']);
    $updateUser->bindValue('first_name', $_POST['first_name']);
    $updateUser->bindValue('name', $_POST['name']);
    $updateUser->bindValue('gender', $_POST['gender']);
    $updateUser->bindValue('email', $_POST['email']);
    $updateUser->bindValue('phone', $_POST['phone']);
    $updateUser->bindValue('id', $_GET['id']);

    $updateUser->execute();

    header('Location: /');
    exit;

}
?>

<?php
require_once 'template_head.php';
require_once 'form-user.php';
?>