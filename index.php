<?php

session_start();

require 'User.php';
require 'Request.php';
require 'ValidationRuleInterface.php';
require 'ValidatorInterface.php';
require 'isNotEmptyRule.php';
require 'IsEmail.php';
require 'isSecurePassword.php';
require 'Validator.php';
require 'UserValidator.php';

$user = new User;
$request = new Request;
$rule = new isNotEmptyRule;
$email = new IsEmail;
$password = new isSecurePassword;

$user
->setEmail($request->get('email'))
->setPassword($request->get('password'));

if ($request->get('remember', 'bool')) {
    $user->remember();
}


$validator = new UserValidator($user, $user->getValidationRules());
$validator->validate();
$rule->setValue('');
$email->setValue('asdas@asdad.com');
$password->setValue('f1aA678@');


var_dump($validator);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form method="post">
        <input type="text" placeholder="Email" name="email" value="<?=$_POST['email']??''?>">
        <br>
        <br>
        <input type="text" placeholder="Password" name="password" value="<?=$_POST['password']??''?>">
        <br>
        <br>
        <input type="checkbox" name="remember"> Recordarme en este equipo
        <br>
        <br>
        <button>Loggin</button>
        <?php
        foreach ($validator->getErrors() as $error) {
            echo '<h1>' . $error . '</h1>';
        }
        ?>
    </form>
</body>

</html> 