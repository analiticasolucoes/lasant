<?php

namespace App\routes\entities;

use App\interfaces\RoutesInterface;

class LoginRoutes implements RoutesInterface
{

    public static function load(): array
    {
        return [
            '/' => [
                'controller' => 'LoginController',
                'method' => 'index',
                'public' => true,
            ],
            '/login' => [
                'controller' => 'LoginController',
                'method' => 'login',
                'public' => true
            ],
            '/logout' => [
                'controller' => 'LoginController',
                'method' => 'logout',
                'public' => false
            ],
            '/forgot-password' => [
                'controller' => 'LoginController',
                'method' => 'forgotPassword',
                'public' => true
            ],
            '/forgot-password/form' => [
                'controller' => 'LoginController',
                'method' => 'forgotPasswordHandler',
                'public' => true
            ],
            '/reset-password' => [
                'controller' => 'LoginController',
                'method' => 'resetPassword',
                'public' => true
            ],
            '/reset-password/form' => [
                'controller' => 'LoginController',
                'method' => 'resetPasswordHandler',
                'public' => true
            ],
            '/change-password' => [
                'controller' => 'LoginController',
                'method' => 'changePassword',
                'public' => false
            ],
            '/change-password/form' => [
                'controller' => 'LoginController',
                'method' => 'changePasswordHandler',
                'public' => false
            ],
        ];
    }
}