<?php
function login($email, $password){
    $db = dbConnect();
    
    $query = $db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');
    $query->execute(
        [
            'email' => $email,
            'password' => md5($password),
        ]
    );
    $user = $query->fetch();
    return $user;
}
function register($informations){
    $db = dbConnect();
    $query = $db->prepare('INSERT INTO users (email, password) VALUES (?, ?)');
            $result = $query->execute(
                [
                    $informations['email'],
                    hash('md5',$informations['password']),


                ]
            );
            
}