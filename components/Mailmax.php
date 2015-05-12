<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mailmax
 *
 * @author aafetsrom
 */
namespace app\components;

class Mailmax {
    
    public static function isAdmin()
    {
        if(!in_array(\Yii::$app->user->identity->email, \Yii::$app->params['adminUsers']))
            {
               return false;
            }
            else
            {
                return true;
            }
    }
}
