<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Генератор паролей</title>
    <link rel="icon" href="img/key.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Генератор паролей</h1>
        <form method="post">
            <label for="length">Длина пароля:</label>
            <input type="number" id="length" name="length" min="8" max="32" value="12" required>
            
            <label for="count">Количество паролей:</label>
            <input type="number" id="count" name="count" min="1" max="10" value="1" required>
            
            <label>
                <input type="checkbox" name="uppercase" checked> Использовать заглавные буквы
            </label>
            
            <label>
                <input type="checkbox" name="lowercase" checked> Использовать прописные буквы
            </label>
            
            <label>
                <input type="checkbox" name="numbers" checked> Использовать цифры
            </label>
            
            <label>
                <input type="checkbox" name="symbols"> Использовать специальные символы (не больше одного)
            </label>
            
            <button type="submit" name="generate">Сгенерировать пароль</button>
        </form>
        
        <?php require('password.php');?>
    </div>
</body>
</html>
