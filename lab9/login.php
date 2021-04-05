<!DOCTYPE html>
<html>
<?php

$host = "localhost";
$database = "lab9";
$user = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);
$error = mysqli_connect_error();

if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
}
else
{
    $userExists = False;
    $sql = "SELECT username, password FROM users";
    $results = mysqli_query($connection, $sql);

    // Check if server request is using the correct Post method
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        // retrieve all post request variables
        if(isset($_POST["username"]))
            $username = $_POST["username"];
        if(isset($_POST["password"]))
            $password = $_POST["password"];

        //echo "Username: ".$username." Password: ".$password;

        if(!empty($username) && !empty($password) )
        {


                while($row = mysqli_fetch_assoc($results))
                {
                    //echo "username: ".$row["username"]." password: ".$row["password"];
                    if($row["username"] === $username && $row["password"] === md5($password))
                    {
                        $userExists = true;
                        break;
                    }

                }
                mysqli_free_result($results);

                if($userExists)
                {
                    echo "<p>User has a valid account</p>";
                }
                else
                {
                    echo "<p>Invalid username and/or password</p>";
                }


        }
        else
        {
            echo "Bad request";
        }
    }
    mysqli_close($connection);
}
?>
</html>