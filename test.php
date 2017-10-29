<?php
$data[1]['name'] = 'a';
$data[1]['age'] = '2';
$data[2]['name'] = 'b';
$data[2]['age'] = '3';
$filename = "test.xls";
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=\"$filename\"");
            ExportFile($data);
if(isset($_POST["ExportType"]))
{

    switch($_POST["ExportType"])
    {
        case "export-to-excel" :
            // Submission from
            $filename = $_POST["ExportType"] . ".xls";
            header("Content-Type: application/vnd.ms-excel");
            header("Content-Disposition: attachment; filename=\"$filename\"");
            ExportFile($data);
            //$_POST["ExportType"] = '';
            exit();
        default :
            die("Unknown action : ".$_POST["action"]);
            break;
    }
}
function ExportFile($records) {
    $heading = false;
    if(!empty($records))
        foreach($records as $row) {
            if(!$heading) {
                // display field/column names as a first row
                echo implode("\t", array_keys($row)) . "\n";
                $heading = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    exit;
}
/*set_time_limit(0);
$fp = fopen ('a.svg', 'w+');

    $url = 'http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.svg';
    $xml = simplexml_load_file($url);
    $ch = curl_init($url);// or any url you can pass which gives you the xml file
    curl_setopt($ch, CURLOPT_TIMEOUT, 50);
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_exec($ch);

curl_close($ch);
fclose($fp);*/

/*$array = explode('|','192.168.1.205|192.168.1.206');
if (in_array('192.168.1.206',$array)) {
    echo 123;die;
}
if ((strpos('http://1stpay.info/skdkf', ('http://1stpay.info'))) !== 0) {
    echo 11;die;
}
echo strpos('http://1stpay.info/skdkf', ('http://1stpay.info'));*/
/*date_default_timezone_set('Pacific/Auckland');
echo time();
date_default_timezone_set('Asia/Bangkok');
echo time();*/

/*echo date("N", time());
$var = 'Tuesday: 8:00 AM – 9:00 PM';
$find = array('Tuesday:', 'abc:');
$final = str_replace($find,'',$var);
echo $final.'<br/>';
$test = "123131231231";
echo intval($test);*/
?>

