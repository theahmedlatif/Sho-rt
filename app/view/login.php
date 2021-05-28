<?php
require dirname(__DIR__, 2) . '/includes/layouts/header.php';

if(isset($_SESSION['login_user']))
{
    header('location: index.php');
}
?>

<?php
require dirname(__DIR__, 2) . '/src/User.php';
use Short\User;

$userEmailErr = null;
$userPasswordErr = null;

$userEmail = null;
$userPassword = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['userEmail'])) {
        $userEmailErr = "Please enter your Email!";
    }

    if (empty($_POST['userPassword'])) {
        $userPasswordErr = "Please enter your password!";
    }

}
?>
<div class="px-4 py-2 mt-5 homeHeader" >
    <main class="form-signin p-5 d-block mx-auto mb-4 col-6 bg-body shadow-sm rounded">
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="text-center">
                <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            </div>

            <div class="col">
                <input type="email" class="form-control" placeholder="name@example.com" name="userEmail" value="<?php if (isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>">
                <?php
                if ($userEmailErr != null)
                    echo "<div class='invalid-feedback d-block'>".$userEmailErr."</div>";
                ?>
            </div>
            <div class="col">
                <input type="password" class="form-control mt-3" placeholder="Password" name="userPassword">
                <?php
                if ($userPasswordErr != null)
                    echo "<div class='invalid-feedback d-block'>".$userPasswordErr."</div>";
                ?>
            </div>

            <div class="checkbox my-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        </form>
        <?php
        if (!empty($_POST['userEmail']) && !empty($_POST['userPassword']))
        {
            $userEmail = $_POST['userEmail'];
            $userPassword = $_POST['userPassword'];

            $loginUser = new User();
            $loggedUser = $loginUser->userLogin($userEmail,$userPassword);
            $_SESSION['test'] = $loggedUser;
            if ($loggedUser == false)
            {
                $userPasswordErr = $userEmailErr = "Check your email or password may be incorrect!";
            }
            else if ($loggedUser != false)
            {
                 $_SESSION['login_user'] = $loggedUser['userName'];
                $_SESSION['login_email'] = $loggedUser['userEmail'];
                $_SESSION['login_id'] = $loggedUser['id'];

                if(isset($_SESSION['login_user']))
                {
                    header('location: index.php');
                }
            }
        }
        ?>
        <?php
        if ($userPasswordErr != null)
            echo "<div class='invalid-feedback d-block'>".$userPasswordErr."</div>";
        ?>
    </main>
</div>



<?php
require dirname(__DIR__, 2) . '/includes/layouts/footer.php';
?>
