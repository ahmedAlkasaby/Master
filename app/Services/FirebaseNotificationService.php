<?php
namespace App\Services;

use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging;
use Kreait\Firebase\Factory;

class FirebaseNotificationService
{
    protected $messaging;

    // تعديل البناء ليقبل projectId
    public function __construct(string $projectId)
    {
        $service_account_path = storage_path('woudian-project-firebase-adminsdk-44c8h-3d70edd94d.json');

        $factory = (new Factory)->withServiceAccount($service_account_path)->withProjectId($projectId);
        $this->messaging = $factory->createMessaging();
    }

    public function sendNotification($token, $title, $body, $data = [])
    {
        $message = CloudMessage::withTarget('token', $token)
            ->withNotification([
                'title' => $title,
                'body'  => $body,
            ])
            ->withData($data);

        return $this->messaging->send($message);
    }
}
