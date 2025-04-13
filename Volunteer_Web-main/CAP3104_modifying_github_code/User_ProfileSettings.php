<?php
include_once 'header.php';

include "classes/dbh.classes.php";
include "classes/profileinfo.classes.php";
include "classes/profileinfo-view.classes.php";
$profileInfo = new ProfileInfoView();

?>

<style>
    .form-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .form-group {
        flex: 1 1 45%;
        display: flex;
        flex-direction: column;
    }

    .form-group input,
    .form-group select {
        padding: 8px;
        font-size: 1rem;
        margin-top: 4px;
    }

    .card form {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    button[type="submit"] {
        align-self: flex-start;
        padding: 10px 20px;
        font-size: 1rem;
    }
</style>


<div class="container">
    <?php include_once 'sidebar.php'; ?>
    <main class="content">
        <section class="tab-content active">
            <div class="card">
                <h3>User Details</h3>
                <form action="includes/profileinfo.inc.php" method="post" enctype="multipart/form-data">
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="firstname"><strong>First Name:</strong></label>
                            <input type="text" name="firstname" id="firstname" placeholder="First Name" value = "<?php $profileInfo->fetchFirstName($_SESSION["id"]);?>">
                        </div>
                        <div class="form-group">
                            <label for="lastname"><strong>Last Name:</strong></label>
                            <input type="text" name="lastname" id="lastname" placeholder="Last Name" value = "<?php $profileInfo->fetchLastName($_SESSION["id"]);?>">
                        </div>
                        <div class="form-group">
                            <label for="email"><strong>Email:</strong></label>
                            <input type="text" name="email" id="email" placeholder="Email" value = "<?php $profileInfo->fetchEmail($_SESSION["id"]);?>">
                        </div>
                        <div class="form-group">
                            <label for="phonenumber"><strong>Phone Number:</strong></label>
                            <input type="text" name="phonenumber" id="phonenumber" placeholder="Phone Number" value = "<?php $profileInfo->fetchPhoneNumber($_SESSION["id"]);?>">
                        </div>
                        <div class="form-group">
                            <label for="streetname"><strong>Street Name:</strong></label>
                            <input type="text" name="streetname" id="streetname" placeholder="Street Name" value = "<?php $profileInfo->fetchStreetName($_SESSION["id"]);?>">
                        </div>
                        <div class="form-group">
                            <label for="city"><strong>City:</strong></label>
                            <input type="text" name="city" id="city" placeholder="City" value = "<?php $profileInfo->fetchCity($_SESSION["id"]);?>">
                        </div>
                        <div class="form-group">
                            <label for="state"><strong>State:</strong></label>
                            <select name="state" id="state">
                                <option value="">-- Select State --</option>
                                <?php
                                $states = [
                                    "AL" => "Alabama", "AK" => "Alaska", "AZ" => "Arizona", "AR" => "Arkansas",
                                    "CA" => "California", "CO" => "Colorado", "CT" => "Connecticut", "DE" => "Delaware",
                                    "FL" => "Florida", "GA" => "Georgia", "HI" => "Hawaii", "ID" => "Idaho",
                                    "IL" => "Illinois", "IN" => "Indiana", "IA" => "Iowa", "KS" => "Kansas",
                                    "KY" => "Kentucky", "LA" => "Louisiana", "ME" => "Maine", "MD" => "Maryland",
                                    "MA" => "Massachusetts", "MI" => "Michigan", "MN" => "Minnesota", "MS" => "Mississippi",
                                    "MO" => "Missouri", "MT" => "Montana", "NE" => "Nebraska", "NV" => "Nevada",
                                    "NH" => "New Hampshire", "NJ" => "New Jersey", "NM" => "New Mexico", "NY" => "New York",
                                    "NC" => "North Carolina", "ND" => "North Dakota", "OH" => "Ohio", "OK" => "Oklahoma",
                                    "OR" => "Oregon", "PA" => "Pennsylvania", "RI" => "Rhode Island", "SC" => "South Carolina",
                                    "SD" => "South Dakota", "TN" => "Tennessee", "TX" => "Texas", "UT" => "Utah",
                                    "VT" => "Vermont", "VA" => "Virginia", "WA" => "Washington", "WV" => "West Virginia",
                                    "WI" => "Wisconsin", "WY" => "Wyoming"
                                ];
                                $userState = $profileInfo->getState($_SESSION["id"]);
                                foreach ($states as $abbr => $state) {
                                    $selected = ($abbr === $userState) ? 'selected' : '';
                                    echo "<option value=\"$abbr\" $selected>$state</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="zipcode"><strong>Zipcode:</strong></label>
                            <input type="text" name="zipcode" id="zipcode" placeholder="Zipcode" value = "<?php $profileInfo->fetchZipcode($_SESSION["id"]);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image">Choose image to upload:</label>
                        <input type="file" name="image" id="image" accept="image/*">
                    </div>
                    <button type="submit" name="submit">SAVE</button>
                </form>
                <?php
                if (isset($_GET["error"])) {
                    switch ($_GET["error"]) {
                        case "emptyinput":
                            echo "<p style='color: red;'>Please fill in all fields.</p>";
                            break;
                        case "invalidemail":
                            echo "<p style='color: red;'>Please enter a valid email.</p>";
                            break;
                        case "invalidphone":
                            echo "<p style='color: red;'>Please enter a valid phone number.</p>";
                            break;
                        case "invalidzipcode":
                            echo "<p style='color: red;'>Please enter a valid zipcode (e.g., 12345 or 12345-6789).</p>";
                            break;
                        case "invalidname":
                            echo "<p style='color: red;'>Names can only contain letters, spaces, hyphens, and apostrophes.</p>";
                            break;
                    }
                }
                ?>
            </div>
        </section>
    </main>
</div>
<?php
include_once 'footer.php';
?>

