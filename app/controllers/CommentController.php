<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 03.05.2019
 * Time: 15:15
 */

namespace app\controllers;


use app\models\Comment;
use app\models\Mail;
use app\models\User;
use ishop\App;
use ishop\base\Model;

class CommentController extends AppController
{
    public function addAction()
    {
        if (!empty($_POST['registred']) && !empty($_SESSION['user'])) {

            $id = $_SESSION['user']['id'] ?: preg_grep('\n{1,}&', $_POST['registred']);
            $data = $_POST;
            $data['created_at'] = $this->date();
            $comment_m = new Comment();
            $comment_m->load($data);
            if ($id_c = $comment_m->save('comments')) {
//                Связь One to Meny
                $releted_id = Model::related('user', $id, 'comments', $id_c);
                $user_email = $_SESSION['user']['email'];
                $_SESSION['data_comment'] = $_SESSION['user'];
                $_SESSION['data_comment']['comment'] = $_POST['comment'];
                Mail::sendMessage($id_c, $user_email);
                $_SESSION['success'] = "Спасибо за коментарий !";
            }
            redirect();
        }

        if (!empty($_POST)) {
            $data = $_POST;
            if (!empty($_SESSION['single'])) {
                $data['photo'] = $_SESSION['single'];
                unset($_SESSION['single']);
            }
            //time created_at comment
            $data['created_at'] = $this->date();

            $comment_m = new Comment();
            $comment_m->load($data);

            $user_m = new User();
            $user_m->load($data);

            $this->validate($comment_m, $data);
            $this->validate($user_m, $data, true);

            $user_m->attributes['password'] = password_hash($user_m->attributes['password'], PASSWORD_DEFAULT);


            if (($id_u = $user_m->save('user')) && $id_c = $comment_m->save('comments')) {
//                Связь One to Meny
                $releted_id = Model::related('user', $id_u, 'comments', $id_c);
                //Для comment
                $_SESSION['user'] = $user_m->attributes;
                unset($_SESSION['user']['password']);
                unset($_SESSION['user']['photo']);
                unset($_SESSION['user']['role']);
                $_SESSION['user']['id'] = $id_u;
//                Для mail
                $_SESSION['data_comment'] = $data;
                $_SESSION['data_comment']['password'] = $id_c;
                $user_email = isset($_SESSION['data_comment']['email']) ? $_SESSION['data_comment']['email'] : $_POST['email'];
                Mail::sendMessage($id_c, $user_email);

                $_SESSION['success'] = 'Спасибо за Ваш коментарий!';
            }
            redirect();
        }
    }
    public function deleteAction()
    {
        if (!empty($_SESSION['user'])) {
            $id = (!empty($_GET['id'])) ? $_GET['id'] : '';
            $comment = \R::load('comments', $id);
            if (empty($comment)) {
                $_SESSION['error'] = "Такого коментария нету!";
                redirect();
            }
            $res = ($comment['user_id'] == $_SESSION['user']['id']) ? 1 : 0;
            if ($res) {
                \R::trash($comment);
                $_SESSION['success'] = 'Коментарий успешно удален! ';
            } else {
                $_SESSION['error'] = "Этот коментарий пренадлежыт не вам";
            }
            redirect();

        }
    }

    public function validate($model, $data, $unique = false)
    {
        if ($unique) {

            if (!$model->validate($data) || !$model->checkUnique()) {

                $model->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }
        } else {
            if (!$model->validate($data)) {
                $model->getErrors();
                $_SESSION['form_data'] = $data;
                redirect();
            }
        }

        return true;
    }

    public function date()
    {
        setlocale(LC_ALL, 'ru_RU', 'ru_RU.UTF-8', 'ru', 'russian');
        $time = strftime("%H:%M, %d %b %Y", time());
        return $time;
    }

    public function addImageAction()
    {
        if (!empty($_GET['upload'])) {
            if ($_POST['name'] == 'single') {
                $wmax = App::$app->getProperty('img_width');
                $hmax = App::$app->getProperty('img_height');

            }
            $name = $_POST['name'];
            $comment_m = new Comment();
            $comment_m->uploadImg($name, $wmax, $hmax);
        }
    }
}