<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 04.05.2019
 * Time: 20:22
 */

namespace app\models;


class User extends AppModel
{
    public $attributes = [
        'id' => '',
        'surname' => '',
        'password' => '',
        'name' => '',
        'email' => '',
        'photo' => '',
        'role' => 'user',
    ];
    public $rules = [
        'required' => [
            ['surname'],
            ['name'],
            ['password'],
            ['email'],
        ],
        'email' => [
            ['email'],
        ],
    ];

    public function checkUnique(){
        $user = \R::findOne('user', ' email = ? AND id <> ?', [ $this->attributes['email'], $this->attributes['id']]);
        if($user){
            if($user->email == $this->attributes['email']){
                $this->errors['unique'][] = 'Этот email уже занят';
            }
            return false;
        }
        return true;
    }
}