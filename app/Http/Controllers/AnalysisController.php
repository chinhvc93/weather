<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Imports\WeathersImport;
use App\Weather;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Excel;

class AnalysisController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        dd(1);
        return view('home.index');
    }

    public function analysisByDay(Request $request)
    {
        if ($request->all()) {
            $start_date = Carbon::createFromTimeString($request->start_date . "00:00:00");
            $end_date = Carbon::createFromTimeString($request->end_date . "00:00:00");
            $data = $this->getByDay($start_date, $end_date);
            return view('analysis.by_day')->with("days_avg", $data);
        }
        return view('analysis.by_day');
    }

    public function getByDay($start_date, $end_date)
    {
        $dates = $this->generateDateRange($start_date, $end_date);
        $result = [];
        $result["day"] = $dates;
        $result["temperature"] = [];
        $result["humidity"] = [];
        $result["ph"] = [];
        $result["soil_moisture"] = [];
        $result["pir"] = [];
        $result["ec_meter"] = [];
        $result["light"] = [];
        $result["pin"] = [];

        foreach ($dates as $date) {
            $date_data = Weather::where('date', '>=', $date . " 00:00:00")
                ->where('date', '<', $date . " 23:59:59")->get();
            $result["temperature"][] = format_number($date_data->avg("temperature"));
            $result["humidity"][] = format_number($date_data->avg("humidity"));
            $result["ph"][] = format_number($date_data->avg("ph"));
            $result["soil_moisture"][] = format_number($date_data->avg("soil_moisture"));
            $result["pir"][] = format_number($date_data->avg("pir"));
            $result["ec_meter"][] = format_number($date_data->avg("ec_meter"));
            $result["light"][] = format_number($date_data->avg("light"));
            $result["pin"][] = format_number($date_data->avg("pin"));
        }
        return $result;
    }

    public function generateDateRange(Carbon $start_date, Carbon $end_date)
    {
        $dates = [];
        for ($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }
        return $dates;
    }

}
