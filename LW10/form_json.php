<?php
$postData = file_get_contents('php://input');
$data = json_decode($postData, true);


//формирую ответ
http_response_code(200);
$json = array(
    'status' => 200,
    'message' => 'Success',
    'loaded-content' => $data,
);

$name = $data['name'];
$email = $data['email'];
$activity = $data['activity'];
$checkbox = $data['checkbox'];

if (($name === '') || ($email === '') || ($activity === '')) {
    //меняю ответ если пустые поля + в идеале проверка на валидность
    http_response_code(500);
    $json = array(
        'status' => 500,
        'message' => 'Empty field error',
        'loaded-content' => $data,
    );
} else {

    $fName = 'data/' . $email . '.txt';
    $file = fopen($fName, 'w+');




    $inputDataE = "Email: " . $email . PHP_EOL;
    $ok = fwrite($file, $inputDataE);
    $inputDataN = "Имя: " . $name . PHP_EOL;
    fwrite($file, $inputDataN);


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
    if(isset($subscribe))
    {
        fwrite($file, "На новости подписались" . PHP_EOL);
    }
    else{
        fwrite($file, "На новости не подписались" . PHP_EOL);
    }



    if (!$ok) {
        //меняю ответ если пустые поля + в идеале проверка на валидность
        http_response_code(500);
        $json = array(
            'status' => 500,
            'message' => 'File write error',
            'loaded-content' => $data,
        );
    }

    fclose($file);
}

echo json_encode($json, JSON_UNESCAPED_UNICODE);