<?php
require dirname(__DIR__, 2) . '/includes/layouts/header.php';
?>

<!-- Page Header-->

<?php

$linkErr = null;
$inputLink =null;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(!empty($_POST['link']))
    {
        $_POST['link'] = filter_var(($_POST["link"]), FILTER_SANITIZE_URL);

        if(filter_var($_POST['link'], FILTER_VALIDATE_URL) == false)
        {
            $linkErr = "invalid link!";
        }
        else
        {
            $inputLink= $_POST['link'];
        }
    }
    else
    {
        $linkErr = "link is required!";
    }
}
?>

<div class="px-4 py-2 mt-5 homeHeader">
    <div class="text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-scissors" viewBox="0 0 16 16">
            <path d="M3.5 3.5c-.614-.884-.074-1.962.858-2.5L8 7.226 11.642 1c.932.538 1.472 1.616.858 2.5L8.81 8.61l1.556 2.661a2.5 2.5 0 1 1-.794.637L8 9.73l-1.572 2.177a2.5 2.5 0 1 1-.794-.637L7.19 8.61 3.5 3.5zm2.5 10a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0zm7 0a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0z"/>
        </svg>
        <?php
        echo ((isset($_SESSION['login_user'])) ?
            "<h1 class=' fw-bold text-left'>Hi, ".$_SESSION['login_user']. "...</h1> <h1 class='display-5 fw-bold'> let's Sho.rten any link! </h1>"
            : "<h1 class='display-5 fw-bold'> Shorten any link! </h1>")
        ?>
        <div class="col-lg-6 mx-auto mb-5">
            <p class="lead mb-4">Simple tool to shorten links and keep them in your profile.</p>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="input-group d-grid gap-2 d-sm-flex justify-content-sm-center mb-4">
                    <input type="text" class="form-control" placeholder="Sho.rten this link..." name="link" id="link" value="<?php if (isset($_POST['link'])) echo $_POST['link']; ?>">
                    <?php
                    if ($linkErr != null)
                        echo "<div class='invalid-feedback d-block'>".$linkErr."</div>";
                    ?>
                </div>
                <input type="submit" class="d-block w-100 btn btn-primary btn-lg" value="Shorten!">
            </form>
            <?php
            require dirname(__DIR__, 2) . '/src/Link.php';
            use Short\Link;

            if($inputLink != null && isset($_SESSION['login_email']))
            {
                $output = new Link();
                $shortLink = $output->shortenLink($inputLink);
                $output->storeLink($inputLink, $shortLink,$_SESSION['login_id']);
            }

            if ($inputLink != null && isset($_SESSION['login_email']))
            {
                echo "
        <div class='row mt-4'>
        <div class='col'>
                    <div class='card border-warning'>
                        <div class='card-header bg-warning text-light'>Your Input</div>
                        <div class='card-body text-dark'>
                        <a href='$inputLink' class='fs-5'>$inputLink</a>
                        </div>
                    </div>
        </div>
        </div>
        
         <div class='row my-4'>      
         <div class='col'>             
                    <div class='card border-success'>
                        <div class='card-header bg-success text-light'>Short Link</div>
                        <div class='card-body text-dark'>
                        <a href='$inputLink' class='fs-5'>$shortLink</a>
                        </div>
                    </div>
        </div>
        </div>
                      ";
            }

            if (isset($_POST['link']) && empty($_SESSION['login_email']))
            {
                header("location: login");
            }

            ?>
        </div>

    </div>
</div>




<?php
require dirname(__DIR__, 2) . '/includes/layouts/footer.php';
?>


