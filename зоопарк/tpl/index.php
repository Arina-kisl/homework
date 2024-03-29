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
        if($_COOKIE['user'] == ''):
            ?>
    <div class="row"> 
            <div class="col"> 
                <h1>Форма регистрации</h1> 
                <form action="check.php" method="post"> 
                    <input type="text" class="form-control" name="name"  
                    id="name" placeholder="Введите ваше имя"> <br> 
                    <input type="text" class="form-control" name="login"  
                    id="login" placeholder="Введите логин"> <br> 
                    <input type="password" class="form-control" name="pass"  
                    id="pass" placeholder="Введите пароль"> <br> 
                    <button class="btn btn-success" 
                    type="submit">Зарегистрироваться</button> 
                </form> 
            </div> 
 
            <div class="col"> 
                        <h1>Форма авторизации</h1> 
            <form action="auth.php" method="post"> 
                <input type="text" class="form-control" name="login"  
                id="login" placeholder="Введите логин"> <br> 
                 
                <input type="password" class="form-control" name="pass"  
                id="pass" placeholder="Введите пароль"> <br> 
                <button class="btn btn-success" 
                type="submit">Авторизация</button> 
            </form> 
            </div> 
            <?php else: ?>
                <p> Добрый день, <?=$_COOKIE['user']?>. Чтобы выйти, нажмите  <a href="/exit.php"> здесь</a></p>
                <?php endif;?>
    </div> 
    </div> 
    <footer class = "footer">
        <div class = "row">
          <div class = "col">
           <h2> Наш номер: +7(909)-521-30-93 Адрес: ул.Ленина 112. Мы работаем с 10:00 до 20:00 без обеда и выходных.</h2>
          </div>       
         </div>
      </footer>
</body> 
</html>