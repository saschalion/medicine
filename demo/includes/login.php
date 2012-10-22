<?php if(!isset($_COOKIE['auth'])) { ?>
    <a href="#auth" data-toggle="modal" class="auth-link"></a>
    <div class="modal" id="auth" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3>Пожалуйста, представьтесь</h3>
        </div>
        <div class="modal-body">
            <input type="text" class="input-medium span2 auth-info" placeholder="введите Ваше имя">
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary auth-button" data-dismiss="modal" type="submit">Сохранить</button>
        </div>
    </div>
<?php } ?>