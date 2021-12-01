<?php

namespace app\models;


class TestModel extends \yii\base\Model
{
    public $name;
    public $surname;
    public $email;
    public $myAge;

    // Override yii\base\Model::attributeLabels() to explicitly declare attribute labels.
    // Returns an associative array with key pair attributes
    public function attributeLabels()
    {
        return [
            'name' => 'Your name',
            'email' => 'Your email address',
            'myAge' => 'Your Age',
        ];
    }

    // Rules - For validations

    public function rules()
    {
        return [
            // single rule for a single attribute
           ['name' , 'required'],
            //    single rule for multiple attributes
         [['email' , 'myAge'] , 'required']
        ];
    }


}