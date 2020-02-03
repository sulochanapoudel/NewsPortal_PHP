<?php


namespace App\Controllers;


use System\Core\BaseController;


class DashboardController extends BaseController
{
    public function index()
    {
        view('cms/dashboard/index.php');
    }
}