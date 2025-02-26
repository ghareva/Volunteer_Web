<?php
include_once 'header.php';
?>

<head>
    <style>
        .container {
            display: flex;
            flex-wrap: wrap;
            max-width: 1100px;
            margin: auto;
            gap: 20px;
        }

        /* Sidebar */
        .sidebar {
            flex: 1;
            min-width: 250px;
            max-width: 300px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 20px;
        }

        .sidebar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .sidebar h2 {
            margin: 10px 0;
            font-size: 22px;
        }

        .sidebar p {
            font-size: 14px;
            color: gray;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 5px;
        }

        /* Main Content */
        .content {
            flex: 2;
            min-width: 500px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card h3, .card h4 {
            margin-bottom: 10px;
        }

        .card p {
            font-size: 14px;
            margin: 5px 0;
        }

        .profile img {
            width: 100px;  /* Adjust size as needed */
            height: 100px;
            border-radius: 50%;
            object-fit: cover; /* Ensures the image fills the circle properly */
            border: 3px solid #ddd; /* Optional: Adds a subtle border */
        }

        /* Tab Content (Initially Hidden) */
        .tabs {
            margin-top: 20px;
        }

        .tab-link {
            background-color: #ddd;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
            border-radius: 5px;
        }

        .tab-link.active {
            background-color: #4CAF50;
            color: white;
        }

        .tab-content {
            margin-top: 20px;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }
    </style>
</head>

<div class="container">
    <!-- Left Sidebar -->
    <aside class="sidebar">
        <div class="profile">
            <div class="profile-pic">
                <img src="images/blank-profile.png" alt="Profile Picture">
            </div>
            <h2>FirstName LastName</h2>
            <p>Volunteer</p>
        </div>

        <!-- Tab Navigation -->
        <div class="tabs">
            <button class="tab-link active" onclick="switchTab('profile')">Profile</button><br>
            <button class="tab-link" onclick="switchTab('about')">About</button><br>
            <button class="tab-link" onclick="switchTab('availability')">Availability</button>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="content">
        <section id="profile" class="tab-content active">
            <div class="card">
                <h3>User Details</h3>
                <p><strong>Full Name:</strong> FirstName LastName</p>
                <p><strong>Email:</strong> name@email.com</p>
                <p><strong>Phone:</strong> (123) 456-7890</p>
                <p><strong>Mobile:</strong> (123) 456-7890</p>
                <p><strong>Address:</strong> City, State</p>
            </div>
        </section>

        <!-- About Section -->
        <section id="about" class="tab-content">
            <div class="card">
                <h3>About</h3>
                <p>About Section Placeholder</p>
            </div>
        </section>

        <!-- Availability Section -->
        <section id="availability" class="tab-content">
            <div class="card">
                <h3>Availability</h3>
                <p>Availability Calendar Placeholder</p>
            </div>
        </section>


    </main>
</div>

<script>
    function switchTab(tabName) {
        // Hide all tab contents
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.remove('active');
        });

        // Remove 'active' class from all tab buttons
        document.querySelectorAll('.tab-link').forEach(tab => {
            tab.classList.remove('active');
        });

        // Show selected tab content
        document.getElementById(tabName).classList.add('active');

        // Highlight active tab button
        event.currentTarget.classList.add('active');
    }

    // Set default tab on page load
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelector('.tab-link').click();
    });

</script>

<?php
include_once 'footer.php';
?>

