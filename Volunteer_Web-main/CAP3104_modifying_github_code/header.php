<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Homepage</title>
    <link rel="stylesheet" href="General_style_sheet.css?v=<?php echo time(); ?>">
</head>
<body class = "light-mode">
<nav>
    <div class ="nav-left">
        <table>
            <tbody>
            <tr>
                <td>
                    <a href = "index.php" target = _self title = "Link to the Home page">Home</a>
                </td>
                <td>
                    <a href = "Volunteer_Page.php" target = _self title = "Link to the Volunteering page">Volunteer Link</a>
                </td>
                <td>
                    <a href = "GetHelp_Page.php" target = _self title = "Link to the Get Help page">Get help</a>
                </td>
                <td>
                    <a href = "Donate_Page.php" target = _self title = "Link to the Donate page" >Donate</a>
                </td>
                <td>
                    <a href = "About_Us_Page.php" target = _self title = "Link to the About us page" >About Us</a>
                </td>
                <td>
                    <a href = "HowAreWeDoing_Page.php" target = _self title = "Link to the Survey page" >Feedback Survey</a>
                </td>
            </tr>
            </tbody>

        </table>
    </div>
    <div class="nav-right">
        <table>
            <tbody>
            <tr>
                <?php
                /*
                if (isset($_SESSION['usersId']))
                {
                    echo "<a href = 'profile.php' target = _self title = 'Profile Page'>Profile Page</a>";
                    echo "<a href = 'includes/logout.inc.php' target = _self title = 'Logout'>Log out</a>";
                }
                else
                {
                    echo "<a href = 'login.php' target = _self title = 'Link to the Login page'>Sign Up/Log In</a>";
                }
                */
                ?>
                <?php
                    if(isset($_SESSION['id']))
                    {
                ?>
                    <td class="dropdown">
                        <a href="User_Profile.php" class="dropbtn"><?php echo $_SESSION["firstname"]; ?> ▾</a>
                        <div class="dropdown-content">
                            <a href="User_Profile.php">Profile Info</a>
                            <a href="User_Availability.php">Availability</a>
                            <a href="User_Calendar.php">Calendar</a>
                        </div>
                    </td>
                    <td>
                        <a href="includes/logout.inc.php">Logout</a>
                    </td>
                <?php
                    }
                    else
                    {
                ?>
                    <td>
                        <a href="login.php">Login</a>
                    </td>
                <?php
                    }
                ?>

            </tr>
            </tbody>
        </table>
        <div class="dark-mode-container">
      <label class="switch">
        <input type="checkbox" id="darkModeToggle">
        <span class="slider"></span>
      </label>
    </div>
    </div>
</nav>

<script src="script.js"></script>
</html>