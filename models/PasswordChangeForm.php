<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\models;
use Yii;
use yii\base\Model;

/**
 * Description of PasswordChangeForm
 *
 * @author aafetsrom
 */
class PasswordChangeForm extends Model {
    
    public $current_password;
    public $new_password;
    public $password_repeat;


    public function rules() {
       return [
           [['current_password', 'new_password'], 'required'],
           ['password_repeat', 'compare', 'compareAttribute' => 'new_password'],
           [['current_password', 'new_password'], 'safe'],
       ];
    }
    
    public function attributeLabels() {
        return [
          'password_repeat' => 'Confirm Password',  
        ];
    }

        public function verifyPassword()
    {
        $user = AccountUsers::findOne(['email' => \Yii::$app->user->identity->email]);
        
        if($user != null)
        {
           return \Yii::$app->getSecurity()->validatePassword($this->current_password, $user->password_hash);
        }
        else 
        {
            $this->addError('current_password', 'Current password is wrong. Try again');
            return false;
        }
    }
    
    public function changePassword()
    {
        
        if($this->verifyPassword())
        {
            $user = AccountUsers::findOne(['email' => \Yii::$app->user->identity->email]);
            $user->password = $this->new_password;
            $user->update();
            return true;
        }
        else
        {
            return false;
        }
    }
}
