<?php
//Joshua Richard, Lauren
//Database Managemenet Systems
//Saint Joseph's University
//Final Project - To create a functional app with front and back end integration

// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
/*if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}*/

if(isset($_SESSION["id"]) && $_SESSION["id"] === false){
    header("location: user_login.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

$user_Id = $_SESSION["id"];
echo $user_Id;

if(array_key_exists('deleteAccount', $_POST)) {
            deleteAccount($user_Id, $link);
        }
        else if(array_key_exists('newUsername', $_POST)) {
            newUsername($user_Id, $link);
        }
        function newUsername($user_Id, $link) {
          $new_username = $_POST["username"];

          $sql = "UPDATE users SET username='$new_username' WHERE id='$user_Id'";
          
          if ($link->query($sql) === TRUE) {
              echo "Record updated successfully";
          } else {
              echo "Error updating record: " . $link->error;
          }
          $link->close();
        }
        function deleteAccount($user_Id, $link) {
          // sql to delete a record
          $sql = "DELETE FROM users WHERE id=".$user_Id."";

          if ($link->query($sql) === TRUE) {
              echo "Record deleted successfully";
              header('location: index.html');
          } else {
              echo "Error deleting record: " . $link->error;
          }

          $link->close();
        }

/*
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $new_username = $_POST["username"];

  $sql = "UPDATE users SET username='.$new_username.' WHERE id='.$user_Id.'";

  if ($link->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $link->error;
  }
  $link->close();
}*/
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

    <form id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="needs-validation" oninput='username.setCustomValidity(usernameConf.value != username.value ? "Usernames do not match." : "")'>
      <div class="container h-100 col-sm-8" style="margin-top: 3%">
        <div class="row">
          <div class="col-sm-8">
        <h2 style="font-family: garamond">Settings</h2>
      </div>
      <div class="col-sm-4">
      </div>
    </div>
      	<hr>
      <div class="form-group">
        <label for="password">New Username:</label>
        <input type="text" class="form-control" id="pwd" minLength="4" placeholder="Enter password" value="" pattern="(?=.*[a-z]).{4,}" title="Must contain at least 4 or more characters" name="username" required>
        <span class="help-block"></span>
        <div class="valid-feedback">Valid.</div>
        <div class="invalid-feedback">Please fill out this field.</div>
      </div>
            <div class="form-group>">
              <label for="password">New Username Conf:</label>
              <input type="text" class="form-control" id="pwd" minLength="4" placeholder="Confirm Password" value="" pattern="(?=.*[a-z]).{4,}" title="Must contain at least 4 or more characters" name="usernameConf" required>
              <span class="help-block"></span>
              <div class="valid-feedback">Valid.</div>
              <div class="invalid-feedback">Please fill out this field.</div>
            </div>
      <div class="form-group form-check">
        <label class="form-check-label">
          <div class="valid-feedback">Valid.</div>
          <div class="invalid-feedback">Invalid</div>
    			</div>
        </label>
        <div class="row">
      </div>
      <div class="row">
        <div class="col-md- mx-auto">
      <button type="submit" name="newUsername" value="Login" class="btn btn-outline-dark">Submit</button>
    </div>
    </div>
    <div class="footer-copyright text-center py-3">
      <hr class="w-25">
      <div class="footer-copyright text-center py-3">
        <div class="col-md- mx-auto">
      <button type="submit" value="Login" name="deleteAccount" class="btn btn-outline-danger">Delete Account</button>
      </div>
      </div>
    </div>
    </div>
    </form>
</body>
</html>
