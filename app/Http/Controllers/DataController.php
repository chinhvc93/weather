<?php

namespace App\Http\Controllers;

use App\Imports\WeathersImport;
use Illuminate\Http\Request;
use Excel;

class DataController extends Controller
{

    public function __construct()
    {
    }

    public function index() {
        return view('data.import');
    }

    public function import() {
        return view('data.import');
    }

    public function actionImport(Request $request) {
        Excel::import(new WeathersImport, request()->file('file'));
        return redirect('data/import')->with('success', 'All good!');
    }
}
