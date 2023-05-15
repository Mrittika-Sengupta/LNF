<?php include('menu.php'); ?>

<!DOCTYPE html>
<?php
setcookie("group8", "group 8", time() + 2 * 24 * 60 * 60);
?>
<html>

<body>
    <?php
    if (isset($_COOKIE["group8"])) {
        echo "Cookie of " . $_COOKIE["group8"];
    } else {
        echo "No cookie for grp8.";
    }
    ?>
    <p>
        <strong>Note:</strong>
        You might have to reload the page
        to see the value of the cookie.
    </p>

</body>

</html>

<div class="main-content"><br>
    <h2>Lost and Found Items</h2>

    <?php
    if (isset($_SESSION['add'])) {
        echo $_SESSION['add'];
        unset($_SESSION['add']);
    }


    if (isset($_SESSION['upload'])) {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }

   

    ?>

    <table class="tbl-full">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Username</th>
                <th>Item Name</th>
                <th>Description</th>
                <th>Select Item Image</th>
                <th>category</th>
                <th>location</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = mysqli_connect("localhost", "root", "", "lnf") or die(mysqli_error()); //Database Connection
            
            if (isset($_GET['search'])) {
                $filtervalues = $_GET['search'];
                $query = "SELECT * FROM found_items WHERE title LIKE '%$filtervalues%' OR location LIKE '%$filtervalues%' OR description LIKE '%$filtervalues%' OR date LIKE '%$filtervalues%'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $items) {
                        ?>
                        <tr>
                            <td>
                                <?= $items['id']; ?>
                            </td>
                            <td>
                                <?= $items['username']; ?>
                            </td>
                            <td>
                                <?= $items['title']; ?>
                            </td>
                            <td>
                                <?= $items['description']; ?>
                            </td>
                            <td>
                                <?= $items['image_name']; ?>
                            </td>
                            <td>
                                <?= $items['category']; ?>
                            </td>
                            <td>
                                <?= $items['location']; ?>
                            </td>
                            <td>
                                <?= $items['date']; ?>
                            </td>
                        </tr>
                        <?php
                    }

                } else {
                    ?>
                    <h3>no record found</h3>
                    <?php
                }
            }
            ?>
        </tbody>

        <?php
        $sql = "SELECT * FROM found_items";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        $sn = 1;

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $username = $row['username'];
                $title = $row['title'];
                $description = $row['description'];
                $image_name = $row['image_name'];
                $category = $row['category'];
                $location = $row['location'];
                $date = $row['date'];
                ?>

                <tr>
                    <td>
                        <?php echo $sn++; ?>
                    </td>
                    <td>
                        <?php echo $username; ?>
                    </td>
                    <td>
                        <?php echo $title; ?>
                    </td>
                    <td>
                        <?php echo $description; ?>
                    </td>
                    <td>
                        <?php
                        if ($image_name == "") {
                            echo "<div class='error'>Image not Added.</div>";
                        } else {
                            ?>
                            <img src="<?php echo SITEURL; ?>image/<?php echo $image_name; ?>" width="100px"><?php
                        }
                        ?>
                    </td>
                    <td>
                        <?php echo $category; ?>
                    </td>
                    <td>
                        <?php echo $location; ?>
                    </td>
                    <td>
                        <?php echo $date, "Y/m/d ";
                        ; ?>
                    </td>

                    <?php
            }
        } else {
            echo "<tr> <td colspan='7' class='error'> Item not Added Yet. </td> </tr>";
        }

        ?>

    </table>


</div>


</div>