<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pageTitle = "Dashboard";
        return view("merchant.dashboard", compact("pageTitle"));
    }
}
