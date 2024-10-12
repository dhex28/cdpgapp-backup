<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Controllers\BaseController;

class MessengerWebhook extends BaseController
{
    public function receive()
    {
        // Get the request body sent by Messenger
        $input = json_decode(file_get_contents('php://input'), true);
        
        // Verify that this request is from Facebook
        if ($input['object'] === 'page') {
            foreach ($input['entry'] as $entry) {
                foreach ($entry['messaging'] as $event) {
                    if (isset($event['message'])) {
                        $this->handleMessage($event);
                    }
                }
            }

            return $this->response->setStatusCode(200)->setBody('EVENT_RECEIVED');
        } else {
            return $this->response->setStatusCode(404);
        }
    }

    private function handleMessage($event)
    {
        $senderId = $event['sender']['id'];
        $messageText = $event['message']['text'];

        // Send a response back using Messenger API
        $this->sendMessage($senderId, "You sent: $messageText");
    }

    private function sendMessage($recipientId, $messageText)
    {
        $accessToken = 'YOUR_PAGE_ACCESS_TOKEN';  // Replace with your page access token
        $messageData = [
            'recipient' => ['id' => $recipientId],
            'message' => ['text' => $messageText],
        ];

        $ch = curl_init('https://graph.facebook.com/v12.0/me/messages?access_token=' . $accessToken);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($messageData));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close($ch);
    }

    public function verifyWebhook()
{
    $mode = $this->request->getVar('hub_mode');
    $token = $this->request->getVar('hub_verify_token');
    $challenge = $this->request->getVar('hub_challenge');

    if ($mode === 'subscribe' && $token === 'EAAG541jxFKMBO1U7uC9hUsZC0BmiitBatyYmXE9yVQpNI7d71L3ait4ZBNZCbUjDQn7p9VxXEHgqEad2Q40xZBjdUqNWskzpzgbYtnojRhzXBTZBti22598ojbmNWDxacWyPXZAcrZAog1LD9zHfBXZA7PdPHQ9tihVkomJusE4SxAxsIwW0ZA1aGwrejlhtFKYR0yAZDZD') {
        return $this->response->setBody($challenge);
    }

    return $this->response->setStatusCode(403);
}
}
