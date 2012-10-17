<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Вызвать пациента</h3>
    </div>
    <div class="modal-body">
        <p>Здесь можно вызвать пациента <span class="js-set-name"></span> на приём.</p>
        <p class="fio"></p>
        <form method="post" class="send-form">
            <input type="text" name="date" class="input-medium span2" id="datepicker" placeholder="Выбрать дату от">
            <input type="text" name="date" class="input-medium span2" id="datepicker-2" placeholder="до">
            <input type="hidden" value="" class="js-set-name-post" name='fio'/>
            <br><br>
            <input type="text" name="phone_number" class="input-medium span2" placeholder="79032674732">
            <input type="email" name="email" class="input-medium span2" placeholder="введите email">
        </form>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
        <button class="btn btn-primary send" name="submit">Записать</button>
        <?php if($_POST) { send_notification($times); } ?>
    </div>
</div>