<?php
/**
 *
 */
class StatYandex
{

 const CLIENT_ID = 'd576ac02d9704522a589ebfb6d7521b4';
  const CLIENT_SECRET = '1e2335436d7140c2ab553aeededeebf3';
  const COUNTER_ID = '5543453';

  public static function getStat(){
    $token = self::auth();

    if($token){
      return self::getData(
        'https://api-metrika.yandex.ru/stat/traffic/summary.json?id='.self::COUNTER_ID,
        ['Authorization: OAuth '.$token]
      );
    }
  }

  public static function auth(){
    echo $_GET["code"];
    if (!isset($_GET["code"])) {

      //здесь проверим токен в базе, иначе будем отсылать на получение кода

      Header("Location: https://oauth.yandex.ru/authorize?response_type=code&client_id=".self::CLIENT_ID);
      die();
    }

    //делаем запрос для получения токена
    $result = self::postKeys("https://oauth.yandex.ru/token",
      [
        'grant_type'=> 'authorization_code',
        'code'=> $_GET["code"],
        'client_id'=>self::CLIENT_ID,
        'client_secret'=>self::CLIENT_SECRET
      ],
      ['Content-type: application/x-www-form-urlencoded']
    );

    if ($result["code"]==200){
      $result["response"]=json_decode($result["response"],true);
      if(isset($result["response"]["access_token"]))
        return $result["response"]["access_token"];
      else
        return false;
    }else{
      return false;
    }

  }

  public static function postKeys($url,$peremen,$headers) {
    $post_arr=array();
    foreach ($peremen as $key=>$value) {
      $post_arr[]=$key."=".$value;
    }
    $data=implode('&',$post_arr);

    $handle=curl_init();
    curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($handle, CURLOPT_POST, true);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
    $response=curl_exec($handle);
    $code=curl_getinfo($handle, CURLINFO_HTTP_CODE);
    return ["code"=>$code,"response"=>$response];
  }

  public static function getData($url,$headers) {
    $handle=curl_init();
    curl_setopt($handle, CURLOPT_URL, $url);
    curl_setopt($handle, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    $response=curl_exec($handle);
    $code=curl_getinfo($handle, CURLINFO_HTTP_CODE);
    return json_decode($response,true);
  }
}

