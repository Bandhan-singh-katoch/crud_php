<?php
require_once "./../header.php";
require_once "../db/conn.php";

$sql = "SELECT `id`,`name`,`description`,`created_at`,`updated_at` FROM user";
$result = $conn->query($sql);
// echo "<pre>";
//  print_r($result);
// echo "</pre>";
?>



<div class="table_container p-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Desc</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
            </tr>
        </thead>
        <tbody>

            <?php

            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {

            ?>

                    <tr>
                        <td><?= $row["id"] ?></td>
                        <td><?= $row["name"] ?></td>
                        <td><?= $row["description"] ?></td>
                        <td><?= $row["created_at"] ?></td>
                        <td><?= $row["updated_at"] ?></td>
                    </tr>

            <?php
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>

        </tbody>
    </table>
</div>


<?php require_once "./../footer.php" ?>