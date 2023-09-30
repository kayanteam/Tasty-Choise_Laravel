<?php

namespace App\Traits;

use App\Models\Employee;
use App\Models\Sector;
use Illuminate\Http\Request;

trait FcmTrait
{

    private static $apiKey = "AAAAGvbpX7Q:APA91bHoHXAsziE0zD-GAxHETLmRAS-GzrxRGeOESUosOoEBcbOY1TUEx82E0nWM7CtiF6SGo7qz8zeWWzL0d2desgmGjEexbiX1A2xIWYPU90nwEbYUc848HP49lMd3J0EJvhIfGwRg";


    public function sendUserFcmNotifications($token, $title, $message)
    {
        $apiKey = self::$apiKey;
        $fcmUrl = "https://fcm.googleapis.com/fcm/send";

        $token = $token;
        $body = $message;
        $notification = array(
            "title" => $title,
            "body" => $body,
            "sound" => "default",
            "click_action" => "FCM_PLUGIN_ACTIVITY",
            "icon" => "fcm_push_icon"
        );
        $data = array(
            "message" => "the notify successfully"
        );
        $arrayToSend = array(
            'to' => $token,
            'notification' => $notification,
            'data' => $data,
            'priority' => 'high'
        );

        $json = json_encode($arrayToSend);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key=' . $apiKey;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        $result = curl_exec($ch);

        curl_close($ch);
       
        return true;
    }

    public function sendPartnerFcmNotifications($token, $title, $message)
    {

        // FCM Configration
        // $SERVER_API_KEY = 'AAAAsY2jy8E:APA91bGrVuvwowMK5ZM64ArsIdN6PpOUQ-Jay21AFygfFomNOd_8-uYaDeCYnwtEC-P20w0NZtOgj3n280CYbDbEKtGV4fLMot7ZDEeHng0xibwB2jk_VSRbyriaaTE972Q3VVJgxq7-';
        // $token_1 = $token;
        // $data = [
        //     "registration_ids" => [
        //         $token_1
        //     ],

        //     "notification" => [

        //         "title" => $title,

        //         "body" => $message ,

        //         "sound" => "default"  ,// required for sound on ios 

        //         "click_action" => "FCM_PLUGIN_ACTIVITY",

        //     ],
        //     // 'priority' => 'high',

        // ];

        // $dataString = json_encode($data);

        // $headers = [

        //     'Authorization: key=' . $SERVER_API_KEY,

        //     'Content-Type: application/json',

        // ];

        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

        // curl_setopt($ch, CURLOPT_POST, true);

        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        // $response = curl_exec($ch);


        //----------------------------------------------------------


        $apiKey = "AAAA21_PjU8:APA91bFCdll_ZccRwdzWu308d9HRxcFLi-08dV2U8-ETsV1BIhwYhchCdA1jTOx7ayat8zSNlpE02ZCo0A-eJlIu9f5B3OaqhBUOrz7cwowhf8qsPihJbIxlrK83tTXmQ3VgzgJAlnQH";
        $fcmUrl = "https://fcm.googleapis.com/fcm/send";

        $token = $token;


        $body = $message;

        $notification = array(
            "title" => $title,
            "body" => $body,
            "sound" => "default",
            "click_action" => "FCM_PLUGIN_ACTIVITY",
            "icon" => "fcm_push_icon"
        );

        $data = array(
            "message" => "the notify successfully"
        );

        $arrayToSend = array(
            'to' => $token,
            'notification' => $notification,
            'data' => $data,
            'priority' => 'high'
        );

        $json = json_encode($arrayToSend);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key=' . $apiKey;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

        $result = curl_exec($ch);

        curl_close($ch);

        return true;
    }

    public function sendFcmNotifications($title, $message)
    {
        $apiKey = self::$apiKey;

        $fcmUrl = "https://fcm.googleapis.com/fcm/send";
        $employees = Employee::where('device_token', '!=', null)->get();
        foreach ($employees as $employee) {
            $token = $employee->device_token;
            $body = $message;
            $notification = array(
                "title" => $title,
                "body" => $body,
                "sound" => "default",
                "click_action" => "FCM_PLUGIN_ACTIVITY",
                "icon" => "fcm_push_icon"
            );
            $data = array(
                "message" => "the notify successfully"
            );
            $arrayToSend = array(
                'to' => $token,
                'notification' => $notification,
                'data' => $data,
                'priority' => 'high'
            );

            $json = json_encode($arrayToSend);

            $headers = array();
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Authorization: key=' . $apiKey;

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $fcmUrl);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

            $result = curl_exec($ch);

            curl_close($ch);

            return true;
        }
    }
}
