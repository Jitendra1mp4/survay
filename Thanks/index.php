<?php

define('TITLE', "Thanks...");
include '../assets/layouts/header.php';

if (isset($_POST['submit'])) {

    // print_r($_POST['goal']);

    $utkn = strtoupper($_POST['utkn']);
    $dob = $_POST['dob'];
    $cls = $_POST['cls'];
    $marks9 = $_POST['marks9'];
    $marks10 = $_POST['marks10'];
    $interest = $_POST['interest'];
    $goal = $_POST['goal'];
    $willPow = $_POST['willPow'];
    $honest = $_POST['honest'];

    if (isset($_POST['true2Others']))
        $true2Others = $_POST['true2Others'];
    else $true2Others = 'NA';

    if (isset($_POST['lazy']))
        $lazy = $_POST['lazy'];
    else $lazy = 'NA';

    if (isset($_POST['true2Self']))
        $true2Self = $_POST['true2Self'];
    else $true2Self = 'NA';

    $information = array(
        'utkn' => $utkn,
        'dob' => $dob,
        'cls' => $cls,
        'marks9' => $marks9,
        'marks10' => $marks10,
        'interest' => $interest,
        'goal' => $goal,
        'willPow' => $willPow,
        'true2Others' => $true2Others,
        'true2Self' => $true2Self,
        'lazy' => $lazy,
        'honest' => $honest
    );
    function insertData($pdo, $information)
    {
        // echo "<pre>";
        $token = $information['utkn'];
        $dob = date($information['dob']);
        $cls = $information['cls'];
        // echo $dob ;
        $marks9 = $information['marks9'];
        $marks10 = $information['marks10'];
        $interest = $information['interest'];
        $goal = $information['goal'];
        $willPow = $information['willPow'];
        $true2Others = $information['true2Others'];
        $true2Self = $information['true2Self'];
        $lazy = $information['lazy'];
        $honest = $information['honest'];
        // print_r($information);

        $stmt1 = "INSERT INTO `survaydata`(`token`, `dob`,`cls` ,`marks9`, `marks10`, `interest`, `goal`, `willPow`, `true2Others`, `true2Self`, `lazy`, `honest`) 
                                        VALUES (\"$token\",date \"$dob\",\"$cls\",$marks9,$marks10,\"$interest\",\"$goal\",'$willPow','$true2Others','$true2Self','$lazy','$honest'
                                );";
        $stmt2 = "UPDATE `tokens` SET `used`= true WHERE token =\"$token\"";

        try {
            if (($pdo->query($stmt1)) && ($pdo->query($stmt2))) {
?>
                <main>
                    <div class="container-fluid">
                        <div>
                            <h1 class=" text-center text-success py-4 ">Thanks...</h1>
                        </div>
                        <div>
                            <div class="alert alert-info m-2" role="alert">
                                <strong>Thanks</strong> for Sharing Informations.
                                <i class="fas fa-grin-hearts fs-2  text-success fa-lg fa-fw"></i>
                            </div>
                            <a class="btn btn-link" href="../fill-form" role="button">A new form for my friend</a>
                        </div>
                    </div>
                </main>
            <?php
            }
        } catch (\Throwable $th) {
            ?>
            <div class="alert alert-danger alert-dismissible fade show m-4 p-3" role="alert">
                <a href="../fill-form">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </a>
                <strong>Something went wrong </strong> You should check in on some of those fields.<br>
                if problem occures <strong>again and again</strong> let us fix it.
                <br> <strong>Sorry for inconvenience</strong>
                <br> <a href="../fill-form">Would you like to try again...?</a>
            </div>
    <?php
        }
    }
    $pdo = createPdoConn();
    insertData($pdo, $information);
} else { 
    ?>
    <div class="container p-4 m-3">
        <div class="alert alert-primary" role="alert">
            <strong>Thanks for visiting us....</strong>
        </div>

        <div class="alert alert-warning fade show" role="alert">
            Did you really filed the form...? <a href="../fill-form">Try a new one</a>
        </div>
    </div>
<?php
}
include '../assets/layouts/footer.php'
?>