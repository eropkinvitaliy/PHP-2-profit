<?php

namespace App\Core\Mail;

class SendMail
{

    public static function send($to, $title, $mess)
    {
        $transport = \Swift_SmtpTransport::newInstance('smtp.yandex.ru', 587, 'ssl')
            ->setUsername('ist.eropkin')
            ->setPassword('');

        $mailer = \Swift_Mailer::newInstance($transport);

        $message = \Swift_Message::newInstance()
            ->setFrom('ist.eropkin@yandex.ru')
            ->setTo($to)
            ->setSubject($title)
            ->setBody($mess);

        return $mailer->send($message);
    }

}
