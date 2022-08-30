<?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://send-sms18.p.rapidapi.com/",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "{\r\n    \"phone_number\": \"22995146985\",\r\n    \"text\": \"rtyugiho\"\r\n}",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: send-sms18.p.rapidapi.com",
        "X-RapidAPI-Key: 794b821671msh2bb53d96dd359afp190ae4jsna74ac000dd78",
        "content-type: application/json"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
