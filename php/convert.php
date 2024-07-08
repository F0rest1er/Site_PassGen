<?php
if(isset($_FILES['image']) && isset($_POST['format'])) {
    $image = $_FILES['image'];
    $format = $_POST['format'];
    $target_dir = "Загрузки";
    $target_file = $target_dir . basename($image["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Проверка типа файла
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "ico" && $imageFileType != "gif" && $imageFileType != "bmp") {
        echo "Извините, только JPG, JPEG, PNG, ICO, GIF и BMP файлы разрешены.";
        $uploadOk = 0;
    }

    // Если все проверки пройдены, загружаем файл
    if ($uploadOk == 1) {
        if (move_uploaded_file($image["tmp_name"], $target_file)) {
            // Конвертируем изображение
            $image_info = getimagesize($target_file);
            $image_width = $image_info[0];
            $image_height = $image_info[1];

            // Создаем новое изображение
            $new_image = imagecreatetruecolor($image_width, $image_height);
            if($imageFileType == "jpg" || $imageFileType == "jpeg") {
                $source_image = imagecreatefromjpeg($target_file);
            } elseif($imageFileType == "png") {
                $source_image = imagecreatefrompng($target_file);
            } elseif($imageFileType == "ico") {
                $source_image = imagecreatefromico($target_file);
            } elseif($imageFileType == "gif") {
                $source_image = imagecreatefromgif($target_file);
            } elseif($imageFileType == "bmp") {
                $source_image = imagecreatefrombmp($target_file);
            }

            // Копируем и масштабируем изображение
            imagecopy($new_image, $source_image, 0, 0, 0, 0, $image_width, $image_height);

            // Определяем путь к папке "Загрузки"
            $downloads_dir = $_SERVER['HOME'] . "/Downloads/";
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
                $downloads_dir = getenv("USERPROFILE") . "\\Downloads\\";
            }

            // Сохраняем новое изображение в папку "Загрузки"
            $new_file = $downloads_dir . "converted_" . basename($image["name"], "." . $imageFileType) . "." . $format;
            if($format == "jpg" || $format == "jpeg") {
                imagejpeg($new_image, $new_file);
            } elseif($format == "png") {
                imagepng($new_image, $new_file);
            } elseif($format == "ico") {
                imageiconencode($new_image, $new_file);
            } elseif($format == "gif") {
                imagegif($new_image, $new_file);
            } elseif($format == "bmp") {
                imagebmp($new_image, $new_file);
            }

            echo "Изображение успешно конвертировано и сохранено в папке Загрузки.";
        } else {
            echo "Извините, произошла ошибка при загрузке вашего файла.";
        }
    }
}
?>
