<?php
session_start();

if(isset($_SESSION['username'])){
    if($_SESSION['role'] == 0){
        header("location: http://localhost/renal-web/admin/index.php");
    }elseif ($_SESSION['role'] == 1) {
        header("location: http://localhost/renal-web/user-doctor.php");
    }elseif ($_SESSION['role'] == 2) {
        header("location: http://localhost/renal-web/user-staff.php");
    }
}
?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Renal Project</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<style>
body::before {
    margin: 0;
    padding: 0;
    content: "";
    background: url(images/bg1.jpg) no-repeat center center fixed;
    background-size: cover;
    position: absolute;
    top: 0px;
    left: 0px;
    height: 100%;
    width: 100%;
    z-index: -1;
    opacity: 0.81;
}

.container-fluid {
    width: 30%;
}

@media only screen and (max-width: 600px) {
    .container-fluid {
        width: 100%;
    }

    h1 {
        position: absolute;
        top: 0;
    }
}

@media only screen and (min-width: 600px) {
    form {
        position: relative;
        left: 80%;
    }
}

/* form {
    border-radius: 10px;
    margin-top: 50%;
} */

h1 {
    position: absolute;
    top: 0;
    right: 20%;
    color: orange;
    font-family: 'Lobster', cursive;
}
</style>

<body>
    <div class="container-fluid">
        <h1 class="animate__animated animate__slideInLeft"><strong>Renal Project</strong></h1>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" class="animate__animated animate__slideInRight" method="POST">
            <h3 class="heading">Register</h3>
            <!-- Form Start -->
            <div class="form-group aa">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>
            <div class="form-group aa">
                <label>Date of Birth</label>
                <input type="text" name="dob" class="form-control" placeholder="DD/MM/YYYY" required>
            </div>
            <div class="form-group aa">
                <label>Qualification</label>
                <input type="text" name="qualification" class="form-control" placeholder="Degree/Diploma" required>
            </div>
            <div class="form-group aa">
                <label>Institute Name</label>
                <input type="text" name="institute" class="form-control" placeholder="XYZ college" required>
            </div>
            <div class="form-group aa">
                <label>Internship For</label>
                <input type="text" name="intern" class="form-control" placeholder="Web Language" required>
            </div>
            <div class="form-group aa">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group aa">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <input type="submit" name="login" class="btn btn-primary aa" value="Register" />
        </form>
        <!-- /Form  End -->
        <?php
            require 'Mailer/vendor/autoload.php';

            use PHPMailer\PHPMailer\PHPMailer;
            use PHPMailer\PHPMailer\SMTP;
            use PHPMailer\PHPMailer\Exception;
        if(isset($_POST['login'])){
            $conn = mysqli_connect("localhost", "root", "", "users") or die("Conn Failed" . $conn->connect_error);

            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $dob = mysqli_real_escape_string($conn, $_POST['dob']);
            $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
            $institute = mysqli_real_escape_string($conn, $_POST['institute']);
            $intern = mysqli_real_escape_string($conn, $_POST['intern']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $sql = "INSERT INTO `mailer` (`name`, `dob`, `qualification`, `institute`, `intern`, `username`, `password`) VALUES ('$name', '$dob', '$qualification', '$institute', '$intern', '$email', '$password');";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)){
                echo '<script src="text/javascript">alert "Success";</script>';
                // Load Composer's autoloader

                // Instantiation and passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                    $mail->isSMTP();                                            // Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                    $mail->Username   = 'cardemo16@gmail.com';                     // SMTP username
                    $mail->Password   = 'Qwer@1234';                               // SMTP password
                    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                    //Recipients
                    $mail->setFrom('cardemo16@gmail.com', 'Rajesh');
                    $mail->addAddress($email, $name);     // Add a recipient

                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = 'Registration Details';
                    $mail->Body    = 'Hi, '. $name .',<br><hr><h2>Thank You For Registering.</h2><br><b>Here is your registeration details</b><br> Qualification :'. $qualification .'<br> Institute : '. $institute.'<br>Intern For : '.$intern.'<br>Mail :'.$email;
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
            
        }
        ?>
    </div>
</body>

</html>