<?php
$db_server = "localhost";
$db_user = 'root';
$db_pass = 'Milk-shak3';
$db_name = 'c_c-sports-club';
$db_port = '3307';
$conn = "";



try {
    $conn = mysqli_connect(
        $db_server,
        $db_user,
        $db_pass,
        $db_name,
        $db_port
    );
} catch (mysqli_sql_exception) {
    /**
     * Ideally, this could show the user the error code just so it would be easier to report as a bug
     */
    echo 'Connection error.';
}
