<?php
session_start();
if (isset($_SESSION["email"])) {
    header("location: /posts/list.php");
    exit;
}
require_once __DIR__ . '/guest_header.php';
require_once __DIR__ . '/../util.php';
require_once __DIR__ . '/../db/conn.php';

$email = $password = "";
$err = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);

    if (empty($email) || empty($password)) {
        $err = true;
    }
    if (!$err) {
        $stmt = $conn->prepare("SELECT * FROM `user` WHERE email=? AND password=?");
        $stmt->bind_param("ss", $paramEmail, $paramPassword);
        $paramEmail = $email;
        $paramPassword = $password;
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        // print_r($user);

        if ($user) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['valid'] = true;
            header("Location: ../index.php");
        } else {
            echo "not exist";
        }

        $stmt->close();
    }
    $conn->close();
}


?>

<div class="container mt-5">
    <h3>Please Login</h3>
    <span class="error text-danger" style="font-size: 13px;"> <?php echo "$err"; ?> </span>


    <form action="login.php" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name="email" type="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="">

        </div>
        <div class="form-group position-relative password_container">
            <label for="inputPassword">Password</label>
            <input name="password" type="password" required class="form-control" id="inputPassword" placeholder="Password" value="">
            <i class="fa-solid fa-eye" id="eye"></i>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>


<?php require_once __DIR__ . '/guest_footer.php';
