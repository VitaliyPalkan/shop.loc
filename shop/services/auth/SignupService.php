<?php


namespace shop\services\auth;


use shop\entities\User\User;
use shop\repositories\UserRepository;
use shop\forms\auth\SignupForm;
use JsonSchema\Exception\RuntimeException;
use Yii;
use yii\mail\MailerInterface;


class SignupService
{
    private $mailer;
    private $users;

    public function __construct(MailerInterface $mailer, UserRepository $users)
    {
        $this->mailer = $mailer;
        $this->users = $users;
    }

    public function signup(SignupForm $form): void
    {

        $user = User::requestSignup(
            $form->username,
            $form->email,
            $form->password
        );

        $this->users->save($user);

        $send = $this->mailer
            ->compose(
                ['html' => 'emailConfirmToken-html', 'text' => 'emailConfirmToken-text'],
                ['user' => $user]
            )
            ->setTo($form->email)
            ->setSubject('Sign up confirm ' . Yii::$app->name)
            ->send();

        if (!$send){
            throw new \RuntimeException('Sending error!');
        }
    }

    public function confirm($token): void
    {
        if (empty($token)) {
            throw new \DomainException('Empty confirm token!');
        }

        $user = $this->users->getByEmailConfirmToken($token);
        $user->confirmSignup();
        $this->users->save($user);
    }
}