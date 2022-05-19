window.onload = main;

function main() {

    const sendFormBtn = document.getElementById('send-btn');
    const email = document.getElementById('ajax-form_email');
    const name = document.getElementById('ajax-form_name');
    const activity = document.getElementById('ajax-form_activity');
    const checkbox = document.getElementById('ajax-form_checkbox');

    sendFormBtn.addEventListener('click', sendForm);

    async function sendForm(e) {
        e.preventDefault(); //предотвращаем перезагрузку страницы

    ///////////////////*//////////////
        const btn = document.getElementsByClassName('ceiling__button')[0];
        btn.addEventListener('click', onBtnClick);
        if (btn) alert('ffdgdgd')

        document.addEventListener('keydown', function(event) {
            if (event.code === 'Escape')
                onPopupClose();
        });

        let overlayDiv = document.createElement('div');
        overlayDiv.classList.add('overlay');

        overlayDiv.appendChild(createPopup(event));

        function onBtnClick() {
            document.body.appendChild(overlayDiv);

            let close = document.getElementsByClassName('form-close__image')[0];
            close.addEventListener('click', onPopupClose);

            let blackout = document.getElementsByClassName('form-block')[0];
            blackout.addEventListener('click', PopupClose)
        }

        function onPopupClose(event) {
            const overlay = document.getElementsByClassName('overlay')[0];
            document.body.removeChild(overlay);
        }

        function PopupClose(event) {
            let blackout = document.getElementsByClassName('form-block')[0];
            if (!(blackout.contain(event.target))) {
                const overlay = document.getElementsByClassName('overlay')[0];
                document.body.removeChild(overlay);
            }
        }

        /////////////*///////////////

        if (checkEmail()) {//пример проверки email

            let data = JSON.stringify({
                name: name.value,
                email: email.value,
                activity: activity.value,
                checkbox: checkbox.value
            });

            const response = await fetch('form_json.php', {
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
            if (!(email.validity.typeMismatch) || (email.validity.valueMissing)) {
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

function createPopup() {

    const popup = document.createElement('div');
    popup.innerHTML =
        `
           
            <div id="overlay">
            <div class="form-block">
              <div class="form-close">
                   <img class="form-close__image"
                        alt="close-button"
                      src="images/close.png"/>
                </div>
             <img src="images/spase.png" class="form-image" alt="space">
             <h2 class="form-header">Записаться на курс</h2>
             
             <form class="form-style" action="form_json.php" method="POST">
            <label>
                <input required id="ajax-form_name" class="form-input form-input__text" type="text" name="name" placeholder="Ваше имя" />
            </label>
            <label>
                <input required id="ajax-form_email" class="form-input form-input__text" type="text" name="email" placeholder="Email" />
            </label>
            <label>
                <select required id="ajax-form_activity" name="activity" class="form-input form-input__text">
                    <option style="display: none" selected disabled>Деятельность</option>
                    <option value="programmer">Программист</option>
                    <option value="designer">Дизайнер</option>
                    <option value="marketer">Маркетолог</option>
                </select>
            </label>
            <div id="ajax-form_checkbox" class="checkbox-style">
                <input type="checkbox" id="subscribeForNews" name="checkbox" value="newsletter" class="box-style">
                <label for="subscribeForNews" class="box-text">Согласен получать информационные материалы о старте курса</label>
            </div>
            <p>
                <input type="submit" id="send-btn" class="submit-style" value="Записаться на курс"/>
            </p>
        </form>
        </div>
     
         </div>`;
    return popup;
}
