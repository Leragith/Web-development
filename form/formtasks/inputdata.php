<?php
header("Content-Type: text/html; charset=utf-8");
if (!$_POST["email"])
    echo("Ошибка, введите email");
else
{
    $fname = $_POST["email"] . ".txt";
    if (file_exists($fname))
    {
        //$file = file_get_contents($fname);
        $file = fopen($fname, 'r+');
        for ($i = 0; $i < 4; $i++) {
            echo fgets($file);
            echo '<br>';
        }
        //$text = $name . PHP_EOL . $email . PHP_EOL
       // echo $file;
    }
    else
        echo("Данного файла не существует");
}