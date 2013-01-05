<?php $urlComplaint = $url . '&complaints=true';?>
<div class="btn-group">
    <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
        Справочники
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a>
                <b>Разделы</b>
            </a>
        </li>
        <li>
            <a href="<?php echo $urlComplaint . '&complaint-titles=true';?>">
                Список
            </a>
        </li>
        <li>
            <a href="<?php echo $urlComplaint . '&complaint-titles-add=true';?>">
                Добавить
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a>
                <b>Подразделы</b>
            </a>
        </li>
        <li>
            <a href="<?php echo $urlComplaint . '&complaint-subtitles=true';?>">
                Список
            </a>
        </li>
        <li>
            <a href="<?php echo $urlComplaint . '&complaint-subtitles-add=true';?>">
                Добавить
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a>
                <b>Жалобы</b>
            </a>
        </li>
        <li>
            <a href="<?php echo $urlComplaint . '&complaint-texts=true';?>">
                Список
            </a>
        </li>
        <li>
            <a href="<?php echo $urlComplaint . '&complaint-texts-add=true';?>">
                Добавить
            </a>
        </li>
        <li class="divider"></li>
    </ul>
</div>