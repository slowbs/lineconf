<?php
include('simple_html_dom.php');
$html = file_get_html('http://conf.moph.go.th/showDetailCalenderVDO.php?page=view_detail&day=2018-12-07');
$tr = $html->find('table[id=example] tr');
foreach ($tr as $row)
{
    foreach ($row->find('td') as $td)
    {
        echo $td->plaintext.'<br/>';
    }
    echo '<hr/>';
}