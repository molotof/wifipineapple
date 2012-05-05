<?php
if(isset($_GET[css]) && file_exists("/www/pineapple/includes/".$_GET[css].".css")){
	exec("echo ".$_GET[css]." > /www/pineapple/includes/css");
}
$css = exec("cat '/www/pineapple/includes/css'");
echo "<link href='/pineapple/includes/".$css.".css' rel='stylesheet' type='text/css' />";
?>
<table class="nav" >
	<tr class="nav">
		<td class="nav">
			<a href="/pineapple/index.php" class="nav">Status</a> | 
            <a href="/pineapple/config.php" class="nav">Configuration</a> | 
            <a href="/pineapple/advanced.php" class="nav">Advanced</a> | 
            <a href="/pineapple/usb.php" class="nav">USB</a> | 
            <a href="/pineapple/jobs.php" class="nav">Jobs</a> | 
            <a href="/pineapple/3g.php" class="nav">3G</a> | 
            <a href="/pineapple/ssh.php" class="nav">SSH</a> | 
            <a href="/pineapple/scripts.php" class="nav">Scripts</a> | 
            <a href="/pineapple/logs.php" class="nav">Logs</a> | 
            <a href="/pineapple/upgrade.php" class="nav">Upgrade</a> | 
            <a href="/pineapple/resources.php" class="nav">Resources</a> | 
            <a href="/pineapple/modules.php" class="nav">Modules</a> | 
            <a href="/pineapple/about.php" class="nav">About</a>
		</td>
	</tr>
</table>