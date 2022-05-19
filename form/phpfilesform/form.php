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