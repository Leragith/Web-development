window.onload = main;

function main() {

    const sendFormBtn = document.getElementById('send-btn');
    const email = document.getElementById('ajax-form_email');
    const name = document.getElementById('ajax-form_name');


    sendFormBtn.addEventListener('click', sendForm);

    async function sendForm(e) {
        e.preventDefault(); //предотвращаем перезагрузку страницы


        if (checkEmail()) {//пример проверки email

            let data = JSON.stringify({
                name: name.value,
                email: email.value,
            });

            const response = await fetch('form_handler.php', {
                method: 'POST', //мы отправляем данные на сервер, значит POST
                body: data, // отправляем ранее созданный json объект data
                headers: {
                    'Content-Type': 'application/json' //отправляем заголовки запроса
                }
            });

            let content = await response.json();
            let msg = document.createElement('h3');

            if (!response.ok) {
                alert(`An error has occurred: ${response.status}`);
                console.log(content);
                msg.innerText = 'Упс, ошибка... Но страница все равно не перезагрузилась!';
            } else {
                alert(`An error has occurred: ${response.status}`);
                console.log(content);
                msg.innerText = 'Заметьте, страница не перезагрузилась!';
            }

            document.body.appendChild(msg);
        }
    }

    function checkEmail (event) {
        // Каждый раз, когда пользователь что-то вводит,
            if ((email.validity.typeMismatch) || (email.validity.valueMissing)) {
                alert("I am expecting an e-mail address!");
                showError(email);
                return false;
            }

            email.setCustomValidity("");
            return true;
    }

    function showError(el) {
        // Задаём соответствующую стилизацию
        el.classList.add('error-form');
    }
}

