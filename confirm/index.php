<?php

define('TITLE', "Confirm Details...");
include '../assets/layouts/header.php';

?>


<?php

if (isset($_POST['submit'])) {
    $utkn = $_POST['utkn'];
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

    $pdo = createPdoConn();

    $stmt = "SELECT gid, goal FROM `goals`;";

    $result = $pdo->query($stmt);
    $rows = $result->fetchAll(PDO::FETCH_NUM);

    closePdoConn($pdo);

?>
    <div class="container">
        <h2 class="text-center"><i class="fal fa-h1 fa-lg">Confirm your Details</i></h2>
        <form action="../Thanks/index.php" method="post">
            <div class="my-3 p-3 rounded shadow">
                <div class="mb-3">
                    <label for="utkn" class="form-label">
                        <sub><i class="fas fa-asterisk fa-xs text-danger"></i></sub>
                        UNIQUE Token
                    </label>
                    <span class="form-control p-2"><?php echo $utkn ?></span>
                    <input name="utkn" value="<?php echo $utkn ?>" hidden type="text" required>
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
                    <option value="BCA-I" <?php if ($cls == "BCA-I") echo "selected" ?> >BCA-I</option>
                    <option value="BCA-II" <?php if ($cls == "BCA-II") echo "selected" ?> >BCA-II</option>
                    <option value="BCA-III" <?php if ($cls == "BCA-III") echo "selected" ?> >BCA-III</option>
                    <option value="PGDCA" <?php if ($cls == "PGDCA") echo "selected" ?> >PGDCA</option>
                </select>
            </div>
            <div class="my-3 p-3 rounded shadow">
                <fieldset>
                    <!-- <legend> -->
                    <i class="fas fa-asterisk fa-xs  text-danger"></i>
                    <details>
                        <summary>
                            Marks %
                        </summary>
                        अंक %
                    </details>

                    <!-- </legend> -->
                    <label for="marks" class="form-label">class 9<sup>th</sup></label>
                    <input onchange="rgv9.value=rg9.value" type="range" name="marks9" id="rg9" value="50" max="99" min="33" disabled value="<?php echo $marks9; ?>">
                    <input onchange="rg9.value=rgv9.value; verify('rgv9')" type="number" name="marks9" max="99" min="33" id="rgv9" maxlength="2" disabled value="<?php echo $marks9; ?>"><br />

                    <label for="marks" class="form-label">class 10<sup>th</sup></label>
                    <input onchange="rgv10.value=rg10.value " type="range" name="" id="rg10" value="50" max="99" min="33" disabled value="<?php echo $marks10; ?>">
                    <input onchange="rg10.value=rgv10.value ; verify('rgv10')" type="number" name="marks10" max="99" min="33" id="rgv10" maxlength="2" disabled value="<?php echo $marks10; ?>"><br />

                </fieldset>

            </div>
            <div class="my-3 p-3 rounded shadow">
                <div class="mb-3">
                    <label for="interest" class="form-label">
                        <details>
                            <summary>
                                I am interested in
                            </summary>
                            मुझे इसमें दिलचस्पी है :
                        </details>
                    </label>
                    <input type="text" required placeholder="Painting, Singing etc." class="form-control" name="interest" id="interest" aria-describedby="helpId" placeholder="" disabled value="<?php echo $interest; ?>">
                    <!-- <small id="helpId" class="form-text text-muted">Help text</small> -->
                </div>

            </div>

            <div class="my-3 p-3 rounded shadow">
                <i class="fas fa-asterisk fa-xs  text-danger"></i>
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
                            <input type="radio" name="goal" required value="<?php echo $row[0]; ?>" <?php if ($row[0] == $goal) echo "checked" ?> class="form-check-input" disabled>
                            <span class="custom-control-indicator"></span>
                            <span class="custom-control-description"><?php echo $row[1]; ?></span>
                        </label> <br>
                    <?php
                    }
                    ?>

                </fieldset>
            </div>
            <div class="my-3 p-3 rounded shadow">
                <i class="fas fa-asterisk fa-xs  text-danger"></i>
                <label for="willPow"><i class="fas fa-flushed text-primary   "></i></label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" required value='Yes' name="willPow" id="willPowY" <?php if ($willPow == 'Yes') echo "checked" ?> disabled>
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
                    <input class="form-check-input" type="radio" required value='No' name="willPow" id="willPowN" <?php if ($willPow == 'No') echo "checked" ?> disabled>
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
                            <input class="form-check-input" type="radio" value='Yes' name="true2Others" id="true2OthersY" disabled <?php if ($true2Others == 'Yes') echo "checked" ?>>
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
                            <input class="form-check-input" type="radio" value='No' name="true2Others" id="true2OthersN" disabled <?php if ($true2Others == 'No') echo "checked" ?>>
                            <label class="form-check-label" for="true2OthersN">
                                <details>
                                    <summary>I sometimes lie.
                                    </summary>
                                    मैं कभी कभी झूठ बोलता हूं
                                </details>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value='Sometimes' name="true2Others" id="true2OthersO" disabled <?php if ($true2Others == 'Sometimes') echo "checked" ?>>
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
                            <input class="form-check-input" type="radio" value='Yes' name="true2Self" id="true2SelfY" <?php if ($true2Self == 'Yes') echo "checked" ?> disabled>
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
                            <input class="form-check-input" type="radio" value='No' name="true2Self" id="true2SelfN" <?php if ($true2Self == 'No') echo "checked" ?> disabled>
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
                            <input class="form-check-input" type="radio" value='Sometimes' name="true2Self" id="true2SelfO" <?php if ($true2Self == 'Sometimes') echo "checked" ?> disabled>
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
                            <input class="form-check-input" type="radio" value='Yes' name="lazy" disabled id="lazyY" <?php if ($lazy == 'Yes') echo "checked" ?>>

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
                            <input class="form-check-input" type="radio" value='No' name="lazy" disabled id="lazyN" <?php if ($lazy == 'No') echo "checked" ?>>
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
                            <input class="form-check-input" type="radio" value='Sometimes' name="lazy" disabled id="lazyS" <?php if ($lazy == 'Sometimes') echo "checked" ?>>
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

                <i class="fas fa-asterisk fa-xs  text-danger"></i>
                <div class="form-check">

                    <input class="form-check-input" type="radio" required value='Yes' name="honest" id="honestY" <?php if ($honest == 'Yes') echo "checked" ?> disabled>
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
                    <input class="form-check-input" type="radio" required value='No' name="honest" id="honestN" <?php if ($honest == 'No') echo "checked" ?> disabled>
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
                <span id=inputBtn class="btn btn-primary" onclick="toggelAbility();">
                    <i id="icon" class="fas fa-edit fa-sm"></i> <span id="btnText"> Edit </span>
                </span>
                <button onclick="toggleAllInputFileds(true)" type="submit" name='submit' class="btn btn-success center my'NA'">Submit</button>
            </div>
        </form>

    </div>
    <script>
        function verify(rg) {
            rg = document.getElementById(rg);
            // console.log("verifying data ",rg.value) ;
            if (rg.value < 33 || rg.value > 99) {
                alert('invalid value!\nValue must be in Rang of 33 to 99 ');
                rg.value = 60;
            }
        }

        let enabled = false;
        let b = document.getElementById('sd');

        function toggelAbility() {
            icon = document.getElementById('icon');
            if (!enabled) {
                // to enable all fields and show done icon
                toggleAllInputFileds(true);
                icon.setAttribute('class', 'fa fa-check-circle')
                btnText.innerHTML = "OK"
                enabled = true;
            } else {
                // to disable all fields and show done icon
                toggleAllInputFileds(false);
                icon.setAttribute('class', 'fas fa-edit fa-xs')
                btnText.innerHTML = "Edit"
                enabled = false;
            }
        }

        function toggleAllInputFileds(flag) {
            let inputFields = document.getElementsByTagName('input')

            //  console.log("inputFields.length ",inputFields.sizeof()) ;
            for (i = 0; i < inputFields.length; i++) {
                if (flag) {
                    inputFields[i].disabled = false;
                } else {
                    inputFields[i].disabled = true;
                }
            }
        }
    </script>
<?php
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