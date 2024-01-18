<!DOCTYPE html> 
<html lang="rus"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Форма регистрации </title> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="css/style.css"> 
</head> 
<body> 
    <div class="container mt-4"> 
<?php
	session_start();
?>
<?php
$mysql = new mysqli('bd', 'root', '', 'tpl-register');
$result = $mysql->query('SELECT * FROM users');
?>
<table border="1">
<?php while($row = $result->fetch_assoc()):?>
<tr>
    <td><?php echo $row["id"]?></td>
    <td><?php echo $row["login"]?></td>
    <td><?php echo $row["name"]?></td>
    <td><a href="edutuser.php?id=<?=$row['id']?>">Редактировать</a></td>
    <td><a href="delituser.php?id=<?=$row['id']?>">Удалить</a></td>
</tr>
 <?php endwhile;
 $mysql -> close();?>
</table>
<footer class = "footer">
        <div class = "row">
          <div class = "col">
           <h2> Наш номер: +7(909)-521-30-93 Адрес: ул.Ленина 112. Мы работаем с 10:00 до 20:00 без обеда и выходных.</h2>
          </div>       
         </div>
      </footer>
</body> 
</html>