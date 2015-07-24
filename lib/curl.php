<?php
/* curl init */
class CURL {
    public function __construct(){}
    private static function curl_get($sUrl) {
        $aCURLOPTs = array(CURLOPT_URL => $sUrl, CURLOPT_HEADER => 0, CURLOPT_FRESH_CONNECT => 1, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => 0);
        $hResURL = curl_init();
        curl_setopt_array($hResURL, ($aCURLOPTs));
        try {
            $response = curl_exec($hResURL);
        } catch (exception $e) {
            error_log(print_r($e, true));
        }
        curl_close($hResURL);
        return $response;
    }

    private static function curl_post($sUrl, $sParams) {
        $aCURLOPTs = array(CURLOPT_URL => $sUrl, CURLOPT_HEADER => 0, CURLOPT_FRESH_CONNECT => 1, CURLOPT_RETURNTRANSFER => 1, CURLOPT_POST => 1, CURLOPT_POSTFIELDS => $sParams);
        $hResURL = curl_init();
        curl_setopt_array($hResURL, ($aCURLOPTs));
        try {
            $response = curl_exec($hResURL);
            error_log($respones);
        } catch (exception $e) {
            error_log(print_r($e, true));
        }
        curl_close($hResURL);
        return $response;
    }
    /**
     * $sParam에 따라서 CURL 호출 여부가 달라진다.
     * @param $sUrl : CURL로 호출할 주소
     * @param $sParam(options) : 파라메터가 있으면 POST, 없으면 GET
     */
    public static function curl_run($sUrl, $sParams = '') {
        if (empty($sParams))
            return self::curl_get($sUrl);
        else
            return self::curl_post($sUrl, $sParams);
    }
}
?>