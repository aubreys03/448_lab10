<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "aubreystephens", "ootoi3fa", "aubreystephens");
$UserN = $_POST["user"];
$content = $_POST["userpost"];
$added = FALSE;
/* check connection */
if ($mysqli->connect_errno) {
 echo "printf('Connect failed: %s\n', $mysqli->connect_error)";
 exit();
}


/*$sql = "SELECT COUNT(*) FROM user WHERE userid = '$_POST[user]'";
$result = mysql_query($sql);
if (!$result) {
    echo "<p>A database error occurred</p><br>";
}else{*/

if ($UserN != "" /*&& !(@mysql_result($result,0,0)>0)*/){
    if ($content != ""){
        $query = "SELECT user_id FROM Users";
        if($result = $mysqli->query($query)){
            /* fetch associative array */
            while($row = $result->fetch_assoc()){
                if ($UserN == $row["user_id"]){
                    $added = TRUE;
                }
            }
            /* free result set */
            $result->free();
        }
        if ($added){
            $query = "INSERT INTO Posts (content, author_id) VALUES ('$content', '$UserN')";
            if ($mysqli->query($query)==TRUE){
                echo "<p>Added New Post</p><br>";
            }else{
                echo "<p>No Post was added1</p><br>";
            }
        }else{
            echo "<p>Must be an existing User to post</p><br>";
        }
    }else{
        echo "<p>Cannot add a blank post</p><br>";
    }
}else{
    echo "<p>No Post was added2</p><br>";
}
/* } */
/* close connection */
$mysqli->close();

?>
