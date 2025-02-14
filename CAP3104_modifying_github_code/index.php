<?php
    session_start();
?>

<?php
    include_once 'header.php';
?>

<input class="search-bar" type="text" placeholder="Search for PLACES TO VOLUNTEER">
<input type = "submit" title = "Search">

<div class="leaderboard">
    <h3>Leaderboard Top Volunteer</h3>
    <ul>
        <li>BRADONATOR - Volunteered 144 hours this week</li>
        <li>GAV - Volunteered 99 hours this week</li>
        <li>BUNCHES101 - sucks~ 100 hours this week</li>
        <!--Are we doing more that top 3 in the leaderboard? -->

    </ul>
</div>

<div class="featured-places">
    <break><h3>Featured Places</h3></break>
    <div class="place">⭐️⭐️⭐️⭐️⭐️
        <img src = "images/Mcdonalds.png" class="image-hover" height = 150px width = 150px/>
    </div>

    <div class="place">⭐️⭐️⭐️⭐️⭐️
        <img src = "images/orlando-health-logo-hover.png" class="image-hover" height = 150px width = 150px/>
    </div>

    <div class="place">⭐️⭐️⭐️⭐️⭐️
        <img src = "images/Orlando_Cares.jpg" class="image-hover" height = 150px width = 150px/>
    </div>

</div>

<?php
    include_once 'footer.php';
?>