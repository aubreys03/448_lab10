<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "aubreystephens", "ootoi3fa", "aubreystephens");
$newuser = $_POST["new"];
$added = FALSE;
/* check connection */
if ($mysqli->connect_errno) {
 echo "printf('Connect failed: %s\n', $mysqli->connect_error)";
 exit();
}

$query = "SELECT user_id FROM Users";

if ($newuser != ""){
    if($result = $mysqli->query($query)){
        /* fetch associative array */
        while($row = $result->fetch_assoc()){
            if ($newuser == $row["user_id"]){
                $added = TRUE;
            }
        }
        /* free result set */
        $result->free();
    }
    if(!$added){
        $query = "INSERT INTO Users (user_id) VALUES ('$newuser')";
        if($mysqli->query($query)==TRUE){
            echo "<p>Added New Username</p>";
        }
        else{
            echo "<p>User already exists with that Username</p>";
        }
     }
}
else{
    echo "<p>Username can not be left blank</p><br>";
}
/* close connection */
$mysqli->close();
?>
