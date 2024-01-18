<!DOCTYPE html>
<html>
<head>
 <title>Registration</title>
</head>
<body>
 <h2>Registration</h2>
 <form method="post" action="register.php">
  <label>Full name:</label><br>
  <input type="text" name="full_name" required><br><br>
  
  <label>Login:</label><br>
  <input type="text" name="username" required><br><br>
  
  <label>Password:</label><br>
  <input type="password" name="password" required><br><br>
  
  <label>Date of Birth:</label><br>
  <input type="date" name="birthdate" required><br><br>
  
  <input type="submit" value="To register">
 </form>

<?php
// Проверяем, была ли отправлена форма
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получаем данные из формы
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $birthdate = $_POST['birthdate'];

    // TODO: Добавить проверку данных и сохранение в базу данных

    // Выводим сообщение об успешной регистрации
    echo "Вы успешно зарегистрировались!";
}
?>

</body>
</html>