<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "aubreystephens", "ootoi3fa", "aubreystephens");
/* check connection */
if ($mysqli->connect_errno) {
 echo "printf('Connect failed: %s\n', $mysqli->connect_error)";
 exit();
}

$query = "SELECT user_id FROM Users";
if($result = $mysqli->query($query)){
    echo "<table border=\"1\">";
    echo "<tr><td><b>Users:</b></td></tr><br>";
    /* fetch associative array */
    while($row = $result->fetch_assoc()){
        echo "<tr><td>".$row["user_id"]."</td></tr><br>";
    }
    /* free result set */
    $result->free();
}
/* close connection */
$mysqli->close();

?>
