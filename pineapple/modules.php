<?php

if(isset($_GET[getModule], $_GET[moduleVersion])){

	exec("mkdir -p /tmp/modules");
	exec("wget -O /tmp/modules/mk4-module-".$_GET[getModule]."-".$_GET[moduleVersion].".tar.gz \"http://www.d1171540.domain.com/downloads.php?downloadModule=".$_GET[getModule]."&moduleVersion=".$_GET[moduleVersion]."\"");
        $path = "/tmp/modules/mk4-module-".$_GET[getModule]."-".$_GET[moduleVersion].".tar.gz";
        $cmd = "tar -xzf ".$path." -C /tmp/modules/";
        exec($cmd);
        $configArray = explode("\n", trim(file_get_contents("/tmp/modules/mk4-module-".$_GET[getModule]."-".$_GET[moduleVersion]."/module.conf")));

        $name = explode("=", $configArray[0]);
        $version = explode("=", $configArray[1]);
        $author = explode("=", $configArray[2]);
        $destination = explode("=", $configArray[3]);
        $depends = explode("=", $configArray[4]);
        $startPage = explode("=", $configArray[5]);

        if($destination[1] == "usb") echo "USB install not supported. YET ( No time :( )";
        elseif(is_dir("/www/pineapple/modules/".$name[1]))
        {
                echo "Already installed";

        }else
        {
                if($depends[1] != ""){
                        #download+install depends
                        $dependsArray = explode(",", $depends[1]);
                        exec("opkg update");
                        foreach($dependsArray as $dep){
                                exec("opkg install ".$dep);
                        }
                }
                #Install the module
                exec("mv ".substr_replace($path, "", -7)."/$name[1] /www/pineapple/modules/");
                exec("echo '".$name[1]."|".$version[1]."|".$startPage[1]."' >> /www/pineapple/modules/moduleList");
        }


}


?>
<html>
<head>
<title>Pineapple Control Center</title>
<script  type="text/javascript" src="jquery.min.js"></script>
</head>
<body bgcolor="black" text="white" alink="green" vlink="green" link="green">

<?php require('includes/navbar.php'); ?>
<pre>
<?php

if(isset($_GET[remove]) && $_GET[remove] != ""){
exec("rm -rf modules/".$_GET[remove]);
$cmd = "sed '/".$_GET[remove]."/{x;/^$/d;x}' modules/moduleList > modules/moduleListtmp && mv modules/moduleListtmp modules/moduleList";
exec($cmd);
echo "removed ".$_GET[remove];
}

?>
<center>
<font color="yellow"><b>Pineapple Bar</b></font>
Come get some infusions for your pineapple cocktail
</center>
<b>Installed Infusions:</b>
<?php
#get list of current modules:
$moduleArray = explode("\n", trim(file_get_contents("modules/moduleList")));
?>

<table cellpadding=5px><tr>
<tr><td>Module </td><td> Version </td></tr>
<?php
foreach($moduleArray as $module){
$moduleArray = explode("|", $module);
if($moduleArray[0] == ""){ echo "No modules installed."; break;}
echo "<tr><td><font color=lime>".$moduleArray[0]." </td><td> ".$moduleArray[1]."<td><a href='modules/".$moduleArray[0]."/".$moduleArray[2]."'>Launch</a></td><td><font color=red><a href='?remove=".$moduleArray[0]."' )'>Remove</a></td></tr>";
}
?>
</table>


<b>Avaliable Infusions: <a href="?show">Show</a></b>
<font color=red>Warning: This will establish a
connection to wifipineapple.com</font>

<?php
if(isset($_GET[show])){
$moduleListArray = explode("#", file_get_contents("http://www.d1171540.domain.com/downloads.php?moduleList"));
if($moduleListArray[0] != " "){
echo "<table cellpadding=5px><tr>
<tr><td>Module </td><td> Version </td></tr>";
foreach($moduleListArray as $moduleArr){

$nameVersion = explode("|", $moduleArr);
echo "<tr><td><font color=lime>".$nameVersion[0]."</td><td>".$nameVersion[1]."</td><td><a href='modules.php?getModule=".$nameVersion[0]."&moduleVersion=".$nameVersion[1]."'>Install</a></td></tr><br />";

}
echo "</table>";
}else{
echo "No modules found";
}
}
?>
</pre>
</body>
</html>
