window.onload = main;

function main() {
    const btn = document.getElementsByClassName('btn')[0];
    btn.addEventListener('click', onBtnClick);

    let overlayDiv = document.createElement('div');
    let mainPopupButton =
    overlayDiv.classList.add('overlay');
    overlayDiv.appendChild(createPopup());
    overlayDiv.addEventListener('click', onPopupClose);

    window.addEventListener('scroll', onWindowScroll);

    function onBtnClick() {
        document.body.appendChild(overlayDiv)
    }

    function onWindowScroll() {
        overlayDiv.style.top = window.scrollY + 'px';
    }

    function onPopupClose(event) {
        const overlay = document.getElementsByClassName('overlay')[0];
        document.body.removeChild(overlay);
    }
}

function createPopup() {
    const popup = document.createElement('div');
    popup.innerHTML =
        `<div class="form-wrap">
             <img src="images/spase.png" class="form-image" alt="space">
             <h2 class="form-header">Записаться на курс</h2>
             
             <form class="form-style" action="form_handler.php" method="POST">
            <label>
                <input required class="form-input form-input__text" type="text" name="name" placeholder="Ваше имя" />
            </label>
            <label>
                <input required class="form-input form-input__text" type="text" name="email" placeholder="Email" />
            </label>
            <label>
                <select required name="activity" class="form-input form-input__text">
                    <option style="display: none" selected disabled>Деятельность</option>
                    <option value="programmer">Программист</option>
                    <option value="designer">Дизайнер</option>
                    <option value="marketer">Маркетолог</option>
                </select>
            </label>
            <div class="checkbox-style">
                <input type="checkbox" id="subscribeForNews" name="subscribe" value="newsletter" class="box-style">
                <label for="subscribeForNews" class="box-text">Согласен получать информационные материалы о старте курса</label>
            </div>
            <p>
                <input type="submit" class="submit-style" value="Записаться на курс"/>
            </p>
        </form>
        
         </div>`;
    return popup;
}