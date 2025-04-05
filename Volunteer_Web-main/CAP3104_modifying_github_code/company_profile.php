<?php
//header  baby!
 include_once 'header.php';
// 1. Include DB class
 require_once __DIR__ . '/classes/dbh.classes.php';

// 2. Check if 'id' is set
if (!isset($_GET['id'])) {
    die("No company ID provided.");
}
$companyId = $_GET['id'];

// 3. Connect to DB and fetch company info
$dbObj = new dbh();
$conn  = $dbObj->getConnection();

$sql  = "SELECT * FROM volunteer_companies WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $companyId, PDO::PARAM_INT);
$stmt->execute();
$company = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$company) {
    die("Company not found.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo htmlspecialchars($company['name']); ?> - Details</title>
    <style>

        /* Minimal styling for demonstration */
        .company-profile {
            width: 500px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 12px;
        }
        .company-profile img {
            max-width: 100%;
        }

    </style>
</head>
<body>


<div class="company-profile">
    <?php if (!empty($company['image_url'])): ?>
        <img src="<?php echo $company['image_url']; ?>" alt="<?php echo htmlspecialchars($company['name']); ?>">
    <?php endif; ?>

    <h1><?php echo htmlspecialchars($company['name']); ?></h1>
    <p><strong>Address:</strong> <?php echo htmlspecialchars($company['address']); ?></p>
    <p><strong>City:</strong> <?php echo htmlspecialchars($company['city']); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($company['phone']); ?></p>
    <p><strong>Volunteering Type:</strong> <?php echo htmlspecialchars($company['volunteering_type']); ?></p>
    <p><strong>Organization Type:</strong> <?php echo htmlspecialchars($company['organization_type']); ?></p>
    <p><strong>Created At:</strong> <?php echo htmlspecialchars($company['created_at']); ?></p>

    <a href="volunteer_link.php">Back to Opportunities</a>
</div>

</body>
</html>


<?php
    include_once 'footer.php';
?>