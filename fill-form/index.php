<?php
// Defining page title
define('TITLE', "Fill Form...");
// included header
include '../assets/layouts/header.php';

// pdo connection created.
$pdo = createPdoConn();

// function that verify whether token and dob are valid or not!
function verify($token, $dob, $pdo)
{
    $stmt = "SELECT `used` FROM `tokens` WHERE `token` = '$token';";
    $result = $pdo->query($stmt);
    $rows = $result->fetchAll(PDO::FETCH_NUM);
    $ERROR = '';
    if (empty($rows)) {
        $ERROR = "Invalid Unique Token";
        return $ERROR;
    } else {
        // if ($rows[0][0] == 0) {
            if ($dob < date('2008-01-01') || $dob > date('1990-01-01')) {
                return 1;
            } else {
                $ERROR = "DOB Must be real...";
                return $ERROR;
            }
        // } else {
        //     $ERROR = "Unique Token is already used...!🤨";
        //     return $ERROR;
        // }
    }
}

// token and dob is not set then show form to enter token and dob
if (!(isset($_POST['utkn']) && isset($_POST['dob']))) {
// a label defining form for token and dob starts from he
    enterUtkn:
?>
    <form action="<?PHP echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="m-4 p-3 rounded shadow">
            <div class="mb-3">
                <label for="utkn" class="form-label d-inline-block mr-3">
                    <sub><i class="fas fa-asterisk fa-xs text-danger"></i></sub>
                    UNIQUE Token
                </label>
                <span class="d-inline-block text-muted rounded border-1 fs-6 p-0"><small>Try this code <code class="text-success">BCAGLTVL</code></small></span>
                <input type="text" required class="form-control p-2" name="utkn" id="utkn" aria-describedby="helpId" placeholder="BCA1BA01" <?php if (isset($_POST['utkn'])) echo 'value=' . $_POST['utkn']; ?>>
            </div>
        </div>

        <div class="m-4 p-3 rounded shadow">
            <div class="mb-3">
                <label for="dob" class="form-label">
                    <sub><i class="fas fa-asterisk fa-xs  text-danger"></i></sub>
                    <details>
                        <summary>
                            Date of Birth
                        </summary>
                        जन्मतिथि
                    </details>
                </label>
                <input type="date" required class="form-control p-2" name="dob" id="dob" aria-describedby="helpId" placeholder="01-Jan-2001" <?php if (isset($_POST['dob'])) echo 'value=' . $_POST['dob']; ?>>
                <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
            </div>
        </div>
        <div class="container-fluid mb-4 p-4 right">
            <button type="reset" class="btn btn-dark" onclick="resetValue()">Reset</button>
            <button type="submit" name='submit' class="btn btn-primary center my-1">verify</button>

        </div>
    </form>
    <!-- <button class="btn btn-primary center my-1">Verify</button> -->
    <?php
} else {

    $token = strtoupper($_POST['utkn']);
    $dob = $_POST['dob'];
    $verified = verify($token, $dob, $pdo);
    if ($verified == 1) {
        $stmt = "SELECT gid, goal FROM `goals`;";
        $result = $pdo->query($stmt);
        $rows = $result->fetchAll(PDO::FETCH_NUM);
    ?>
        <div class="container">
            <h2 class="text-center"><i class="fal fa-h1 fa-lg  ">Your form is here</i></h2>
            <form action="../confirm/index.php" method="post">
                <div class="my-3 p-3 rounded shadow">
                    <div class="mb-3">
                        <label for="utkn" class="form-label">
                            <sub><i class="fas fa-asterisk fa-xs text-danger"></i></sub>
                            UNIQUE Token
                        </label>
                        <span class="form-control p-2"><?php echo $token ?></span>
                        <input name="utkn" value="<?php echo $token ?>" hidden type="text" required class="form-control p-2">
                        <!-- <small id="helpId" class="form-text text-muted">Enter token provided to you</small> -->
                    </div>
                </div>
                <div class="my-3 p-3 rounded shadow">
                    <div class="mb-3">
                        <label for="dob" class="form-label">
                            <sub><i class="fas fa-asterisk fa-xs  text-danger"></i></sub>
                            <details>
                                <summary>
                                    Date of Birth
                                </summary>
                                जन्मतिथि
                            </details>
                        </label>
                        <span class="form-control p-2"><?php echo $dob ?></span>
                        <input hidden type="date" value="<?php echo $dob ?>" required class="form-control" name="dob">
                        <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                    </div>
                </div>

                <div class="mb-3 p-3 rounded shadow">
                    <sub><i class="fas fa-asterisk fa-xs  text-danger"></i></sub>

                    <label for="cls" class="form-label">Current Class</label>
                    <select class="form-control" name="cls" id="cls" required>
                        <option value="" disabled>--select--</option>
                        <option value="BCA-I">BCA-I</option>
                        <option value="BCA-II">BCA-II</option>
                        <option value="BCA-III">BCA-III</option>
                        <option value="PGDCA">PGDCA</option>
                    </select>
                </div>
                <div class="my-3 p-3 rounded shadow">
                    <fieldset>
                        <!-- <legend> -->
                        <sub><i class="fas fa-asterisk fa-xs  text-danger"></i></sub>

                        <details>
                            <summary>
                                Marks %
                            </summary>
                            अंक %
                        </details>

                        <!-- </legend> -->
                        <label for="marks" class="form-label">class 9<sup>th</sup></label>
                        <input onchange="rgv9.value=rg9.value" type="range" name="marks9" id="rg9" value="50" max="99" min="33">
                        <input onchange="rg9.value=rgv9.value; verify('rgv9')" type="number" name="marks9" max="99" min="33" id="rgv9" maxlength="2"><br />

                        <label for="marks" class="form-label">class 10<sup>th</sup></label>
                        <input onchange="rgv10.value=rg10.value " type="range" name="" id="rg10" value="50" max="99" min="33">
                        <input onchange="rg10.value=rgv10.value ; verify('rgv10')" type="number" name="marks10" max="99" min="33" id="rgv10" maxlength="2"><br />

                    </fieldset>

                </div>
                <div class="my-3 p-3 rounded shadow">
                    <div class="mb-3">
                        <label for="interest" class="form-label">
                            <sub><i class="fas fa-asterisk fa-xs  text-danger"></i></sub>
                            <details>
                                <summary>
                                    I am interested in
                                </summary>
                                मुझे इसमें दिलचस्पी है :
                            </details>
                        </label>
                        <input type="text" required placeholder="Painting, Singing etc." class="form-control" name="interest" id="interest" aria-describedby="helpId" placeholder="">
                        <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                    </div>

                </div>

                <div class="my-3 p-3 rounded shadow">
                    <sub><i class="fas fa-asterisk fa-xs  text-danger"></i></sub>
                    <fieldset>
                        <legend>
                            <label for="goal">
                                <details>
                                    <summary>
                                        My Goal is to become a :
                                    </summary>
                                    मेरा लक्ष यह बनना है
                                </details>
                            </label>

                        </legend>
                        <?php
                        foreach ($rows as $row) {
                        ?>
                            <label class="custom-control custom-radio">
                                <input type="radio" name="goal" required value="<?php echo $row[0]; ?>" class="form-check-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description"><?php echo $row[1]; ?></span>
                            </label> <br>
                        <?php
                        }
                        ?>

                    </fieldset>
                </div>
                <div class="my-3 p-3 rounded shadow">
                    <sub><i class="fas fa-asterisk fa-xs  text-danger"></i></sub>
                    <label for="willPow"><i class="fas fa-flushed text-primary   "></i></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" required value='Yes' name="willPow" id="willPowY">
                        <label class="form-check-label" for="willPowY">
                            <details>
                                <summary>
                                    I am pretty sure that i'll achieve my goals.
                                </summary>
                                हां, मुझे पूरा यकीन है कि मैं अपने लक्ष्यों को प्राप्त करूंगा।
                            </details>

                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" required value='No' name="willPow" id="willPowN">
                        <label class="form-check-label" for="willPowN">
                            <details>
                                <summary>
                                    No, I am not sure that i'll achieve my goals.
                                </summary>
                                नहीं, मुझे यकीन नहीं है कि मैं अपने लक्ष्यों को प्राप्त करूंगा।
                            </details>
                        </label>
                    </div>
                </div>
                <div class="optiGrupt border p-4 rounded">
                    <fieldset>
                        <legend>
                            <label for="willPow">
                                <details>
                                    <summary>
                                        Optionals
                                    </summary>
                                    <!-- खुद से पूछो -->
                                    Vaiakalpik
                                </details>
                            </label>
                        </legend>

                        <div class="my-3 p-3 rounded shadow">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" requiredN value='Yes' name="true2Others" id="true2OthersY">
                                <label class="form-check-label" for="true2OthersY">
                                    <details>
                                        <summary>
                                            I like to speak TRUTH to others.
                                        </summary>
                                        मुझे दूसरों से सच बोलना अच्छा लगता है
                                    </details>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" requiredN value='No' name="true2Others" id="true2OthersN">
                                <label class="form-check-label" for="true2OthersN">
                                    <details>
                                        <summary>I sometimes lie.
                                        </summary>
                                        मैं कभी कभी झूठ बोलता हूं
                                    </details>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" requiredN value='Sometimes' name="true2Others" id="true2OthersO">
                                <label class="form-check-label" for="true2OthersO">
                                    <details>
                                        <summary>
                                            I often lie.
                                        </summary>
                                        मैं अक्सर झूठ बोलता हूं।
                                    </details>
                                </label>
                            </div>
                        </div>

                        <div class="my-3 p-3 rounded shadow">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" requiredN value='Yes' name="true2Self" id="true2SelfY">
                                <label class="form-check-label" for="true2SelfY">
                                    <details>
                                        <summary>
                                            I do not lie with myself. (I do not try to make excuses)
                                        </summary>
                                        मैं अपने आप से झूट नही बोलता/बोलती हूं। (मैं बहाने बनाने की कोशिश नही करता/करती हूं /अपना गलती न मानना)
                                    </details>

                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" requiredN value='No' name="true2Self" id="true2SelfN">
                                <label class="form-check-label" for="true2SelfN">
                                    <details>
                                        <summary>
                                            I sometimes lie.
                                        </summary>
                                        मैं कभी कभी झूठ बोलता हूं
                                    </details>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" requiredN value='Sometimes' name="true2Self" id="true2SelfO">
                                <label class="form-check-label" for="true2SelfO">
                                    <details>
                                        <summary>
                                            I often lie.
                                        </summary>
                                        मैं अक्सर झूठ बोलता हूं।
                                    </details>
                                </label>
                            </div>
                        </div>

                        <div class="my-3 p-3 rounded shadow">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" requiredN value='Yes' name="lazy" id="lazyY">
                                <label class="form-check-label" for="lazyY">

                                    <details>
                                        <summary>
                                            I am LAZY.
                                        </summary>
                                        मैं आलसी हूं।
                                    </details>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" requiredN value='No' name="lazy" id="lazyN">
                                <label class="form-check-label" for="lazyN">
                                    <details>
                                        <summary>
                                            I am NOT LAZY.
                                        </summary>
                                        मैं आलसी नहीं हूं
                                    </details>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" requiredN value='Sometimes' name="lazy" id="lazyS">
                                <label class="form-check-label" for="lazyS">
                                    <details>
                                        <summary>
                                            sometimes LAZY.
                                        </summary>
                                        कभी-कभी आलसी।
                                    </details>
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="my-3 p-3 rounded shadow">
                    <sub><i class="fas fa-asterisk fa-xs  text-danger"></i></sub>
                    <div class="form-check">

                        <input class="form-check-input" type="radio" required value='Yes' name="honest" id="honestY">
                        <label class="form-check-label" for="honestY">
                            <details>
                                <summary>
                                    I have answered HONESTLY.
                                </summary>
                                मैंने ईमानदारी से उत्तर दिया है।
                            </details>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" required value='N0' name="honest" id="honestN">
                        <label class="form-check-label" for="honestN">
                            <details>
                                <summary>
                                    I have NOT answered HONESTLY.
                                </summary>
                                मैंने ईमानदारी से उत्तर नहीं दिया है।
                            </details>
                        </label>
                    </div>
                </div>
                <div class="container-fluid mb-4 p-4 right">
                    <button type="reset" class="btn btn-dark">Reset</button>
                    <button type="submit" name='submit' class="btn btn-primary center my-1">Submit</button>
                </div>
            </form>
        </div>
        <script>
            function resetValue() {
                console.log("request received");
                document.getElementById('utkn').value = "";
                document.getElementById('dob').value = "";
            }

            function verify(rg) {
                rg = document.getElementById(rg);
                // console.log("verifying data ",rg.value) ;
                if (rg.value < 33 || rg.value > 99) {
                    alert('invalid value!\nValue must be in Rang of 33 to 99 ');
                    rg.value = 60;
                }
            }
        </script>

    <?php
    } else {
    ?>
        <div class="alert alert-danger alert-closable fade show m-4" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong><?php echo $verified; ?></strong>, You should check in fields below.
        </div>
<?php
        goto enterUtkn;
    }
}
closePdoConn($pdo);

include '../assets/layouts/footer.php'
?>