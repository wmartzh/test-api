<?php
/**
 * Created by PhpStorm.
 * User: William
 * Date: 10/8/2018
 * Time: 10:29 AM
 */

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: X-Requested-With");
header('Content-Type: text/html; charset=utf-8');
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"');

include_once '../config/api_controller.php';

$api = new Api_Controller();

echo $api->read_api();