<?php
$name = $_POST["name"];
$email = $_POST["email"];
$activity = $_POST["activity"];
if ($name && $email && $activity) {
    $fName = $email . ".txt";
    $file = fopen($fName, 'w+');

    $inputData = "Email: " . $email . PHP_EOL;
    fwrite($file, $inputData);
    $inputData = "Имя: " . $name . PHP_EOL;
    fwrite($file, $inputData);


    switch ($activity) {
        case "programmer":
            fwrite($file, "Деятельность: программист" . PHP_EOL);
            break;
        case "designer":
            fwrite($file, "Деятельность: дизайнер" . PHP_EOL);
            break;
        case "marketer":
            fwrite($file, "Деятельность: маркетолог" . PHP_EOL);
            break;
    }
    fclose($file);
}
else
{
    echo "Такого файла не существует!";
}
