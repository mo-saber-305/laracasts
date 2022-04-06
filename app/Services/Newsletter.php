<?php


namespace App\Services;

use MailchimpMarketing\ApiClient;


class Newsletter
{
    protected $apiKey;
    protected $server;
    protected $listId;

    public function __construct()
    {
     $this->apiKey = config('services.mailchimp.key');
     $this->server = config('services.mailchimp.server');
     $this->listId = config('services.mailchimp.list_id');
    }

    public function subscribe(string $email)
    {

        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => $this->apiKey,
            'server' => $this->server
        ]);

        return $mailchimp->lists->addListMember($this->listId, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }

}
