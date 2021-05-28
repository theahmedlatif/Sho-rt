<?php
require dirname(__DIR__, 2) . '/includes/layouts/header.php';
?>

<?php
require dirname(__DIR__, 2) . '/src/Link.php';
use Short\Link;

$table = new Link();
$tableData = $table->displayLinks($_SESSION['login_id']);

?>

<div class="px-5 py-2 mt-5 text-center homeHeader">

    <div>
        <h1>Your links history...</h1>
    </div>
    <table class="table table-hover">
        <thead class="bg-primary py-5 text-white">
        <tr>
            <th scope="col">Original Link</th>
            <th scope="col">Short Link</th>
            <th scope="col">Timestamp</th>
        </tr>
        </thead>
        <tbody>
        <?php

        foreach($tableData as $row)
        {?>
            <tr>
                <th scope='row'><a class="text-decoration-none text-dark font-weight-bold" href="<?php echo $row["inputLink"]; ?>"><?php echo $row["inputLink"]; ?></a></th>
                <td><a class="text-decoration-none text-dark font-weight-bold" href="<?php echo $row["inputLink"]; ?>"><?php echo $row["outputLink"]; ?></a></td>
                <td><?php echo $row["created_at"]; ?></td>
            </tr>
       <?php
        }
        ?>
        </tbody>
    </table>


</div>

<?php
require dirname(__DIR__, 2) . '/includes/layouts/footer.php';
?>
