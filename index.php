<?php session_start(); ?>
<html>
<head><title>Test Application</title>
<meta charset="UTF-8">
<style type="text/css">

body {
    font-family: "Trebuchet MS", Verdana, sans-serif;
    font-size: 16px;
    background-color: dimgrey;
    color: #696969;
    padding: 3px;
}

label {
    font-family: Georgia, serif;
    border-bottom: 3px solid #cc9900;
    color: #996600;
    font-size: 30px;
}
</style>
</head>
<body>
    <div align="right">
<a href='gallery.php'/>View Images if Backup is in progress!</a></br>
<a href='introspection.php'/>DB Backup!</a></br>
</div>
<?php
if((isset($_SESSION['introspec']))&&($_SESSION['introspec'])){
echo "MySQL dump in progress Admin has disabled form! Click on view Images to view gallery ";
}
else
{
echo 'test';
echo (isset($_SESSION['introspec']));
?>
<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action="result.php" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
    <!-- Name of input element determines name in $_FILES array -->
<label>    Send this file: <input name="userfile" type="file" accept="image/png,image/jpeg"/$
<label>Enter Email of user: <input type="email" name="useremail"><br /></label>
Enter Phone of user (1-XXX-XXX-XXXX): <input type="phone" name="phoneforsms">


<input type="submit" value="Send File" />
</label>
</form>
<label>
<form enctype="multipart/form-data" action="gallery.php" method="POST">

Enter Email of user for gallery to browse: <input type="email" name="email">
<input type="submit" value="Load Gallery" />
</label>
</form>
</body>
</html>
