<!DOCTYPE html>
<body>

<?php
if (isset($_SERVER["REQUEST_METHOD"]))
{
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
//         echo $_GET["firstname"]."<br>";
        $name = $_GET["firstname"];
//         echo $_GET["key"];
        $key = $_GET["key"];
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
//         echo $_POST["firstname"]."<br>";
        $name = $_POST["firstname"];
//         echo $_POST["key"];
        $key = $_POST["key"];
    }
    else
    {
        echo "Request method not set";
    }
}
if (isset($key) && isset($name))
{
  // Read the file in
  $inputFile = file("data.txt") or die('ERR: No file found!');

//   echo $inputFile;
  $delimiter = ',';

  // Create an array
  $info = array();

  foreach($inputFile as $item)
  {
    $datafield = explode($delimiter, $item);
    $info["$datafield[0]"] = array("$datafield[1]", "$datafield[2]", "$datafield[3]");
  }
//   echo '<br>';

//   print_r($info[$key]);

  if (strcasecmp($info[$key][0], $name)==0 )
  {
    echo "<h1>".$info[$key][0]."'s Coffee Choice</h1>";
    echo '<figure>';
    echo '<img src="'.$info[$key][2].'">';
    echo '<figcaption>'.$info[$key][1].'</figcaption>';
    echo '</figure>';
  }
  else
  {
    echo 'User and/or key is invalid';
  }
}
else
{
  echo 'User and/or key is invalid';
}
?>
</body>