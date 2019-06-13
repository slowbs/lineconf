<?php
function send_line_notify($message, $token)
{
  $ch = curl_init();
  curl_setopt( $ch, CURLOPT_URL, "https://notify-api.line.me/api/notify");
  curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt( $ch, CURLOPT_POST, 1);
  curl_setopt( $ch, CURLOPT_POSTFIELDS, "message=$message");
  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
  $headers = array( "Content-type: application/x-www-form-urlencoded", "Authorization: Bearer $token", );
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec( $ch );
  curl_close( $ch );

  return $result;
}


$curl = curl_init();
//$date = date("Y-m-d",strtotime("-4 day"));  //ทดสอบการเปลี่ยนวันของวันของตัวแปร
$date = date("Y-m-d");
$url = "http://conf.moph.go.th/showDetailCalenderVDO.php?page=view_detail&day=$date";

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$result = curl_exec($curl);
/* echo $result; */
/* preg_match_all("!<tr><td>(.|\n)*?<tr>!", $result, $matches); */
preg_match_all("!<tr><td>[\s\S]*?<tr>!", $result, $matches);
/* $token = '';
$message = urlencode("fuck \nthis");
echo send_line_notify($message, $token); */
//print_r($matches);  //ทดสอบ print ค่าของ array ที่ match
$num = array_values($matches[0]);
//print_r ($num);
$num = preg_replace("!(<tr><td>)|(</td><td>)!", "", $num );
$num = preg_replace("!</td><tr>!", "\n", $num );
for($i = 0; $i < count ($num); $i++){
    if($i % 10 == 0){
            $newArray = array_slice($num, $i, 10);
            $message = implode('',$newArray);
            $token = '';
            //echo $message;
            echo send_line_notify($message, $token);
    }
}
//print_r($num);
/* $message = implode(',',$num);
echo $message;
$token = '';

echo send_line_notify($message, $token); */


/* for($i = 0; $i < count ($num); $i++){
    if (strpos($num[$i], 'หน่วยงานผู้จัด :') !== false) {
        //echo 'true';
        echo '</table><br><table border style="width:80%" align="center">';
        //extract($num, EXTR_PREFIX_ALL, 'message');
        $message = implode(', ', array_column($num,'name'));
        //$message = "hello";
        $token = '';

        echo send_line_notify($message, $token);
    }
    echo $num[$i];

} */
?>

<?php
//echo date("Y-m-d");  //เช็ควันปัจจุบัน
//echo $date;  //เช็คตัวแปร $date

//curl_close($curl);


/* $message = 'ข้อความ';
$token ='';

echo send_line_notify($message, $token);
 */
?>