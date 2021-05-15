<?php
session_start();
require dirname(__DIR__, 2) . '/includes/layouts/header.php';
?>

<!-- Page Header-->

<?php

$linkErr = null;
$link =null;

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
            $link = $_POST['link'];
        }
    }
    else
    {
        $linkErr = "link is required!";
    }
}

?>

<div class="px-4 py-2 mt-5 text-center homeHeader">
    <img class="d-block mx-auto mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <?php
        echo ((isset($_SESSION['login_user'])) ?
        "<h1 class=' fw-bold text-left'>Hi, ".$_SESSION['login_user']. "...</h1> <h1 class='display-5 fw-bold'> let's Sho.rten any link! </h1>"
        : "<h1 class='display-5 fw-bold'> Sho.rten any link! </h1>")
    ?>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Simple tool to shorten links and keep them in your profile.</p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="input-group d-grid gap-2 d-sm-flex justify-content-sm-center mb-4">
                <input type="text" class="form-control" placeholder="Sho.rten this link..." name="link" id="link">
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
        if($link != null && isset($_SESSION['login_email']))
        {
            $output = new Link();
            $shortLink = $output->shortenLink($link);
            $output->storeLink($inputLink, $shortLink,$_SESSION['login_id']);
        }

        if ($link != null && isset($_SESSION['login_email']))
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
        ?>
    </div>

</div>




<?php
require dirname(__DIR__, 2) . '/includes/layouts/footer.php';
?>


