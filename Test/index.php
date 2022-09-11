<?php

define('TITLE', "Test...");
include '../assets/layouts/header.php';
$pdocon = createPdoConn();



?>
<h1>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

        hello
        <input type="date" id="dat" name="dat">
        <input type="submit" value="submit">
    </form>
</h1>

<?php



?>
<button onclick="toRed()">TEst it!</button>

<?php
if (isset($_POST['dat'])) {
    $token = $_POST['dat'];
    echo $token . "<br>";
    if ($token < date('2005-01-01')) {
        echo "<h2 class=disabled> True <h2/> ";
    } else
        echo "<h2 class=disabled>False <h2/> ";
} else {
    $token = 'BCAEUNPV';
    echo "<span class=disabled> $token <span/> ";
}
?>
<script>
    function toRed() {
        <?php
        $stmt = "SELECT * FROM `tokens` WHERE token = '$token';";
        $result = $pdocon->query($stmt);
        $rows = $result->fetchAll(PDO::FETCH_NUM);
        if (empty($rows)) {
        ?>
            document.getElementsByTagName('h1')[0].style.color = '<?php echo "red"; ?>';
        <?php
        } else {
        ?>
            document.getElementsByTagName('h1')[0].style.color = '<?php echo "green"; ?>';
        <?php
        }
        ?>
    }
</script>