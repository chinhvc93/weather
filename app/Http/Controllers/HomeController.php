<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\WeathersImport;
use App\Weather;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Excel;

class HomeController extends Controller
{

    public function __construct()
    {
    }

    public function index() {
        return view('home.index');
    }

    public function import() {
        return view('home.import');
    }

    public function actionImport(Request $request) {
        Excel::import(new WeathersImport, request()->file('file'));
        return redirect('/dashboard/import')->with('success', 'All good!');
    }

    public function analysis() {
        return view('home.analysis');
    }

    public function actionAnalysis(Request $request) {
//        dd($request->all());
        $start_date =  Carbon::createFromTimeString("2018-10-06 00:00:00");
        $end_date =  Carbon::createFromTimeString("2018-10-16 00:00:00");

        //TB
        $dates = $this->generateDateRange($start_date, $end_date);
        $result = [];
        foreach ($dates as $date) {
            $result[] = [
                "date" => $date,
                "temperature" =>  Weather::where('date', '>=', $date . " 00:00:00")
                    ->where('date', '<', $date . " 23:59:59")
                    ->avg("temperature"),
            ];
        }

        if(count($result) > 0) {
            return view('home.analysis')->with("days_avg", $result);
        }

        return view('home.analysis');
    }

    public function generateDateRange(Carbon $start_date, Carbon $end_date)

    {

        $dates = [];

        for($date = $start_date; $date->lte($end_date); $date->addDay()) {

            $dates[] = $date->format('Y-m-d');

        }

        return $dates;

    }

}
