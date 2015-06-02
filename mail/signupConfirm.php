<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
Hello <?= $first_name ?>,
<p>
Thank you for signing up for our email hosting service. Your account has been successfully set up. Please find below your login details.
</p>
Username: <?= $email ?> <br />
Password: <?= $password ?>
<p>
    <?= yii\helpers\Html::a('Click here ', \yii\helpers\Url::to(['site/index'])); ?> to start managing your email accounts.
</p>

Best Regards
<p>
    <strong>Softcube Team</strong>
</p>

