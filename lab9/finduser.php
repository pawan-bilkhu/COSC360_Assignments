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
    $sql = "SELECT username FROM users";
    $results = mysqli_query($connection, $sql);

    // Check if server request is using the correct Post method
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        // retrieve all post request variables
        if(isset($_POST["username"]))
            $username = $_POST["username"];

        //echo "Username: ".$username." Password: ".$password;

        if(!empty($username))
        {
            while($row = mysqli_fetch_assoc($results))
            {
                //echo "username: ".$row["username"]." password: ".$row["password"];
                if($row["username"] === $username)
                {
                    $userExists = true;
                    break;
                }
            }
            mysqli_free_result($results);
            if($userExists)
            {
                    $sql = "SELECT firstname, lastname, email FROM users WHERE username='$username'";
                    $results = mysqli_query($connection, $sql);
                    echo "<fieldset><legend>User: $user_name</legend>";
                    echo "<table>";
                    if ($row = mysqli_fetch_assoc($results))
                    {
                        echo "<tr><td>First Name:</td><td>".$row["firstname"]."</td></tr>";
                        echo "<tr><td>Last Name:</td><td>".$row["lastname"]."</td></tr>";
                        echo "<tr><td>Email:</td><td>".$row["email"]."</td></tr>";
                    }
                    else
                    {
                        echo "<tr><td>Invalid username and/or password</tr></td>";
                    }
                    echo "</table>";
                    echo "</fieldset>";
                    mysqli_free_result($results);
            }
            else
            {
                echo "<p>Invalid username</p>";
            }

        }
    }
    else
    {
        echo "Bad request";
    }
    mysqli_close($connection);
}
?>
</html>