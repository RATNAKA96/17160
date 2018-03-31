<?php
ini_set('display_errors', 'Off');

date_default_timezone_set('Asia/Mumbai');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*
 * Database related functiond
 */

$host = "localhost";
$db_user = "root";
$db_pass = "404cyber";
$db_name = "VcPortal";

function numRows($query) {
    $conn = mysqli_connect($GLOBALS['host'], $GLOBALS['db_user'], $GLOBALS['db_pass'], $GLOBALS['db_name']);
    $result = mysqli_query($conn, $query);
    $rowcount = mysqli_num_rows($result);
    mysqli_close($conn);
    return $rowcount;
}

function runQuery($query) {
    $conn = mysqli_connect($GLOBALS['host'], $GLOBALS['db_user'], $GLOBALS['db_pass'], $GLOBALS['db_name']);
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $resultset[] = $row;
    }
    mysqli_close($conn);
    if (!empty($resultset)) {
        return $resultset;
    }
}

function exeQuery($query) {
    $conn = mysqli_connect($GLOBALS['host'], $GLOBALS['db_user'], $GLOBALS['db_pass'], $GLOBALS['db_name']);
    $result = mysqli_query($conn, $query);
    return $result;
}

/*
 * Authentication related functiond
 */

function valRefHeader() {
    $safeHOST = array('example.com', 'localhost');
    $getHOST = $_SERVER['HTTP_HOST'];
    $checkHOST = (!in_array($getHOST, $safeHOST)) ? false : true;

    if (isset($checkHOST) && $checkHOST == false) {
        return FALSE;
    } else {
        return TRUE;
    }
}

function token($token_length) {
    $string = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $length = strlen($string);
    $token = '';
    for ($i = 0; $i < $token_length; $i++) {
        $token .= $string[rand(0, $length - 1)];
    }
    return md5($token);
}

function authGoogleUser($email) {
    $conn = mysqli_connect($GLOBALS['host'], $GLOBALS['db_user'], $GLOBALS['db_pass'], $GLOBALS['db_name']);
    $result = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$email' ");
    mysqli_close($conn);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if ($row['email'] == $email) {
        return $row;
    } else {
        return FALSE;
    }
}

/*
 * Validation And Security related functiond
 */

function checkMobile($mobile) {
    if (strlen($mobile) == 10) {
        if (preg_match('/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/', $mobile)) {
            return FALSE;
        } else {
            return $mobile;
        }
    } else {
        return FALSE;
    }
}

function checkEmail($str) {
    if (!filter_var($str, FILTER_VALIDATE_EMAIL)) {
        return FALSE;
    }
    return $str;
}

function sqlInj($data) {
    $conn = mysqli_connect($GLOBALS['host'], $GLOBALS['db_user'], $GLOBALS['db_pass'], $GLOBALS['db_name']);
    $data = mysqli_real_escape_string($conn, $data);
    mysqli_close($conn);
    return $data;
}

function xssFilter($data) {
    $conn = mysqli_connect($GLOBALS['host'], $GLOBALS['db_user'], $GLOBALS['db_pass'], $GLOBALS['db_name']);
    $data = trim(htmlentities(strip_tags($data)));
    if (get_magic_quotes_gpc()) {
        $data = stripslashes($data);
    }
    $data = mysqli_real_escape_string($conn, $data);
    mysqli_close($conn);
    return $data;
}

function CleanString($string) {
    $conn = mysqli_connect($GLOBALS['host'], $GLOBALS['db_user'], $GLOBALS['db_pass'], $GLOBALS['db_name']);
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    $string = mysqli_real_escape_string($conn, $string);
    mysqli_close($conn);
    $string = htmlspecialchars($string);
    $string = strip_tags($string);
    return $string;
}

function removeSpecial($string) {
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^A-Za-z0-9.]/', '', $string); // Removes special chars.
}

function aes($plaintext, $switch) {
    $password = '404eCsyobrer';
    $method = 'aes-256-cbc';
    $password = substr(hash('sha256', $password, true), 0, 32);
    $iv = chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0) . chr(0x0);
    switch ($switch) {
        case "encrypt":
            return base64_encode(openssl_encrypt($plaintext, $method, $password, OPENSSL_RAW_DATA, $iv));
            break;
        case "decrypt":
            return openssl_decrypt(base64_decode($plaintext), $method, $password, OPENSSL_RAW_DATA, $iv);
            break;
        default :
            return("Wrong Case");
            break;
    }
}

/*
 * Get Client Details
 */

function getOS() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform = "Bilinmeyen İşletim Sistemi";
    $os_array = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }
    return $os_platform;
}

function getBrowser() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $browser = "Bilinmeyen Tarayıcı";
    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i' => 'Handheld Browser'
    );
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }
    return $browser;
}

function getClientIp() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function GetMAC() {
    ob_start();
    system('getmac');
    $Content = ob_get_contents();
    ob_clean();
    return substr($Content, strpos($Content, '\\') - 20, 17);
}

function HttpPost($url, $data) {
    $agent = $_SERVER['HTTP_USER_AGENT'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, $agent);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
    return curl_exec($ch);
}

function HttpGet($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
    return curl_exec($ch);
}

function thumbnail($img, $source, $dest, $filename) {
    $jpg = $source . $img;

    if ($jpg) {
        list( $width, $height ) = getimagesize($jpg); //$type will return the type of the image
        $source = imagecreatefromjpeg($jpg);
        $maxw = 1024;
        $maxh = 1024;

        if ($maxw >= $width && $maxh >= $height) {
            $ratio = 1;
        } elseif ($width > $height) {
            $ratio = $maxw / $width;
        } else {
            $ratio = $maxh / $height;
        }

        $thumb_width = round($width * $ratio); //get the smaller value from cal # floor()
        $thumb_height = round($height * $ratio);

        $thumb = imagecreatetruecolor($thumb_width, $thumb_height);
        imagecopyresampled($thumb, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width, $height);

        $path = $dest . $filename;
        imagejpeg($thumb, $path, 75);
    }
    imagedestroy($thumb);
    imagedestroy($source);
}

/*
 * Date Related Functions
 */

function TodayDate() {
    $timezone = +5.50;
    return gmdate("Y-m-d", time() + 3600 * ($timezone + date("I")));
}

function ForwardDate($add) {
    $timezone = +5.50;
    return gmdate("Y-m-d", strtotime("+$add days"));
}
?>

