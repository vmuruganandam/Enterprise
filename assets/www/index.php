
<html>
<form action="uploader.php">
    <input type="submit" value="Back">
</form>
<?php
$today = getdate();
echo $today['month'] . " " . $today['wday'] . " " . $today['year']; 
echo "<br>";

?>
<?php

echo $_POST['appname'];
echo "<br>";
echo $_POST['appversion'];
echo "<br>";
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br>";
  echo "Type: " . $_FILES["file"]["type"] . "<br>";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }
?>

<?php


  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists("uploaded/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "uploaded/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "uploaded/" . $_FILES["file"]["name"];
      }
    }

?>

<?php
/*$content = "";
$fp = fopen("http://www.drivehq.com/file/DF.aspx/1436394714.jpg?isGallery=&share=&shareID=0&fileID=1436394714&pay=&sesID=aton44umxrdgvt0ad4rz1hll&forcedDownload=true", "rb");

if (!$fp)
die("Error opening file.");
while (!feof($fp))
$content .= fread($fp, 2048);
fclose($fp);

$fp=fopen("samplex.png", "w");
fwrite($fp, $content);
fclose($fp);
echo "DONE";*/
?>


</html>