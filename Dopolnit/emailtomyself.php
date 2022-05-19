<?php
$subject = "2022_05_08";
$user_email = "valeriaraduznaa93@gmail.com";
$message ="Текст сообщения";
// текст сообщения, здесь вы можете вставлять таблицы, рисунки, заголовки, оформление цветом и т.п.

$filename = "gerbera.jpg";
// название файла

$filepath = "images/gerbera.jpg";
// месторасположение файла


//исьмо с вложением состоит из нескольких частей, которые разделяются разделителем

$boundary = "--".md5(uniqid(time()));
// генерируем разделитель

$mailheaders = "MIME-Version: 1.0; PHP_EOL";
$mailheaders .="Content-Type: multipart/mixed; boundary=\"$boundary\" PHP_EOL";
// разделитель указывается в заголовке в параметре boundary

$mailheaders .= "From: $user_email <$user_email> PHP_EOL";
$mailheaders .= "Reply-To: $user_email PHP_EOL";

$multipart = "--$boundary PHP_EOL";
$multipart .= "Content-Type: text/html; charset=windows-1251 PHP_EOL";
$multipart .= "Content-Transfer-Encoding: base64 PHP_EOL";
$multipart .=  PHP_EOL;
$multipart .= chunk_split(base64_encode(iconv("utf8", "windows-1251", $message)));
// первая часть само сообщение

// Закачиваем файл
$fp = fopen($filepath,"r");
if (!$fp)
{
    print "Не удается открыть файл";
    exit();
}
$file = fread($fp, filesize($filepath));
fclose($fp);
// чтение файла


$message_part = " PHP_EOL--$boundary PHP_EOL";
$message_part .= "Content-Type: application/octet-stream; name=\"$filename\" PHP_EOL";
$message_part .= "Content-Transfer-Encoding: base64 PHP_EOL";
$message_part .= "Content-Disposition: attachment; filename=\"$filename\" PHP_EOL";
$message_part .=  PHP_EOL;
$message_part .= chunk_split(base64_encode($file));
$message_part .= " PHP_EOL--$boundary-- PHP_EOL";
// второй частью прикрепляем файл, можно прикрепить два и более файла

$multipart .= $message_part;

mail($user_email,$subject,$multipart,$mailheaders);
// отправляем письмо