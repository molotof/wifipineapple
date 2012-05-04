<html>
<head>
<title>Pineapple Control Center</title>
<script  type="text/javascript" src="includes/jquery.min.js"></script>
</head>
<body>

<?php require('includes/navbar.php'); ?>

<pre>

<?php
$filename =$_POST['filename'];
$newdata = $_POST['newdata'];

if ($newdata != "") { $newdata = ereg_replace(13,  "", $newdata);
 $fw = fopen($filename, 'w') or die('Could not open file!');
 $fb = fwrite($fw,stripslashes($newdata)) or die('Could not write to file');
 fclose($fw);
 echo "Updated " . $filename . "<br /><br />";
}


$filename = "/www/pineapple/scripts/cleanup.sh";
  $fh = fopen($filename, "r") or die("Could not open file!");
  $data = fread($fh, filesize($filename)) or die("Could not read file!");
  fclose($fh);
 echo "<b>Clean-Up Script</b>
<form action='$_SERVER[php_self]' method= 'post' >
<textarea name='newdata' cols='100' rows='14' style='background-color:black; color:white; border-style:dashed;'>$data</textarea>
<input type='hidden' name='filename' value='/www/pineapple/scripts/cleanup.sh'><input type='submit' value='Update Clean-Up Script'>
</form>";

$filename = "/www/pineapple/ssh/ssh-keepalive.sh";
  $fh = fopen($filename, "r") or die("Could not open file!");
  $data = fread($fh, filesize($filename)) or die("Could not read file!");
  fclose($fh);
 echo "<b>SSH Keep Alive Script</b>
<form action='$_SERVER[php_self]' method= 'post' >
<textarea name='newdata' cols='100' rows='14' style='background-color:black; color:white; border-style:dashed;'>$data</textarea>
<input type='hidden' name='filename' value='/www/pineapple/ssh/ssh-keepalive.sh'><input type='submit' value='Update SSH Keep Alive Script'>
</form>"; 

$filename = "/www/pineapple/3g/3g-keepalive.sh";
  $fh = fopen($filename, "r") or die("Could not open file!");
  $data = fread($fh, filesize($filename)) or die("Could not read file!");
  fclose($fh);
 echo "<b>3G Keep Alive Script</b>
<form action='$_SERVER[php_self]' method= 'post' >
<textarea name='newdata' cols='100' rows='14' style='background-color:black; color:white; border-style:dashed;'>$data</textarea>
<input type='hidden' name='filename' value='/www/pineapple/3g/3g-keepalive.sh'><input type='submit' value='Update 3G Keep Alive Script'>
</form>"; 

$filename = "/www/pineapple/scripts/user.sh";
  $fh = fopen($filename, "r") or die("Could not open file!");
  $data = fread($fh, filesize($filename)) or die("Could not read file!");
  fclose($fh);
 echo "<b>User Script</b>
<form action='$_SERVER[php_self]' method= 'post' >
<textarea name='newdata' cols='100' rows='14' style='background-color:black; color:white; border-style:dashed;'>$data</textarea>
<input type='hidden' name='filename' value='/www/pineapple/scripts/user.sh'><input type='submit' value='Update User Script'>
</form>"; 

?>
</pre>
</body>
</html>
