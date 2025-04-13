<?php
include_once 'header.php';

include "classes/dbh.classes.php";
include "classes/profileinfo.classes.php";
include "classes/profileinfo-view.classes.php";
$profileInfo = new ProfileInfoView();

?>

<div class="container">
    <?php include_once 'sidebar.php'; ?>

    <!-- Main Content -->
    <main class="content">
        <section class="tab-content active">
            <div class="card">
                <h3>User Details</h3>
                <p><strong>Name: </strong><?php $profileInfo->fetchFirstName($_SESSION["id"]);?> <?php $profileInfo->fetchLastName($_SESSION["id"]);?></p>
                <p><strong>Email: </strong><?php $profileInfo->fetchEmail($_SESSION["id"]);?></p>
                <p><strong>Phone Number: </strong><?php $profileInfo->fetchPhoneNumber($_SESSION["id"]);?></p>
                <p><strong>Address: </strong><?php $profileInfo->fetchAddress($_SESSION["id"]);?></p>
                <br>
                <a href="User_ProfileSettings.php">Edit Profile</a>
            </div>
        </section>
    </main>
</div>

<?php
include_once 'footer.php';
?>

