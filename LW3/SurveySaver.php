<?php
header("Content-Type: text/html; charset=utf-8");
$email = $_GET["email"];
if (empty($email))
    echo("Ошибка, введите email");
else
{

    $first_name = $_GET["first_name"];
    $last_name = $_GET["last_name"];
    $age = $_GET["age"];
    $fName = "data/" . $email . ".txt";
    if (file_exists($fName))
    {
        $file = fopen($fName, 'r+');
        for ($i = 0; $i < 4; $i++)
        {
            $fromFile[$i] = fgets($file, 4096);
        }
        fclose($file);

    }
    else
    {
        $file = file_put_contents($fName, "");
    }


    $file = fopen($fName, 'r+');
    if (!empty($first_name))
    {
        $inputData = "First name: " . $first_name . PHP_EOL;
        fwrite($file, $inputData);
        echo "name updated<br>";
    }
    else
    {
        if (!empty($fromFile[0]))
        {
            fwrite($file, $fromFile[0]);
        }
        else
        {
            fwrite($file, "First name: " . PHP_EOL);
        }
    }
    if (!empty($last_name))
    {
        $inputData = "Last name: " . $last_name . PHP_EOL;
        fwrite($file, $inputData);
        echo "last name updated <br>";
    }
    else
    {
        if (!empty($fromFile[1]))
        {
            fwrite($file, $fromFile[1]);
        }
        else
        {
            fwrite($file, "Last name: " . PHP_EOL);
        }
    }
    $inputData = "Email: " . $email . PHP_EOL;
    fwrite($file, $inputData);
    if (!empty($age))
    {
        $inputData = "Age: " . $age . PHP_EOL;
        fwrite($file, $inputData);
        echo "age updated <br>";
    }
    else
    {
        if (!empty($fromFile[3]))
        {
            fwrite($file, $fromFile[3]);
        }
        else
        {
            fwrite($file, "Age: " . PHP_EOL);
        }
    }
fclose($file);

        //$text = $name . PHP_EOL . $email . PHP_EOL
        // echo $file;
}
