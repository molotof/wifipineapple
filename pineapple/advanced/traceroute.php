<html>
<head>
<title>Pineapple Control Center</title>
<script  type="text/javascript" src="includes/jquery.min.js"></script>
</head>
<body bgcolor="black" text="white" alink="green" vlink="green" link="green">

<?php require('../includes/navbar.php'); ?>

<table border="0" width="100%"><tr><td align="left" valign="top" width="80%">
<pre>

<?php
if(isset($_POST[traceroutehost])) {

$cmd = "traceroute $_POST[traceroutehost]";
exec ($cmd, $output);
foreach($output as $outputline) {
echo ("$outputline\n");}

}
?>

</pre>
</td><td valign="top" align="left" width="*">
<pre>



<?php require('../includes/ascii.php'); ?>

</pre>
</td></tr></table>
</body>
</html>
