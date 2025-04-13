<?php
    include_once 'header.php';
    require_once __DIR__ . '/classes/dbh.classes.php';
?>

<div class="leaderboard">

    <h3>Leaderboard Top Volunteer</h3>
    <ul class = "leaderboard_text">

        <?php
            // Instantiate and connect
            $dbObj = new dbh();
            $conn  = $dbObj->getConnection();

            // Select top 3 users based on userHours
            $sql = "SELECT firstname, lastname, volunteer_hours FROM users ORDER BY volunteer_hours DESC LIMIT 3";
            $stmt = $conn->prepare($sql); 
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

            if (count($result) > 0) { 
                foreach ($result as $row) {
                    echo "<li>{$row['firstname']} {$row['lastname']} - {$row['volunteer_hours']} hours</li>";
                }
            }
        ?>
    </ul>

    <h3> Everyone </h3>
    <ul class = "leaderboard_text">

        <?php
            // Instantiate and connect
            $dbObj = new dbh();
            $conn  = $dbObj->getConnection();

            // Select all users sorted by userHours
            $sql = "SELECT firstname, lastname, volunteer_hours FROM users ORDER BY volunteer_hours DESC";
            $stmt = $conn->prepare($sql); 
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

            if (count($result) > 0) { 
                foreach ($result as $row) {
                    echo "<li>{$row['firstname']} {$row['lastname']} - {$row['volunteer_hours']} hours</li>";
                }
            }
        ?>
    </ul>
</div>


<div class="featured-places">

    <h3>Featured Places</h3>

    <?php
        //instantiate and connect
        $dbObj = new dbh();
        $conn  = $dbObj->getConnection();

        $sql = "SELECT * FROM volunteer_companies LIMIT 3";
        $stmt = $conn->prepare($sql); 
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 

        if (count($result) > 0) {
            foreach ($result as $row) {
                // Use the image URL directly if it's a full URL; otherwise, prepend 'images/'
                $imageUrl = !empty($row['image_url']) ? htmlspecialchars($row['image_url']) : 'https://via.placeholder.com/150';

                echo '<div class="place">';
                echo '⭐️⭐️⭐️⭐️⭐️';
                echo '<a href="company_profile.php?id=' . $row['id'] . '">';
                echo '<img src="' . $imageUrl . '" class="image-hover" height="150px" width="150px" />';
                echo '</a>';
                echo '</div>';
            }
        }

    ?>

</div>



<?php
    include_once 'footer.php';
?>