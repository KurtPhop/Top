<?php

error_reporting(0);

$content='file.txt';
$next_str = file_get_contents($content);
file_put_contents($content, $next_str);
echo "Рабочие токены: ";
$fp = fopen('file.txt', 'a');
foreach(file($content,FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)as $str1) {
    $clear = curl('https://api.vk.com/method/likes.add?type=photo&owner_id=275485010&item_id=457260745&v=5.126&access_token='.$str1);
    $clear = json_decode($clear,1);
    if ($clear['error']) {
		echo $str1."<br />";
        $rab2 += 1;
    } else {
        $rab += 1;
		fwrite($fp, $str1 . PHP_EOL);
    }
    $c += 1;
}
fclose($fp);

function curl($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

echo 'Всего токенов: '.$c.'<br>';
echo 'Рабочих токенов: '.$rab.'<br>';
echo 'Нерабочих токенов: '.$rab2.'<br>';