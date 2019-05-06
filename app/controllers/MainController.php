<?php

namespace app\controllers;

use DateTime;
use ishop\Cache;

class MainController extends AppController
{

    public function indexAction()
    {
        if (!empty($_POST)) {
            debug($_POST, 1);
        }
        $data = \R::getAll("SELECT `comments`.*,`user`.`name`,`user`.`photo` FROM `comments` JOIN `user` ON  `comments`.`user_id` = `user`.`id`");

        $count = count($data);
        $this->set(compact('data', 'count'));
        $this->setMeta('Коментарии');

    }


}