<?php 
include 'config.php';

error_reporting(0);

session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: berhasil_login.php");
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: berhasil_login.php");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
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
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class = "card">
            <div class ="row">
                <div class = "col-md-6">
                    <div class ="left-card">
                    <form action="" method="POST" class="login-email">
                        <header class="login-text">Login</header>
                        <div class="input-group">
                            <i class="fa fa-envelope"></i>
                            <input class="myInput" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                        </div>
                        <div class="input-group">
                            <i class="fa fa-lock"></i>
                            <input class="myInput" type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                        </div>
                        <div class="input-group">
                            <button name="submit" class="btn">Login</button>
                        </div>
                        <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
                    </form>
                    </div>
                </div>
                <div class = "col-md-6">
                    <div class ="right-card">
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