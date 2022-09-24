<?

function send_sms(string $message, string $phone)
{
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

        curl_close($curl);
        
        return $response.success ? 'Message sent' : 'Message not sent';
    }
    catch (Exception $e)
    {
        return 'Error: ' . $e->getMessage();
    }
}

?>