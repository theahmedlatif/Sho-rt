<?php
require dirname(__DIR__, 2) . '/includes/layouts/header.php';
?>

<div class="px-5 py-2 mt-5 text-center homeHeader container" style="height: 70vh;">

    <div class="card" style="width: 80vw;">
        <div class="card-body">
            <h5 class="card-title">Your Email</h5>
            <p class="card-text"><?php echo $_SESSION['login_email']?></p>
        </div>
    </div>
</div>

<?php
require dirname(__DIR__, 2) . '/includes/layouts/footer.php';
?>
