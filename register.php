<?php 
 
include 'config.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
 
    if ($password == $cpassword) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0) {
            $sql = "INSERT INTO users (username, email, password)
                    VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST['cpassword'] = "";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
         
    } else {
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/style.css">
 
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class = "card">
            <div class = "row">
                <div class = "col-md-6">
                    <div class = "left-card">
                    <form action="" method="POST" class="login-email">
                        <header class="login-text">Register</header>
                        <div class="input-group">
                            <i class="fa fa-user"></i>
                            <input class ="myInput" type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
                        </div>
                        <div class="input-group">
                            <i class="fa fa-envelope"></i>
                            <input class ="myInput" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                        </div>
                        <div class="input-group">
                            <i class="fa fa-lock"></i>
                            <input class ="myInput" type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                        </div>
                        <div class="input-group">
                            <i class="fa fa-lock"></i>
                            <input class ="myInput" type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                        </div>
                        <div class="input-group">
                            <label>
                                <input id="check_1" name="check_1"  type="checkbox" required><small> I read and agree to Terms & Conditions</small></input> 
                                <div class="invalid-feedback">You must check the box.</div>
                                </label>
                        </div>
                        <div class="input-group">
                            <button name="submit" class="btn">Register</button>
                        </div>
                        <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login </a></p>
                    </form>
                    </div>
                </div>
                <div class = "col-md-6">
                    <div class = "right-card">
                        <div class="box">
                                    <header>Hello, UNIMED!</header>
                                    <p>Universitas Negeri Medan adalah salah satu perguruan tinggi negeri di Sumatra Utara, Indonesia. 
                                        Berlokasi di Jalan Willem Iskandar, Pasar V Medan Estate, Percut Sei Tuan, Deli Serdang.
                                    </p>
                                    <a href="https://www.unimed.ac.id/" class= "butt_out">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>