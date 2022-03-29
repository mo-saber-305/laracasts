<?php


namespace App\Services;

use MailchimpMarketing\ApiClient;


class Newsletter
{

    public function subscribe(string $email)
    {

        $mailchimp = new ApiClient();


        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.server')
        ]);

        return $mailchimp->lists->addListMember(config('services.mailchimp.list_id'), [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
    }

}
