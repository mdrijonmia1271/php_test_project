<?php

$conn = new mysqli('localhost', 'root', '', 'image_crud');
if (!$conn) {
    echo 'connected';
}


$emptSmg_firstName = '';
$emptSmg_lastName = '';
$emptSmg_email = '';
$emptSmg_password = '';
$emptSmg_passwordAgain = '';
$password = '';

if (isset($_POST['submit'])) {
    $user_first_name = $_POST['user_first_name'];
    $user_last_name = $_POST['user_last_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_password_again = $_POST['user_password_again'];

    // $md5_user_password = md5($user_password);

    if (empty($user_first_name)) {
        $emptSmg_firstName = "Fill up this field";
    }
    if (empty($user_last_name)) {
        $emptSmg_lastName = "Fill up this field";
    }
    if (empty($user_email)) {
        $emptSmg_email = "Fill up this field";
    }
    if (empty($user_password)) {
        $emptSmg_password = "Fill up this field";
    }
    if (empty($user_password_again)) {
        $emptSmg_passwordAgain = "Fill up this field";
    }
    if (!empty($user_first_name) && !empty($user_last_name) && !empty($user_email) && !empty($user_password) && !empty($user_password_again)) {
        if ($user_password === $user_password_again) {
            $sql = "INSERT INTO users (user_first_name, user_last_name, user_email, user_password) VALUE('$user_first_name','$user_last_name','$user_email','$user_password')";

            if ($conn->query($sql) == TRUE) {
                header('location:login.php?userCreated');
            }
        } else {
            $password = 'Password Not Match';
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login Page</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4" style="margin-top: 50px;">
                <form action="user.php" method="POST">
                    <div class="mt-2">
                        <?php if (isset($_POST['submit']) && empty(!$password)) : ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <span type="button" onclick="onclickErrorHide()" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></span>
                                <strong>Warning!</strong> <?php echo $password; ?>
                            </div>


                        <?php endif; ?>

                        <h1 style="text-align:center;">Create Account</h1>
                        <label for="" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="user_first_name" value="<?php if (isset($_POST['submit'])) {
                                                                                                    echo $user_first_name;
                                                                                                } ?>">
                        <?php if (isset($_POST['submit'])) {
                            echo "<span class ='text-danger'>" . $emptSmg_firstName . "</span>";
                        } ?>
                    </div>
                    <div class="mt-2">
                        <label for="" class="form-label">Last First Name</label>
                        <input type="text" class="form-control" name="user_last_name" value="<?php if (isset($_POST['submit'])) {
                                                                                                    echo $user_last_name;
                                                                                                } ?>">
                        <?php if (isset($_POST['submit'])) {
                            echo "<span class ='text-danger'>" . $emptSmg_lastName . "</span>";
                        } ?>
                    </div>
                    <div class="mt-2">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" name="user_email" value="<?php if (isset($_POST['submit'])) {
                                                                                                echo $user_email;
                                                                                            } ?>">
                        <?php if (isset($_POST['submit'])) {
                            echo "<span class ='text-danger'>" . $emptSmg_email . "</span>";
                        } ?>
                    </div>
                    <div class="mt-2">
                        <label for="" class="form-label">Password</label>
                        <input type="password" class="form-control" name="user_password" value="<?php if (isset($_POST['submit'])) {
                                                                                                    echo $user_password;
                                                                                                } ?>">
                        <?php if (isset($_POST['submit'])) {
                            echo "<span class ='text-danger'>" . $emptSmg_password . "</span>";
                        } ?>
                    </div>
                    <div class="mt-2">
                        <label for="" class="form-label">Password Again</label>
                        <input type="password" class="form-control" name="user_password_again" value="<?php if (isset($_POST['submit'])) {
                                                                                                            echo $user_password_again;
                                                                                                        } ?>">
                        <?php if (isset($_POST['submit'])) {
                            echo "<span class ='text-danger'>" . $emptSmg_passwordAgain . "</span>";
                        } ?>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-success" name="submit">Submit</button>
                    </div>
                </form>
                <h6>Have an account?<a href="login.php"> Login</a></h6>
            </div>
            <div class="col-4">

            </div>
        </div>
    </div>
    <script>
        function onclickErrorHide() {
            var displayStatus = document.querySelector(".alert");
            displayStatus.style.display = 'none';
        };
    </script>

</body>

</html>