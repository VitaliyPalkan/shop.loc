<?php


namespace shop\useCases;


use shop\forms\ContactForm;
use JsonSchema\Exception\RuntimeException;
use Yii;
use yii\mail\MailerInterface;

class ContactService
{
    private $adminEmai;
    private $mailer;

    public function __construct($adminEmail, MailerInterface $mailer)
    {
        $this->adminEmai = $adminEmail;
        $this->mailer = $mailer;
    }

    public function send(ContactForm $form): void
    {
        $send = $this->mailer->compose()
            ->setTo($this->adminEmai)
            ->setSubject($form->subject)
            ->setTextBody($form->body)
            ->send();
        if (!$send){
            throw new RuntimeException('Sending error!');
        }
    }
}