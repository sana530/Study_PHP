<?phpclass poli {    private $poli_gateway = 'https://poliapi.apac.paywithpoli.com/api/v2/Transaction/Initiate';    public function getCode($logs, $setting) {        $resURL = __HOST__ . U('mobile/payment/respond', array('code' => 'poli'));        $json_builder = '{          "Amount":"'.$logs['logs_amount'].'",          "CurrencyCode":"NZD",          "MerchantReference":"'.$logs["logs_id"].'",          "MerchantHomepageURL":"'.__HOST__.'/mobile/",          "SuccessURL": "'.$resURL.'",          "FailureURL":"'.$resURL.'",          "CancellationURL":"'.$resURL.'",          "NotificationURL":"'.$resURL.'"        }';        $auth = base64_encode('SS64006786:yZ6$pANdjDECK');        $header = array();        $header[] = 'Content-Type: application/json';        $header[] = 'Authorization: Basic '.$auth;        $curl = curl_init();        curl_setopt($curl, CURLOPT_URL, $this->poli_gateway);        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);        curl_setopt($curl, CURLOPT_POSTFIELDS, $json_builder);        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);  //上正式站后改掉        $response = curl_exec($curl);        $json = json_decode($response, true);        if ($json['ErrorCode'] == 14058){            return "<div>The payment amount must be greater than, or equal to 1.0, if you want to use POLi Pay.</div>";        }        $sHtml = "<form>";        $sHtml = $sHtml . "<input type='button' onclick='location.href =\"" . $json['NavigateURL'] . "\"' class=\"button button-block button-big bg-yellow\" value='立刻支付'></form>";        return $sHtml;    }    public function respond() {        $token = $_POST["Token"];        if(is_null($token)) {            $token = $_GET["token"];        }        $url = "https://poliapi.apac.paywithpoli.com/api/v2/Transaction/GetTransaction?token=".urlencode($token);        $auth = base64_encode('SS64006786:yZ6$pANdjDECK');        $header = array();        $header[] = 'Content-Type: application/json';        $header[] = 'Authorization: Basic '.$auth;        $ch = curl_init($url);        curl_setopt( $ch, CURLOPT_HTTPHEADER, $header);        curl_setopt( $ch, CURLOPT_HEADER, 0);        curl_setopt( $ch, CURLOPT_POST, 0);        curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 0);        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);  //上正式站后改掉        $response = curl_exec( $ch );        curl_close ($ch);        $json = json_decode($response, true);        //存储token        D('Paymentlogs')->data(array('token'=>$token))->where(array('log_id'=>$json['MerchantReference']))->save();        //将pay_log改成已支付状态        if ($json['TransactionStatus'] == 'Completed') {            if (!D('Payment')->checkMoney($json['MerchantReference'], $json['AmountPaid']*100)) {                return false;            }            D('Payment')->logsPaid($json['MerchantReference']);            return true;        } else {            return false;        }    }}