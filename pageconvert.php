<!DOCTYPE html>
<html>
<head>
    <title>Конвертер изображений</title>
    <meta charser="utf-8">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php require('header.php');?>
    <h1>Конвертер изображений</h1>
    <div>
        <form action="convert.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" required>
            <br>
            <label for="format">Выберите формат конвертации:</label>
            <select name="format" id="format">
                <option value="jpg">JPEG</option>
                <option value="png">PNG</option>
                <option value="ico">ICO</option>
                <option value="gif">GIF</option>
                <option value="bmp">BMP</option>
            </select>
            <br>
            <input type="submit" value="Конвертировать" download>
        </form>
    </div>
    <?php require('php/convert.php') ?>
</body>
</html>
