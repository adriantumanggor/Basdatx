<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        if (!$auth) {
            echo "Error: authManager is not configured properly.\n";
            return ExitCode::CONFIG;
        }

        try {
            // Create roles
            $admin = $auth->createRole('admin');
            $auth->add($admin);

            // Create permissions
            $viewAdminPage = $auth->createPermission('viewAdminPage');
            $viewAdminPage->description = 'View the admin page';
            $auth->add($viewAdminPage);

            // Assign permissions to roles
            $auth->addChild($admin, $viewAdminPage);

            // Assign roles to users
            $auth->assign($admin, 1); // Assuming the admin user has ID 1

            echo "RBAC initialization completed successfully.\n";
            return ExitCode::OK;
        } catch (\Exception $e) {
            echo "An error occurred: " . $e->getMessage() . "\n";
            return ExitCode::UNSPECIFIED_ERROR;
        }
    }
}