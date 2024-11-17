<?php
require_once __DIR__ . '../vendor/autoload.php';

use MailerSend\MailerSend;
use MailerSend\Helpers\Builder\Recipient;
use MailerSend\Helpers\Builder\EmailParams;

$mailersend = new MailerSend(['api_key' => 'key']);

$recipients = [
    new Recipient('recipient@email.com', 'Recipient'),
];

$emailParams = (new EmailParams())
    ->setFrom('info@domain.com')
    ->setFromName('Your Name')
    ->setRecipients($recipients)
    ->setSubject('Subject')
    ->setHtml('This is the HTML content')
    ->setText('This is the text content');

$mailersend->email->send($emailParams);
?>