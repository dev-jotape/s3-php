<?
    session_start();
    require "vendor/autoload.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Example Upload to S3 in PHP</title>
</head>
<body>

<?
    if (isset($_SESSION['msg'])):
        echo $_SESSION['msg'];
    endif;
?>
<h1>Upload file to S3</h1>
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="text" name="description" />
    <input type="file" name="file" />
    <input type="submit" value="Enviar"/>
</body>
</html>

