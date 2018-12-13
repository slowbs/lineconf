<?php

$curl = curl_init();
$date = date("Y-m-d",strtotime("-2 day"));  //ทดสอบการเปลี่ยนวันของวันของตัวแปร
//$date = date("Y-m-d");
$url = "http://conf.moph.go.th/showDetailCalenderVDO.php?page=view_detail&day=$date";

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);
/* echo $result; */
/* preg_match_all("!<tr><td>(.|\n)*?<tr>!", $result, $matches); */
preg_match_all("!<tr><td>[\s\S]*?<tr>!", $result, $matches);
//print_r($matches);  //ทดสอบ print ค่าของ array ที่ match

$num = array_values($matches[0]);
?>
<?php
for($i = 0; $i < count ($num); $i++){
    if (strpos($num[$i], 'หน่วยงานผู้จัด :') !== false) {
        //echo 'true';
        echo '</table><br><table border style="width:80%" align="center">';
    }
    echo $num[$i];

}
?>

<?php
//echo date("Y-m-d");  เช็ควันปัจจุบัน
//echo $date;  เช็คตัวแปร $date

curl_close($curl);

?>

