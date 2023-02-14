<?php
require_once "./../header.php";
require_once "../db/conn.php";

$limit = 4;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    //opening the page for the first time
    $page = 1;
}
$offset = ($page - 1) * $limit;

// for sorting
$sort_by = "name";  //default by name
if (isset($_GET['sort_by'])) {
    $sort_by = $_GET['sort_by'];
}

if (isset($_GET['order'])) {
    $sort_order = $_GET['order'];
} else {
    //opening the page for the first time
    $sort_order = "";
}

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
} else {
    //opening the page for the first time
    $keyword = '';
}


// sql for receiving the data from table
//we have another query in pagination also so edit the sql accordingly
$sql = "SELECT * FROM posts WHERE CONCAT_WS('',name,description) LIKE '%$keyword%' ORDER BY {$sort_by} {$sort_order} LIMIT {$offset},{$limit}";
$result = $conn->query($sql);
?>


<div class="container p-4">
    <!--  -->
    <form class="input-group w-25 mb-2" action="list.php">
        <input type="search" name="keyword" value="<?= $keyword ?>" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button type="submit" class="btn btn-outline-primary">search</button></a>
    </form>

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <!-- <th scope="col">Id</th> -->
                <th scope="col">Name <a href="list.php?order=<?= (empty($sort_order) ? "DESC" : "") . "&sort_by=name&keyword=" . $keyword ?>"><i class="fa fa-fw fa-sort" style="color:white"></a></th>
                <th scope="col">Desc <a href="list.php?order=<?= (empty($sort_order) ? "DESC" : "") . "&sort_by=description&keyword=" . "&keyword=" . $keyword ?>"><i class="fa fa-fw fa-sort" style="color:white"></a></th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Delete</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>

            <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {

            ?>

                    <tr>
                        <!-- <td><?= $row["id"] ?></td> -->
                        <td><?= $row["name"] ?></td>
                        <td><?= $row["description"] ?></td>
                        <td><?= $row["created_at"] ?></td>
                        <td><?= $row["updated_at"] ?></td>
                        <td>
                            <form method="post" action="delete.php">
                                <input type="hidden" name="id" value=<?= $row["id"] ?>>
                                <button type="submit" class="btn btn-light"><i style='font-size:20px' class='far'>&#xf2ed;</i></button>
                            </form>
                        </td>

                        <td>
                            <form method="post" action="edit.php">
                                <input type="hidden" name="id" value=<?= $row["id"] ?>>
                                <input type="hidden" name="name" value=<?= $row["name"] ?>>
                                <input type="hidden" name="desc" value=<?= $row["description"] ?>>
                                <input type="hidden" name="nonce" value=<?= 2 ?>>
                                <button type="submit" class="btn btn-light"><i style='font-size:20px' class='far'>&#xf044;</i></button>

                            </form>
                        </td>
                    </tr>

            <?php
                }
            } else {
                // echo "0 results";
            }
            // $conn->close();
            ?>

        </tbody>
    </table>

    <div>
        <!-- pagination code -->
        <?php
        $sql1 = $sql; // correct this
        require_once "pagination.php";
        $conn->close();
        ?>
        <!-- used to display the range of rows -->
        <div class="float-left"><?php

                                echo "Showing " . ((($offset  + $limit) > $total_rows) ? (($offset + 1) . " to " . ($total_rows))
                                    : (($offset + 1) . " to " . ($offset  + $limit))) . " of " . $total_rows . " entries";
                                ?></div>

    </div>

</div>


<?php require_once "./../footer.php" ?>