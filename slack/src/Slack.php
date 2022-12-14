<?php

namespace Nordeveloper;

class Slack{

    public function send($slackData){

        // slack webhook url
        if( !empty($slackData['SLACK_WEBHOOK_URL']) ){
            $url = $slackData['SLACK_WEBHOOK_URL'];
        }else{
            return 'required:SLACK_WEBHOOK_URL';
        }

        if( empty($slackData['channel']) ){
            return 'required:channel';
        }

        if( empty($slackData['text']) ){
            return 'required:text';
        }


        if(is_array($slackData)){
            $datastring = json_encode($slackData);
        }else{
            $datastring = $slackData;
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datastring);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($datastring))
        );

        $response = curl_exec($ch);
        return $response;
    }

}