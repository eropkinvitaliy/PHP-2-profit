<?php

namespace App\Core\Mail;

class SenderMail
{

    public static function send()
    {
        $transport = \Swift_SmtpTransport::newInstance('smtp.mail.ru', 465, 'ssl')
            ->setUsername('ist70@mail.ru')
            ->setPassword('');

        $mailer = \Swift_Mailer::newInstance($transport);

        $messages = \Swift_Message::newInstance('Wonderful Subject')
            ->setFrom('my@example.com')
            ->setTo(['eva@prokma.ru' => 'Работа'])
            ->setContentType("text/html; charset=UTF-8")
            ->setBody('Тестовое сообщение о БД', 'text/html');

        $result = $mailer->send($messages);
    }

}
