
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
    h1{
        position: absolute;
        top:0;
    }
}

@media only screen and (min-width: 600px) {
    form {
        position: relative;
        left: 80%;
    }
}

form {
    border-radius: 10px;
    margin-top: 50%;
}

h1{
    position: absolute;
    top:0;
    right: 20%;
    color: orange;
    font-family: 'Lobster', cursive;
}
</style>

<body>
    <div class="container-fluid">
    <h1 class="animate__animated animate__slideInLeft"><strong>Renal Project</strong></h1>
        <form action="<?php $_SERVER['PHP_SELF']; ?>"  class="animate__animated animate__slideInRight" method="POST">
            <h3 class="heading">Login</h3>
            <!-- Form Start -->
            <div class="form-group">
                <label>Select Role</label>
                <select name="role" id="select" onchange="fun()" class="form-control">
                    <option value="select">Select</option>
                    <option value="0">Student</option>
                    <option value="1">Teacher</option>
                    <option value="2">Admin</option>
                </select>
            </div>
            <div class="form-group aa" style="display: none;">
                <label>Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="" required>
            </div>
            <div class="form-group aa" style="display: none;">
                <label>Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="" required>
            </div>
            <input type="submit" name="login" style="display: none;" onclick="submit()" class="btn btn-primary aa" value="login" /><br><br>
        Create New Account.<a href="register.php">Here</a>
        </form>
        <!-- /Form  End -->
    </div>


<script src="js/jquery.js"></script>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-analytics.js"></script>
<!-- <script src="https://www.gstatic.com/firebasejs/7.21.1/firebase-database.js"></script> -->

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyCyrWvRiWOiDu6TgjAZX2e7Jdka2qyIJs0",
    authDomain: "zoom-504eb.firebaseapp.com",
    databaseURL: "https://zoom-504eb.firebaseio.com",
    projectId: "zoom-504eb",
    storageBucket: "zoom-504eb.appspot.com",
    messagingSenderId: "801954376492",
    appId: "1:801954376492:web:b0beb8c6660fdc8fab1a89",
    measurementId: "G-9WDJ7ZSF74"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>
<script src="js/index.js"></script>
</body>
</html>
