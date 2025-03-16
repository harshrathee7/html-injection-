<?php
if(isset($_GET['name'])){
    $name = $_GET['name'];  // No sanitization -> Vulnerable to HTML Injection
    echo "<h1>Welcome, $name</h1>";
} else {
    echo "<h1>Enter your name in the URL.</h1>";
}
?>
