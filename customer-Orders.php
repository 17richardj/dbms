<?php
// Initialize the session
session_start();

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === false){
    header("location: user_login.php");
    exit;
}

// Include config file
require_once "config.php";

//$rid = $_COOKIE["rid"];

$user_Id = $_SESSION["id"];

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

}

$sql = "SELECT order_id, name, quantity, price FROM orders WHERE id= ".$user_Id."";
$result = $link->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<title>DBMS</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./css/main.css">
</head>
<style>
.table{
   display: block !important;
   overflow-x: auto !important;
   width: 100% !important;
 }
 body {
  /* Set "my-sec-counter" to 0 */
  counter-reset: my-sec-counter;
	height: 100%;
	font-family: ;/*courier garamond candara*/
	color: black;
}

#num::before {
  /* Increment "my-sec-counter" by 1 */
  counter-increment: my-sec-counter;
  content: " " counter(my-sec-counter) ". ";
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
      <a class="nav-link" href="/dbms/profile.php">Order</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/dbms/contact.php">Contact</a>
    </li>
  </ul>
	<span class="navbar-text">

		<a href="/dbms/logout.php" class="fa fa-user"></a>
	</span>
</div>
</nav>
<div class="container ">
	<div class="col-sm-12">
		<h1 style="font-family: garamond">Customer Orders</h1>
</div>
<div class="container">
  <div class="col-sm-12">
  <table class="table text-center" style="width:100%">
      <thead>
        <tr>
          <th>Order Id</th>
          <th>Item Name</th>
          <th>Quantity</th>
          <th>Price</th>
</tr>
      </thead>
<?php
if ($result->num_rows > 0) {
    // output data of each row
    $num = 0;
    while($row = $result->fetch_assoc()) {
      $num++;
        echo "<tbody><tr><td>".$row['order_id']."</td><td>".$row['name']."</td><td>x".$row['quantity']."</td><td>$".$row['price']."</td></tr></tbody>";
    }
} else {
    echo "No Menu uploaded";
}
$link->close();
?>
</table>
</div>
</div>
</form>
</div>


	<footer class="page-footer font-small cyan darken-3">

		<!-- Footer Elements -->
		<div class="container">

			<!-- Grid row-->
			<div class="row">

				<!-- Grid column -->
				<div class="col-md-12 ">
					<div class="col-sm-3 mx-auto">
						<a href="#" class="fa fa-facebook"></a>
						<a href="#" class="fa fa-twitter"></a>
						<a href="#" class="fa fa-instagram"></a>
					</div>
				</div>
				<!-- Grid column -->

			</div>
			<!-- Grid row-->

		</div>
		<!-- Footer Elements -->

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3">© 2020 Copyright:
			<a href="#" style="color: black"><strong>dbms.com</strong></a>
		</div>
		<!-- Copyright -->

	</footer>
	<!-- Footer -->

	<script>
	$(function () {

  $("#search-query").autocomplete({
      source: function (request, response) {
         $.ajax({
            url: "/search_member",
            type: "GET",
            data: request,  // request is the value of search input
            success: function (data) {
              // Map response values to fiedl label and value
               response($.map(data, function (el) {
                  return {
                     label: el.fullname,
                     value: el._id
                  };
                  }));
               }
            });
         },

         // The minimum number of characters a user must type before a search is performed.
         minLength: 3,

         // set an onFocus event to show the result on input field when result is focused
         focus: function (event, ui) {
            this.value = ui.item.label;
            // Prevent other event from not being execute
            event.preventDefault();
         },
         select: function (event, ui) {
            // Prevent value from being put in the input:
            this.value = ui.item.label;
            // Set the id to the next input hidden field
            $(this).next("input").val(ui.item.value);
            // Prevent other event from not being execute
            event.preventDefault();
            // optionnal: submit the form after field has been filled up
            $('#quicksearch').submit();
         }
  });

});
</script>

</body>
</html>
