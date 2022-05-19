<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Example ajax fetch</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="styles/form_style.css" />

</head>

<body>
    <script async src="scripts/post_form.js"></script>

    <form method="post" action="" id="ajax_form">
        <input id="ajax-form_name" type="text" name="name" placeholder="Ваше имя" required>
        <input id="ajax-form_email" type="email" name="email" placeholder="Email" required>

        <button id="send-btn" type="button">Записаться на курс</button>
    </form>
</body>