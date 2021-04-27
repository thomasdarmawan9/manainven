<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('secure')) {
  function secure($input){

    $input = trim($input);
    $input = htmlentities($input);
    return $input;
  }
}

if (!function_exists('multisecure')) {
  function multisecure($array){
    foreach ($array as $key => $value) {
      $array[$key] = secure($value);
    }
    return $array;
  }
}

if (!function_exists('dd')) {
  function dd($var){
    if (is_object($var) || is_array($var)) {
      echo '<pre>';
      print_r($var);
      echo '</pre>';
    } else {
      echo $var;
    }
    exit();
  }
}

if (!function_exists('api_url')){
    function api_url($url = ''){
      $client_url = 'http://localhost/manainven/' . $url;
      return $client_url;
    }
}

if (!function_exists('curl_post')) {
  function curl_post($url, $data){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
  }
}