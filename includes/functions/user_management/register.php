

<?php
require dirname(__DIR__, 3) . '/src/User.php';
use Short\User;

// define variables and set to empty values
$usernameErr = null;
$userEmailErr = null;
$userPasswordErr = null;
$userConfirmPasswordErr =  null;

$userName = null;
$userEmail = null;
$userPassword = null;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST['userName']))
    {
        $usernameErr = "Please enter your name!";
    }
    else
    {
        $validateUserName = new User();
        ($validateUserName->validateUserName($_POST['userName']) == false) ?
            $userName = $_POST['userName'] :
            $usernameErr = $validateUserName->validateUserName($_POST['userName']);
    }

    if (empty($_POST['userEmail']))
    {
        $userEmailErr = "Please enter email!";
    }
    else
    {
        $validateUserEmail = new User();
        ($validateUserEmail->validateUserEmail($_POST['userEmail']) == false) ?
            $userEmail = $_POST['userEmail'] :
            $userEmailErr = $validateUserEmail->validateUserEmail($_POST['userEmail']);
    }

    if (empty($_POST['userPassword']))
    {
        $userPasswordErr = "enter your password!";

        if(empty($_POST['confirmPassword']))
        {
            $userConfirmPasswordErr = "confirm your password";
        }
    }
    else
    {
        $validateUserPassword = new User();
        ($validateUserPassword->validateUserPassword($_POST['userPassword'],$_POST['confirmPassword']) == false) ?
            $userPassword = $_POST['userPassword'] :
            $userPasswordErr = $validateUserPassword->validateUserPassword($_POST['userPassword'],$_POST['confirmPassword']);
    }
}