<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 03.05.2019
 * Time: 12:48
 */

namespace app\widgets\Form;


class Form
{
    public static function viewForm($v_default= 'default',$v_registred = 'registred',$dir = 'Form/form_tpl'){
        if(empty($_SESSION['user'])){
            self::loadView($dir,$v_default);}
        else{
            self::loadView($dir,$v_registred);
        }
    }

    public static function loadView($dir,$view){
        $file =  APP . "/widgets/{$dir}/{$view}.php";
        if(file_exists($file)) {
            require $file;
            return true;
        }else{debug($file);}
        return false;
    }
}