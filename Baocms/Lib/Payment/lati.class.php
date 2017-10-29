<?phpclass lati {    private $merId = "M00001434";    private $ikey = "123456";    public function getCode($logs, $setting) {        $merId = $this->merId; //Your merchant ID        $ikey = $this->ikey; //Your merchant key, configurable in your account under the developer settings        $toSubmit['orderId'] = date(Ymd) . '-' . $merId . '-' .$logs["logs_id"]; //A unique order ID for your organisation        $toSubmit['currency'] = 'NZD'; //Currency that you wish to receive        $toSubmit['amount'] = $logs['logs_amount']; //Amount of the transaction in the currency selected        $toSubmit['merchantCode'] = $merId;        $toSubmit['frontUrl'] = __HOST__ . U('pchome/payment/respond', array('code' => 'lati')); //The URL you wish the user to be returned to        $toSubmit['key'] = $ikey;        $mac = "";        foreach ($toSubmit as $k => $v) {            $mac .= "{$v}";        }        $toSubmit['md5info'] = md5($mac);  //The MD5 hash of the order, currency, amount, merchantcode, fronturl & key        $toSubmit['backUrl'] = ''; //The back end notification url for your server        $toSubmit['version'] = "1.0"; //The version of the API you are using        $toSubmit['itemName'] = '1stpay'; //The name(s) of the items being sold        $toSubmit['quantity'] = "1"; //The quantity of items being sold        $toSubmit['idName'] = ""; //The name on the Chinese National ID of the buyer (only required for online banking)        $toSubmit['idNumber'] = ""; //The Chinese National ID of the buyer (only required for online banking)        $toSubmit['phone'] = ""; //The buyers mobile phone number        $toSubmit['email'] = ""; //The buyers email address        $sHtml = "<form id='payment' action='https://merchant.latipay.co.nz/api/show.action' method='get'>";        foreach ($toSubmit as $key => $val) {            if ($key <> $ikey) {                $sHtml .= "<input type='hidden' name='" . urldecode($key) . "' value='" . htmlspecialchars($val) . "'/>";            }        }        $sHtml = $sHtml . "<input type='submit' class=\"payment\" value='立刻支付'></form>";        return $sHtml;    }    public function respond() {        $merId = $this->merId; //Your merchant ID        $ikey = $this->ikey; //Retrieved from DB or Config file        $orderId = $_GET['orderId'];        $payType = $_GET['payType'];        $status = $_GET['status'];        $currency = $_GET['currency'];        $amount = $_GET['amount'];        $md5info = $_GET['md5info'];        $signText = $orderId . $payType . $status . $currency . $amount . $ikey;        $sign = md5($signText);        if ($sign == $md5info) {            if ($status = "20") {                //Successfully processed                $toSubmit['orderId'] = $orderId; //A unique order ID for your organisation                $toSubmit['merchantCode'] = $merId;                $toSubmit['key'] = $ikey;                $mac = "";                foreach ($toSubmit as $k => $v) {                    $mac .= "{$v}";                }                $toSubmit['md5info'] = md5($mac);  //The MD5 hash of the order, currency, amount, merchantcode, fronturl & key                $ch = curl_init();                curl_setopt($ch, CURLOPT_URL, 'https://merchant.latipay.co.nz/api/search.action');                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);                curl_setopt($ch, CURLOPT_POST, 1);                curl_setopt($ch, CURLOPT_POSTFIELDS, $toSubmit);                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //for solving certificate issue on test server                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);                $result = curl_exec($ch);                curl_close($ch);                $json = json_decode($result, true);                //将pay_log改成已支付状态                if ($json['status'] == 'paid') {                    $order_id_array = explode('-', $json['orderId']);                    $money = (float)$json['amount'];                    $logs = D('Paymentlogs')->find($order_id_array[2]);                    if (($logs['need_pay'] > ($money*100)) || (empty($logs))) {                        return false;                    }                    D('Payment')->logsPaid($order_id_array[2]);                    return true;                } else {                    return false;                }            } else {                return false;            }        } else {            return false;        }    }}