<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "aubreystephens", "ootoi3fa", "aubreystephens");
$username = $_POST["username"];
/* check connection */
if ($mysqli->connect_errno) {
 echo "printf('Connect failed: %s\n', $mysqli->connect_error)";
 exit();
}

$query = "SELECT content FROM Posts WHERE author_id ='$username'";

if($result = $mysqli->query($query)){
    echo "<table border=\"1\">";
    echo "<tr><td>".$username."'s Posts:</td></tr><br>";
    /* fetch associative array */
    while($row = $result->fetch_assoc()){
        echo "<tr><td>".$row["content"]."</td></tr><br>";
    }
    /* free result set */
    $result->free();
}else{
    echo "<p>Query did not work</p>";
}
/* close connection */
$mysqli->close();
?>
