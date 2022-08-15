<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Client;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report()
    {
        $blocks = Block::all();
        $clients = Client::all();
        return view('report.report', compact('clients', 'blocks'));
    }
}