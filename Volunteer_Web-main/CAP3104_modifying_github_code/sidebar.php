<!-- sidebar.php -->
<aside class="sidebar">
    <div class="profile">
        <div class="profile-pic">
            <?php
            $profile_picture = isset($_SESSION['profile_picture']) ? $_SESSION['profile_picture'] : 'images/blank-profile.png';
            ?>
            <img src="<?php echo $profile_picture; ?>" alt="Profile Picture">
        </div>
        <h2><?php echo $_SESSION["firstname"]; ?> <?php echo $_SESSION["lastname"]; ?></h2>
        <p>Volunteer</p>
    </div>

    <!-- Navigation -->
    <div class="tabs">
        <button class="tab-link <?= in_array(basename($_SERVER['PHP_SELF']), ['User_Profile.php', 'User_ProfileSettings.php']) ? 'active' : '' ?>"
                              onclick="window.location.href='User_Profile.php'">
            Profile
        </button><br>



        <button class="tab-link <?= basename($_SERVER['PHP_SELF']) == 'User_Availability.php' ? 'active' : '' ?>"
                onclick="window.location.href='User_Availability.php'">
            Availability
        </button><br>

        <button class="tab-link <?= basename($_SERVER['PHP_SELF']) == 'User_Calendar.php' ? 'active' : '' ?>"
                onclick="window.location.href='User_Calendar.php'">
            Calendar
        </button>
    </div>
</aside>
