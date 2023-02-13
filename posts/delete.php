<?php
require_once "./../header.php";
require_once "../db/conn.php";

$id = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $sql_delete = "DELETE FROM user WHERE id=$id";

    if ($conn->query($sql_delete)) {
        header("Location: list.php");
    }
    $conn->close();
}

require_once "./../footer.php";
