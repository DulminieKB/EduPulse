<?php

    //JSON format link of the API endpoint
    $api_endpoint = "https://marcconrad.com/uob/tomato/api.php";

    //make a request to the API endpoint
    $response = file_get_contents($api_endpoint);

    //decode the JSON response
    $data = json_decode($response);

    //get the image URL from the JSON response
    $image_url = $data->question;

    //fetch the image from the URL
    $image = file_get_contents($image_url);

    //get the answer from JSON response
    $answer = $data->answer;

?>
