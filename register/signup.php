<?php
session_start();
if (isset($_SESSION["email"])) {
    header("location: /posts/list.php");
    exit;
}
require_once './guest_header.php';
require_once '../util.php';
require_once '../db/conn.php';

$name = $email = $password = $phone = $gender = $address = "";
$err = false;
$err_detail = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST['name']);
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $phone = test_input($_POST['phone']);
    $gender = test_input($_POST['gender']);
    $address = test_input($_POST['address']);

    if (empty($name) || empty($email) || empty($password)) {
        $err = true;
        $err_detail = "Enter all details";
    }

    if (!$err) {
        //if the user already exist
        $stmt = $conn->prepare("SELECT * FROM `user` WHERE email=?");
        $stmt->bind_param("s", $paramEmailCheck);
        $paramEmailCheck = $email;
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        // print_r($user);
        if ($user) {
            // print_r();
            header("Location: login.php");
        } else {
            //for the new user
            $stmt_in = $conn->prepare("INSERT INTO `user` (`name`, `email`, `password`, `phone`, `gender`, `address`) VALUES (?,?,?,?,?,?)");
            $stmt_in->bind_param("ssssss", $paramName, $paramEmail, $paramPassword, $paramPhone, $paramGender, $paramAddress);

            $paramName = $name;
            $paramEmail = $email;
            $paramPassword = $password;
            $paramPhone = $phone;
            $paramGender = $gender;
            $paramAddress = $address;

            if ($stmt_in->execute()) {
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['valid'] = true;
                // echo $_SESSION['email'];

                header("Location: /posts/list.php");
            }
            $stmt_in->close();
        }

        $stmt->close();
    }
    $conn->close();
}

?>


<div class="container m-5">
    <h3>Please Register</h3>
    <form method="post" action="signup.php">
        <div class="form-group">
            <label for="inputName">Full name</label>
            <input type="text" name="name" value="" required class="form-control" id="inputName" placeholder="Name">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="email" name="email" required value="" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <div class="form-group col-md-6 password_container">
                <label for="inputPassword">Password</label>
                <input type="password" name="password" value="" required class="form-control" id="inputPassword" placeholder="Password">
                <i class="fa-solid fa-eye" id="eye"></i>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPhone">Phone No.</label>
                <input type="tel" name="phone" value="" class="form-control" id="inputPhone" placeholder="Phone">
            </div>
            <div class="form-group col-md-6">
                <label for="inputGender">Gender</label>
                <select id="inputGender" class="form-control" name="gender">
                    <option selected value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Address</label>
            <input type="text" name="address" value="" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>

<?php require_once './guest_footer.php';
