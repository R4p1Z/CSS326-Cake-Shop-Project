<?php
session_start();
require_once '../config/connect.php';

// Check if the user is logged in
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location: login.php');
    exit; // Add exit to stop script execution after redirecting
}

// Include header and navigation
include 'inc/header.php';
include 'inc/nav.php';

?>

<section id="content">
    <div class="content-blog">
        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Category Name</th>
                        <th>Thumbnail</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query to retrieve all products
                    $sql = "SELECT * FROM product";
                    $res = mysqli_query($connection, $sql);

                    // Loop through the results and display them in the table
                    while ($r = mysqli_fetch_assoc($res)) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo $r['id']; ?></th>
                            <td><?php echo $r['name']; ?></td>
                            <td><?php echo $r['catid']; ?></td>
                            <td><?php echo ($r['thumb']) ? "Yes" : "No"; ?></td>
                            <td><a href="editproduct.php?id=<?php echo $r['id']; ?>">Edit</a> | <a href="delproduct.php?id=<?php echo $r['id']; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include 'inc/footer.php'; ?>
