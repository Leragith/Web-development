<?php
header("Content-Type: text/html; charset=utf-8");
$email = $_GET["email"];
if (empty($email))
    echo("Ошибка, введите email");
else
{
    $fName = "data/" . $email . ".txt";
    if (file_exists($fName))
    {
        $file = fopen($fName, 'r');
        for ($i = 0; $i < 4; $i++)
        {
            $fromFile[$i] = fgets($file);
            echo $fromFile[$i];
            echo '<br>';
        }
        fclose($file);
    }
    else
    {
        echo("No such file");
    }
}