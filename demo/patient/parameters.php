<form action="" method="post">
    <div class="control-group">
        <label class="control-label" for="parameter">
            Фамилия
        </label>
        <div class="controls">
            <select id="parameter" name="parameter">
                <option value="0">Выбрать показатель</option>
                <option value="1">Пульс</option>
                <option value="2">Сахар</option>
                <option value="3">Холестерин</option>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="value">
            Значение
        </label>
        <div class="controls">
            <input type="text" id="value" name="value">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="preparation">
            Препарат
        </label>
        <div class="controls">
            <input type="text" id="preparation" name="preparation">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="date">
            Дата
        </label>
        <div class="controls">
            <input type="text" id="date" name="date" class="js-datepicker">
        </div>
    </div>
    <input type="submit" name="save" class="btn" value="Сохранить">
</form>