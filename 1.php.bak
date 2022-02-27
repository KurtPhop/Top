<?php

error_reporting(0);

$id_profile = 245410942;
$id_photo =  456341678;

$curlik = curl('https://git.onlypost.tk/vk_nakrutka/nakrutka.php?id_photo='.$id_photo.'&id_profile='.$id_profile);
$curlik = json_decode($curlik,true);

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

$col = $curlik['col'];
$rab = $curlik['rab'];
$nerab = $curlik['nerab'];

echo 'Всего токенов: '.$col.'<br>';
echo 'Рабочих токенов: '.$rab.'<br>';
echo 'Нерабочих токенов: '.$nerab.'<br>';