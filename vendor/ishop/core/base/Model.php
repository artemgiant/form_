<?php

namespace ishop\base;

use ishop\Db;
use Valitron\Validator;

abstract class Model{

    public $attributes = [];
    public $errors = [];
    public $rules = [];

    public function __construct(){
        Db::instance();
    }


    public function load($data){

        foreach($this->attributes as $name => $value){
            if(array_key_exists($name,$data) && isset($data[$name])){
                $this->attributes[$name] = $data[$name];
            }
        }
    }

    public function save($table){
        $tbl = \R::dispense($table);
        foreach($this->attributes as $name => $value){
            $tbl->$name = $value;
        }
        return \R::store($tbl);
    }

    public static function related($own_t,$id_o,$related_t,$id_r){
        $user = \R::load($own_t,$id_o);
        $comment = \R::load($related_t,$id_r);
        $user->ownCommentsList[] = $comment;
        return \R::store($user);
    }

    public function validate($data){
        Validator::langDir(WWW . '/validator/lang');
        Validator::lang('ru');
        $v = new Validator($data);
        $v->rules($this->rules);
        if($v->validate()){
            return true;
        }
        $this->errors = $v->errors();
        return false;
    }

    public function getErrors(){
        $errors = '<ul>';
        foreach($this->errors as $error){
            foreach($error as $item){
                $errors .= "<li>$item</li>";
            }
        }
        $errors .= '</ul>';
        $_SESSION['error'] = $errors;
    }
    public function update($table,$id){
        $bean = \R::load($table,$id);
        foreach($this->attributes as $name => $value){
            $bean->$name = $value;
        }
        return \R::store($bean);
    }

}