<?php
namespace Short;

require_once dirname(__DIR__, 1) . '/vendor/autoload.php';
use Envelope\Database\MysqlDatabase;

class User extends MysqlDatabase{
    private $userName;
    private $userPassword;
    private $userEmail;
    private $requestTimestamp;

    /**
     * @return mixed
     */
/*    private function __construct()
    {


    }*/

    //receive input > validate input > update input;
    /**
     * @param $userName
     * @param $userPassword
     * @param $userEmail
     * @return mixed
     */
    public function createUser($userName, $userPassword, $userEmail)
    {
        $newUser = new MysqlDatabase();
        $userPassword = password_hash($userPassword,PASSWORD_DEFAULT);

        $binders = [":userName" => $userName, ":userPassword" => $userPassword, ":userEmail" => $userEmail];
        return $newUser->insert("INSERT INTO users (userName, userPassword, userEmail)
                                    VALUES (:userName, :userPassword, :userEmail)",$binders);
    }

    /**
     * @param $userName
     * @return mixed
     */
    public function validateUserName($userName)
    {
        $userName = trim($userName);
        if(strlen($userName) > 20)
        {
            return 'user is too long! keep it below 20 characters!';
        }
        else
        {
            if (!preg_match("/^[a-zA-Z-' ]*$/",$userName)) {
                $nameErr = "Only letters and white space allowed";
            }
            else
            {
                return false;
            }
        }
    }

    public function validateUserEmail($userEmail)
    {
        $userEmail = trim($userEmail);
        $userEmail = filter_var($userEmail, FILTER_SANITIZE_EMAIL);

        if(strlen($userEmail) > 150)
        {
            return 'email is too long! keep it below 150 characters!';
        }
        else
        {
            if(!filter_var($userEmail, FILTER_VALIDATE_EMAIL))
            {
                return "invalid email format!";
            }
            else
            {
                $newValidation = new MysqlDatabase();
                $newValidation->getConnection();
                $binders = [":userEmail" => $userEmail];
                $feedback = $newValidation->select("SELECT userEmail FROM users WHERE userEmail = :userEmail", $binders);
                if($feedback != false || !empty($feedback))
                {
                    return 'email exists!'; //false for invalid user due to user already exists
                }
                else
                {
                    return false;// true for user not exists
                }
            }
        }
    }

    public function validateUserPassword($password, $confirmPassword)
    {
        if(strlen($password) < 6 )
        {
            return "password not less than 6 characters!";
        }
        elseif(!preg_match("#[0-9]+#",$password))
        {
            return "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password))
        {
            return "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif($password != $confirmPassword) {
            return "confirmed password doesn't match password!";
        }
        else
        {
            return false;
        }
    }

    public function userLogin($userEmail, $userPassword) {
        $newLoginUser = new MysqlDatabase();
        $newLoginUser->getConnection();


        $binders = [":userEmail" => $userEmail];

        $feedback = $newLoginUser->select('SELECT id, userName, userEmail, userPassword FROM users WHERE userEmail = :userEmail',$binders);

        if ($feedback && password_verify($userPassword,$feedback[0]['userPassword']))
        {
            return $feedback[0];
        }
        else
        {
            return false;
        }
    }
}