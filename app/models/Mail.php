<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 05.05.2019
 * Time: 16:08
 */

namespace app\models;


use ishop\App;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Mail
{


public static function sendMessage($coment_id, $user_email){
    // Create the Transport
    $transport = (new Swift_SmtpTransport(App::$app->getProperty('smtp_host'), App::$app->getProperty('smtp_port'), App::$app->getProperty('smtp_protocol')))
        ->setUsername(App::$app->getProperty('smtp_login'))
        ->setPassword(App::$app->getProperty('smtp_password'))
    ;
    // Create the Mailer using your created Transport
    $mailer = new Swift_Mailer($transport);

    // Create a message
    ob_start();
    require APP . '/views/mail/comment.php';
    $body = ob_get_clean();


    $message_client = (new Swift_Message("Спасибо за коментарий №{$coment_id} на сайте " . App::$app->getProperty('site_name')))
        ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
        ->setTo($user_email)
        ->setBody($body, 'text/html')
    ;

    $message_admin = (new Swift_Message("Коментарий добавнел  пользователем c именем{$_SESSION['data_comment']['name']}"))
        ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('shop_name')])
        ->setTo(App::$app->getProperty('admin_email'))
        ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message_client);
    $result = $mailer->send($message_admin);
    unset($_SESSION['data_comment']);


}

}