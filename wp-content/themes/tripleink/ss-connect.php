<?php
    
    require_once("../../../wp-load.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Initialize URL Variables
    $baseURL = "https://api.smartsheet.com/2.0";
    $sheetsURL = $baseURL ."/sheets/";
    $rowsURL = $baseURL. "/sheets/7415650571315076/rows";
  
    // Insert your Smartsheet API Token here
    $accessToken = "4c8cg06u0x91l9e4lr11vr48vn";

    // Create Headers Array for Curl
    $headers = array(
        "Authorization: Bearer ". $accessToken,
        "Content-Type: application/json"
    );

    // convert form data to json format
    $postArray = array(
        "toTop" => true,
        "cells" => array(
            array("columnId"=>"7683128551597956", "value"=>$_POST['7683128551597956']),
            array("columnId"=>"1641629984548740", "value"=>$_POST['1641629984548740']),
            array("columnId"=>"5050631426729860", "value"=>$_POST['5050631426729860']),
            array("columnId"=>"3893429798233988", "value"=>$_POST['3893429798233988']),
            array("columnId"=>"8397029425604484", "value"=>$_POST['8397029425604484']),
            array("columnId"=>"4190667304920964", "value"=>$_POST['4190667304920964']),
            array("columnId"=>"3330479844812676", "value"=>$_POST['3330479844812676']),
            array("columnId"=>"5582279658497924", "value"=>$_POST['5582279658497924']),
            array("columnId"=>"7834079472183172", "value"=>$_POST['7834079472183172']),
            array("columnId"=>"2204579937970052", "value"=>$_POST['2204579937970052']),
            array("columnId"=>"6708179565340548", "value"=>$_POST['6708179565340548']),
            array("columnId"=>"7147537539852164", "value"=>$_POST['7147537539852164']),
            array("columnId"=>"6021637633009540", "value"=>$_POST['6021637633009540']),
            array("columnId"=>"1518038005639044", "value"=>$_POST['1518038005639044']),
            array("columnId"=>"8273643605124996", "value"=>$_POST['8273643605124996'])
        )
    );

    $json = json_encode( $postArray );

    // Connect to Smartsheet API to add rows of data to the sheet
    $curlSession = curl_init($rowsURL);
    curl_setopt($curlSession, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curlSession, CURLOPT_POST, 1);
    curl_setopt($curlSession, CURLOPT_POSTFIELDS, $json);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, TRUE);
    $rowsResponse = curl_exec($curlSession);

    // if(curl_error($curlSession)) {
    //     echo 'error:' . curl_error($curlSession);
    // }

    // Assign response to variable 
    $addRowsObj = json_decode($rowsResponse);
    $rowID = $addRowsObj->result->id;

    if (curl_getinfo($curlSession, CURLINFO_HTTP_CODE) != 200) {
        echo 'Error adding row';
    } else {
        curl_close($curlSession);
    }

    //
    // ADD ATTACHMENT TO ROW
    //

    // handle attachments
    if (!function_exists('wp_handle_upload')) {
      require_once(ABSPATH . 'wp-admin/includes/file.php');
    }

    $file = $_FILES['attachment'];
    $upload_overrides = array('test_form' => false);
    $movefile = wp_handle_upload($file, $upload_overrides);
    $attachments = $movefile;

    $rowAttachmentsURL = $baseURL. "/sheets/7415650571315076/rows/".$rowID."/attachments";

    if ($movefile && ! isset($movefile['error'])) {
        $fileUpload = $attachments['file'];
        $filename = substr($fileUpload, strrpos($fileUpload, '/') + 1);
        $fileToAttach = $fileUpload;
        $fileStream = fopen($fileToAttach, 'r') or die($filename ."file won't open");
        $fileSize = filesize($fileToAttach);

        $aheaders = array(
            'Authorization: Bearer '. $accessToken,
            'Content-Disposition: attachment; filename="'. $filename .'"',
            'Content-Length: '. $fileSize
        );

        // Connect to Smartsheet API to post file attachment
        $attachmentSession = curl_init($rowAttachmentsURL);
        curl_setopt($attachmentSession, CURLOPT_HTTPHEADER, $aheaders);    
        curl_setopt($attachmentSession, CURLOPT_INFILE, $fileStream);
        curl_setopt($attachmentSession, CURLOPT_INFILESIZE, $fileSize);
        curl_setopt($attachmentSession, CURLOPT_UPLOAD, 1);
        curl_setopt($attachmentSession, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($attachmentSession, CURLOPT_CUSTOMREQUEST, "POST");

        // if(curl_error($attachmentSession)) {
        //     echo 'error:' . curl_error($attachmentSession);
        // }

        $attachResponse = curl_exec($attachmentSession);
        $attachObj = json_decode($attachResponse);
    
        if (curl_getinfo($attachmentSession, CURLINFO_HTTP_CODE) != 200) {
            echo 'Error uploading attachment';
        } else {         
            // Remove image from uploads folder
            unlink($attachments['file']);

            // close curlSession 
            curl_close($attachmentSession); 
        }
    }
?>