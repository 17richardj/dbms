<?php
//Joshua Richard, Lauren
//Database Managemenet Systems
//Saint Joseph's University
//Final Project - To create a functional app with front and back end integration

// Initialize the session
session_start();

// Unset all of the session variables
$_SESSION = array();

// Destroy the session.
session_destroy();

// Redirect to login page
header("location: login.php");
exit;
?>
