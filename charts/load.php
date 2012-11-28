<?php

include($_SERVER['DOCUMENT_ROOT'] . '/config.php');

include($_SERVER['DOCUMENT_ROOT'] . '/demo/functions.php');

$country_id = @intval($_GET['country_id']);

$sql_current = query("SELECT complaint_subtitles.id, complaint_subtitles.title  FROM complaint_titles, complaint_subtitles
    where complaint_subtitles.parent_id=complaint_titles.id AND complaint_subtitles.parent_id='".$country_id."';");

while($record = mysql_fetch_assoc($sql_current))
    $records[] = $record;
    $regs = $records;
    $i=1;
foreach ($regs as $r) {
    $regions[] = array('id'=>$r['id'], 'title'=>trim($r['title']));
    $i++;
}

$result = array('type'=>'success', 'regions'=>$regions);

print json_encode($result);

