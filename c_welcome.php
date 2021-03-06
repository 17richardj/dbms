<!--
//Joshua Richard, Lauren
//Database Managemenet Systems
//Saint Joseph's University
//Final Project - To create a functional app with front and back end integration
-->
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
	#navbarColor {
		background-attachment: fixed;
		background: -webkit-gradient(linear, left top, right top, from(#7b4397), to(#dc2430)) fixed;
}
.wrapper {
  padding-top: 60px;
	width: 100%;
	background-color: ;
	height: 50%
}

.main-container {
  background: ;
  position: relative;
  color: #FFFFFF;
}

.main-container:before {
  content: '';
  position: absolute;
  left: 0;
  top: -36px;
  width: 100%;
  height: 72px;
  background: black;
  -webkit-transform: skewY(2.5deg);
  -moz-transform: skewY(2.5deg);
  -ms-transform: skewY(2.5deg);
  -o-transform: skewY(2.5deg);
  transform: skewY(2.5deg);
  -webkit-backface-visibility: hidden;
}

section {
  margin: 10px 0;
  padding: 0 20px;
  padding-bottom: 10px;
  position: relative;
}
	</style>
</head>
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
<!--
<div class="wrapper">

  <main class="main">
    <div class="main-container">
      <section>
      </section>
      </div>
    </main>-->

      </div>
<div class="container h-100 col-sm-8" style="margin-top: 3%">
  <h2 class="mx-auto center" style="font-family: garamond">Welcome!</h2>
	<hr>
  <div class="text-center"><em>Thanks for joining us!</em></div>

<div class="mssg bg-danger">
	<span id="check" ></span>
</div>
<div id="LangTable"><a href="/login" id="aa"></a>
	<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</div>
</div>
<!-- Footer -->
<footer class="page-footer font-small cyan darken-3">


  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">
    <hr class="w-25">
    <div class="footer-copyright text-center py-3">
      <a href="/dbms/user_login.php" style="color: black"><button class="btn btn-outline-dark">Continue</button></a>
    </div>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
</body>
</html>
