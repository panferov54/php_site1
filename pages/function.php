<?php
function register($login,$pass,$email){
    //trim -удаление пробелов
    $login=trim(htmlspecialchars($login));
    $pass=trim(htmlspecialchars($pass));
    $email=trim(htmlspecialchars($email));

    if ($login===''|| $pass===''||$login===''){
        echo '<h3 class="text-danger">Fill all inputs</h3>';
        return false;
    }
    if(strlen($login)<3||strlen($login)>20||strlen($pass)<3||strlen($pass)>20){
        echo '<h3 class="text-danger">Length must between 3 or 20</h3>';
        return false;
    }


    //занесение данных в текстовой файл
    //+ - создать файл если он не создан
    //a - добавить в конец файла
    $file=fopen('pages/users.txt','a+');

    // проверка на дублирование логина $login
while($line=fgets($file)){
//    fgets - построчно считывает файл
//        $readname=substr($line,0,strpos($line,':')); //ВАРИАНТ1
//    if ($readname===$login){
//        echo '<h3 class="text-danger">Login is exist</h3>';
//        return false;
//    }
    //ВАРИАНТ2
    //explode разбивает строку по сиволу создавая массив
    $line_array= explode(':',trim($line));
    $readname=$line_array[0];
    $reademail=$line_array[2];
        if ($reademail===$email||$readname===$login){
            echo '<h3 class="text-danger">Login or Email is exist</h3>';
            return false;
        }
}



    //md5 -захешировать пароль
    $line="{$login}:".md5($pass).":{$email}\r\n";

    fputs($file,$line);
    fclose($file);
    return true;

}

function login($login,$pass){
    $login=trim(htmlspecialchars($login));
    $pass=trim(htmlspecialchars($pass));
    $file=fopen('pages/users.txt','r');
    while ($line=fgets($file)){
        $line_array=explode(':',trim($line));
        $readname=$line_array[0];
        $readpass=$line_array[1];
//        echo "$readname -------$readpass <br>";
        if($readname===$login&&$readpass===md5($pass)){
            $_SESSION['registered_user']=$login;
            echo "User in here";
            return true;
        }
    }
}