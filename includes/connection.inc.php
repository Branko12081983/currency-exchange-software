<?php
// THIS IS PART FOR THE CONNECTING DATABASE AND FRONTEND
function dbConnect($usertype, $connectionType = 'mysqli')
{
   $host =  'your-host-here';
    $db = 'your-database-here';
    // the password for this core user is factional
    if ($usertype == 'read') {
        $user = 'your-database-user-here';
        $pwd = 'your-database-password-here';
    } elseif ($usertype == 'write') {
        $user = 'your-database-user-here';
        $pwd = 'your-database-password-here';
    } else {
        exit('Unrecognized connection type');
    }
    if ($connectionType == 'mysqli') {
        $conn = new mysqli($host, $user, $pwd, $db);
        if ($conn->mysqli_error) {
            die('Cannot open database');
        }
        return $conn;
    } else {
        try {
            return new PDO("mysql:host=$host;dbname=$db", $user, $pwd);
        } catch (PDOException $e) {
            exit;
        }
    }
}