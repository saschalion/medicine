<?php $urlComplaint = $url . '&complaints=true';?>
<h2>Добавить жалобы основные</h2>
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

<?php
$complaintTitles = getComplaintTitles();
$complaintSubTitles = getComplaintSubTitles();
$complaints = getComplaintTexts();
$complaintParams = getParams();

foreach($complaintTitles as $title) {
    echo '<h4>' . $title['title'] . '</h4>';
    foreach($complaintSubTitles as $subtitle) if($subtitle['parent_id'] == $title['id']) { {
        echo '<ul class="complaints-list"><li><label class="checkbox"><input type="checkbox" name="" class="js-checkbox"/><b>' . $subtitle['title'] . '</b></label></h5>' .
            '<ul class="fields">';
        foreach($complaints as $complaint) if($complaint['parent_id'] == $subtitle['id']) {
            if(!empty($complaint['text'])) {
                echo '<li><label class="checkbox"><input type="checkbox" name=""/> ' . $complaint['text'] . '</label>
                <div><input type="text" placeholder="Введите значение"/></div>
                </li>';
            }
            if(!empty($complaint['title'])) {
                echo '<li><label class="checkbox">
                <input type="checkbox" name=""/><b> ' . $complaint['title'] . '</b></label>
                    <ul class="fields">';
                    foreach($complaintParams as $param) if($complaint['id'] == $param['text_id']) {
                        echo '<li><label class="radio"><input type="radio" name="'.$complaint['id'].'">'
                            . $param['parameter'] .
                            '</label></li>';
                    }
                echo '</ul><div><input type="text" placeholder="Введите значение"/></div></li>';
            }
        }
    } echo '</ul></li></ul>'; }
}