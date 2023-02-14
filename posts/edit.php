<?php
require_once "../header.php";
require_once "../db/conn.php";
require_once "../util.php";

$name = $desc = $id = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST['name']);
    $desc = test_input($_POST["desc"]);
    $id = test_input($_POST["id"]);
    $nonce = test_input($_POST["nonce"]);

    if ($nonce == 2) {
        //request from list.php
    }
    if ($nonce == 1) {
        // request made from the same file
        $sql = "UPDATE `posts` SET `name` = '$name', `description` = '$desc', `updated_at` = now() WHERE `posts`.`id` = '$id' ";
        $conn->query($sql);
        $conn->close();
        header("Location: list.php");
    }
}

?>

<div class="form_container p-5">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value=<?= $name ?>>
        </div>
        <div class="form-group">
            <label for="name">Description</label>
            <input type="text" class="form-control" id="description" name="desc" value=<?= $desc ?>>
            <!-- sending nonce value to identify this page-->
            <input type="hidden" name="nonce" value=<?= 1 ?>>
            <input type="hidden" name="id" value=<?= $id ?>>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
</div>

<?php

require_once "../footer.php";
