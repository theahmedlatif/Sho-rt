<?php
require dirname(__DIR__, 2) . '/includes/layouts/header.php';
/**

 */
if(isset($_SESSION['login_email']))
{
    header('location: index.php');
}
?>

<?php
require dirname(__DIR__, 2) . '/src/User.php';
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
?>

<!--HTML FORM-->

<div class="px-4 py-2 mt-5 homeHeader">
    <main class="form-signin p-5 d-block mx-auto mb-4 col-6 bg-body shadow-sm rounded">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row text-center">

                <h1 class="h3 mb-3 fw-normal">Registration</h1>
            </div>

            <div class="row gy-3 my-2">
                <div class="col">
                    <label for="basic-url" class="form-label">Name</label>
                    <input type="text" class="form-control" placeholder="Name" aria-label="Name" name="userName" value="<?php if (isset($_POST['userName'])) echo $_POST['userName']; ?>">
                    <?php
                    if ($usernameErr != null)
                        echo "<div class='invalid-feedback d-block'>".$usernameErr."</div>";
                    ?>
                </div>
                <div class="col">
                    <label for="basic-url" class="form-label">Email</label>
                    <input type="text" class="form-control" placeholder="Email" aria-label="Email" name="userEmail" value="<?php if (isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>">
                    <?php
                    if ($userEmailErr != null)
                        echo "<div class='invalid-feedback d-block'>".$userEmailErr."</div>";
                    ?>
                </div>
            </div>

            <div class="row gy-3 my-2">
                <div class="col">
                    <label for="basic-url" class="form-label">Password</label>
                    <input type="password" class="form-control" placeholder="Password" aria-label="Password" name="userPassword">
                    <?php
                        echo "<div class='invalid-feedback d-block'> $userPasswordErr </div>";
                    ?>
                </div>
                <div class="col">
                    <label for="basic-url" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Confirm Password" name="confirmPassword">
                    <?php
                    if ($userConfirmPasswordErr !== null)
                        echo "<div class='invalid-feedback d-block'>".$userConfirmPasswordErr."</div>";
                    ?>
                </div>
            </div>

            <input class="w-100 btn btn-lg btn-primary mt-3" type="submit" value="Submit">
        </form>
    </main>
</div>

<!--END OF HTML FORM-->

<?php
if ($usernameErr == false && $userEmailErr == false && $userPasswordErr == false)
{
    $newUser = new User();
    $userCreationFeedback = $newUser->createUser($userName, $userPassword, $userEmail);
    //echo $userCreationFeedback;
    if(is_string($userCreationFeedback)==true)
    {
        $_SESSION['login_user'] = $userName;
        $_SESSION['login_email'] = $userEmail;
        $_SESSION['login_id'] = $userCreationFeedback;

        if(isset($_SESSION['login_user']))
        {
            header('location: index.php');
        }
    }
}
?>

<?php
require dirname(__DIR__, 2) . '/includes/layouts/footer.php';
?>
