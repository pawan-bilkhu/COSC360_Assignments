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
        if(isset($_POST["oldpassword"]))
            $oldPassword = $_POST["oldpassword"];
        if(isset($_POST["newpassword"]))
            $newpassword = $_POST["newpassword"];

        //echo "Username: ".$username." Password: ".$password;

        if(!empty($username) && !empty($oldPassword))
        {
            while($row = mysqli_fetch_assoc($results))
            {
                //echo "username: ".$row["username"]." password: ".$row["password"];
                if($row["username"] === $username && $row["password"] === md5($oldPassword))
                {
                    $userExists = true;
                    break;
                }
            }
            mysqli_free_result($results);
            if($userExists)
            {
                mysqli_autocommit($connection, FALSE);
                mysqli_begin_transaction($connection);
                try {
                    $stmt = mysqli_prepare($connection, 'UPDATE users SET password = ? WHERE username = ?');
                    mysqli_stmt_bind_param($stmt, 'ss', md5($newpassword), $username);
                    mysqli_stmt_execute($stmt);
                    mysqli_commit($connection);
                    echo "User's password has been updated";

                } catch (mysqli_sql_exception $exception) {
                    mysqli_rollback($mysqli);
                    throw $exception;
                }
            }
            else
            {
                echo "<p>Invalid username and/or password</p>";
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