<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "aubreystephens", "ootoi3fa", "aubreystephens");
/* check connection */
if ($mysqli->connect_errno) {
 echo "printf('Connect failed: %s\n', $mysqli->connect_error)";
 exit();
}

$checks = $_POST["posts"];
$id = 0;

if(!empty($checks)){
    foreach($_POST["posts"] as $value){
        $query = "SELECT post_id FROM Posts WHERE content=\"".$value."\"";
        if($result = $mysqli->query($query)){
            /* fetch associative array */
            while($row = $result->fetch_assoc()){
                $id = $row["post_id"];
            }
            /* free result set */
            $result->free();
        }
        $query = "DELETE FROM Posts WHERE post_id=\"".$id."\"";
        if($result = $mysqli->query($query)){
             echo "<p>Deleted post with post id : ".$id."</p><br>";
        }
    }
}
/* close connection */
$mysqli->close();

?>
