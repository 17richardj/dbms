<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: c_welcome.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>DBMS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script type='text/javascript' src='https://code.jquery.com/jquery-1.11.0.js'></script>
  <script type='text/javascript' src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.2.0/zxcvbn.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
$(":input").inputmask();



$("#phone").inputmask({
mask: '999 999 9999',
placeholder: ' ',
showMaskOnHover: false,
showMaskOnFocus: false,
onBeforePaste: function (pastedValue, opts) {
var processedValue = pastedValue;

//do something with it

return processedValue;
}
});
});
  </script>
  <style>
  body{
    height: 100%;
    font-family: ;/*courier garamond candara*/
  }
  .fa {
  padding: 20px;
  font-size: 24px;
  width: ;
  text-align: center;
  text-decoration: none;
  border-radius: 50%;
  color: black;
}
.alignleft {
    float: left;
    margin-right: 15px;
}
.alignright {
    float: right;
    margin-left: 15px;
}
.aligncenter {
    display: block;
    margin: 0 auto 15px;
}
a:focus { outline: 0 solid }
img {
    max-width: 100%;
    height: auto;
}
.fix { overflow: hidden }
h1,
h2,
h3,
h4,
h5,
h6 {
    margin: 0 0 15px;
    font-weight: 700;
}
html,
body { height: 100% }

a {
    -moz-transition: 0.3s;
    -o-transition: 0.3s;
    -webkit-transition: 0.3s;
    transition: 0.3s;
    color: #333;
}
a:hover { text-decoration: none }



.search-box{margin:80px auto;position:absolute;}
.caption{margin-bottom:50px;}
.loginForm input[type=text], .loginForm input[type=password]{
  margin-bottom:10px;
}
.loginForm input[type=submit]{
  background:#fb044a;
  color:#fff;
  font-weight:700;

}

/*
body {
    padding: 2.5em 2em 0em;
    background: #f5f7f9;
        font-size: 1.5em;
        color: #346;
        font-family: Signika, -apple-system, sans-serif;
}*/
  </style>
</head>
<body>
  <nav id = "navbarColo" class="navbar navbar-expand-lg navbar-light  navbar-fixed">
    <a class="navbar-brand" href="#" style="font-family: garamond; border-bottom: medium solid black "><strong>DB</strong>MS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/dbms/index.html">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dbms/about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/dbms/contact.php">Contact</a>
        </li>
      </ul>
      <span class="navbar-text">
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-instagram"></a>
      </span>
    </div>
  </nav>
</div>

    <div class="container h-100 col-sm-8" style="margin-top: 3%">
      <h2 style="font-family: garamond">Register</h2>
      <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="form1" method="post" class="needs-validation h-100" oninput='confirm_password.setCustomValidity(password.value != confirm_password.value ? "Passwords do not match." : "")'>
          <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label for="email">Username:</label>
            <input type="text" class="form-control" id="uname" minLength="4" maxlength="20" placeholder="Enter username"  value="<?php echo $username; ?>" name="username"  value="<?php echo $username; ?>" required>
            <span class="help-block"><?php echo $username_err; ?></span>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
     <div class="row">
  <div class="col">
          <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="pwd" minLength="8" placeholder="Enter password" value="<?php echo $password; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="password" required>
            <span class="help-block"><?php echo $password_err; ?></span>
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">Please fill out this field.</div>
          </div>
        </div>
        <div class="col">
                <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                  <label for="password">Password Conf:</label>
                  <input type="password" class="form-control" id="pwd" minLength="8" placeholder="Confirm Password" value="<?php echo $confirm_password; ?>" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="confirm_password" required>
                  <span class="help-block"><?php echo $confirm_password_err; ?></span>
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
                </div>
              </div>
            </div>
          <div class="form-group form-check">
          <div class="row">
        </div>
          <div class="row">
            <div class="col-md- mx-auto">
          <button type="submit" value="Login" class="btn btn-outline-dark">Register</button>
        </div>
        </div>
        <div class="footer-copyright text-center py-3">
          <hr class="w-25">
          <div class="footer-copyright text-center py-3">Already have an Account?
            <a href="/dbms/customers/user_login.php" style="color: black"> <strong>click here</strong></a>
          </div>
        </div>
        </form>
</body>
</html>
