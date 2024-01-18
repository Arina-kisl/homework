<?php
session_start();
$user_id = $_GET["id"];
$error = array();
$edit_user = array();
$has_error = false;
if(isset($_POST["submit"])){
    $edit_user = array(
        "id" => $_POST["id"],
        "names" => $_POST["names"],
        "tel" => $_POST["tel"],
        "password" => $_POST["password"]
    );
    if($edit_user["name"] == ""){
        $error["name"] = "Поле не заполнено";
        $has_error = true;
    }
    if($edit_user["login"] == ""){
        $error["login"] = "Поле не заполнено";
        $has_error = true;
    }
    if($edit_user["pass"] == ""){
        $error["pass"] = "Поле не заполнено";
        $has_error = true;
    }
    if($has_error){
        ?>
        <form action="edituser.php?id=<?=$user_id?>" method="POST">
            <input type="hidden" name="id" value="<?=$user_id?>">
            <div>
                <label for="user_name">Имя:</label>
                <input type="text" id="name" name="name" value="<?=$edit_user["name"]?>">
                <?if(isset($error["name"]) && $error["name"]!= ""):?><?=$error["name"];?><?endif;?>
            </div>
            <div>
                <label for="user_login">Логин:</label>
                <input type="text" id="login" name="login" value="<?=$edit_user["login"]?>">
                <?if(isset($error["login"]) && $error["login"] != ""):?><?=$error["login"];?><?endif;?>
            </div>
            <div>
                <label for="user_pass">Пaроль:</label>
                <input type="password" id="pass" name="pass" value="">
                <?if(isset($error["pass"]) && $error["pass"] != ""):?><?=$error["pass"];?><?endif;?>
            </div>
            <div>
                <input type="submit" name="submit" value="Сохранить"/>
            </div>
        </form>        
        <?php
    } else {
        $mysql = new mysqli('bd', 'root', '', 'tpl-register');
$result = $mysql->query("UPDATE users
                             SET login ='".$edit_user["login"]."',
                                 pass ='".$edit_user["pass"]."',
                                 name ='".$edit_user["name"]."',
                            WHERE id=".$user_id);
        header('Location: admin.php');
    }
} else {
    $mysql = new mysqli('bd', 'root', '', 'tpl-register');
    $result = $mysql->query("SELECT * FROM user WHERE id=".$user_id);
    if($user = $result->fetch_assoc()){
      ?>
        <form action="edutuser.php?id=<?=$user_id?>" method="POST">
            <input type="hidden" name="id" value="<?=$user_id?>">
            <div>
                <label for="name">Имя:</label>
                <input type="text" id="name" name="name" value="<?=$user["name"]?>">
            </div>
            <div>
                <label for="login">Логин</label>
                <input type="text" id="login" name="login" value="<?=$user["login"]?>">
            </div>
            <div>
                <label for="pass">Пароль:</label>
                <input type="password" id="pass" name="pass" value="">
            </div>
            <div>
                <button type="submit" name="submit">Сохранить</button>
            </div>
        </form>      
      <?php
    } else {
        echo "Запись не найдена. <a href='admin.php'>Вернуться обратно</a>";
    }
    ?>
<?php }
$mysql -> close();?>