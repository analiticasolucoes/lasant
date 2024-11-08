<?php

namespace App\Controllers;

use App\Database\Database;
use App\Repositories\I0SCORepository;
use App\Views\ViewController;

class I0SCOController
{
    private I0SCORepository $i0SCORepository;
    private ViewController $view;

    public function __construct(Database $conn)
    {
        $this->i0SCORepository = new I0SCORepository($conn);
        $this->view = new ViewController();
    }

    public function view(int $id): void
    {
        $i0SCO = $this->i0SCORepository->find($id);
        $this->view->render('i0SCO/view', ['i0SCO' => $i0SCO]);
    }
}