<?php

include_once 'connection1.php';

if (isset($_POST['cadastrar_php'])) {
    $first_name = filter_input(
        INPUT_POST,
        'first_name',
        FILTER_SANITIZE_SPECIAL_CHARS
    );
    $last_name = filter_input(
        INPUT_POST,
        'last_name',
        FILTER_SANITIZE_SPECIAL_CHARS
    );

    $password = filter_input(
        INPUT_POST,
        'password',
        FILTER_SANITIZE_SPECIAL_CHARS
    );

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt->$conn->prepare(
        'INSERT INTO usuarios (first_name, last_name, password, email)VALUES(:first_name, :last_name, :password, :email)'
    );

    $stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);

    if ($stmt->$conn->rowCount() > 0) {
        echo 'Usuário cadastrado com sucesso';
    }
}