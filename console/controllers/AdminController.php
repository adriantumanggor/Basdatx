<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\User;

class AdminController extends Controller
{
    public function actionCreate($username, $email, $password)
    {
        $user = new User();
        $user->username = $username;
        $user->email = $email;
        $user->setPassword($password);
        $user->generateAuthKey();
        $user->status = User::STATUS_ACTIVE;

        if ($user->save()) {
            echo "Admin user created successfully.\n";
        } else {
            echo "Failed to create admin user.\n";
            print_r($user->errors);
        }
    }
}