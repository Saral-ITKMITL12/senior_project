<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Report;
use Auth;

class ManageReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
