<?php
error_reporting(E_ALL);
require_once "../db/conn.php";
require_once "../header.php";
require_once "../util.php";

$name = $desc = "";
$name_err = $desc_err = "";
$err = false;
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = test_input($_POST["name"]);
    $desc = test_input($_POST["desc"]);

    //if name is empty
    if (empty($name)) {
        $name_err = "Name can't be empty";
        $err = true;
    }
    //
    if (empty($desc)) {
        $desc_err = "Description can't be empty";
        $err = true;
    }

    if (!$err) {

        $sql = "INSERT INTO `user` (`name`, `description`, `created_at`, `updated_at`) VALUES ('$name', '$desc' , now(), now())";

        if ($conn->query($sql) === true) {
            $msg = "Added successfully  ";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

?>
<?php if (!empty($msg)) {?>
    <div class="alert alert-danger alert-dismissible show">
        <strong><?=$msg;?></strong>
    </div>
<?php }?>
<div class="form_container p-5">
    <form method="post" action="add.php">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="name">Description</label>
            <input type="text" class="form-control" id="description" name="desc" placeholder="Description">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>
</div>
<?php require_once "../footer.php"?>