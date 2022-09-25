<?php

function send_sms($message,$phone)
{
    $message = urlencode($message);
    $phone = urlencode($phone);

    try
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://demo.microtech.co.zm/api/v1/bulk-sms/demo?context=api_user&sender_id=CBUCLINIC&message='.$message.'&phoneNumber='.$phone,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        var_dump($response);

        curl_close($curl);
        echo $response;

    }
    catch (Exception $e)
    {
        return 'Error: ' . $e->getMessage();
    }
}

?>