<?php

namespace App\Controllers;

use App\Views\ViewController;

class AdministradorController
{
    public function home(): void
    {
        $view = new ViewController();
        $view->render("admin/home");
    }
}