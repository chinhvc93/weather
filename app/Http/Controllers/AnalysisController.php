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
        return redirect()->route('analysis.byDay');
    }

    //Tính trung bình theo ngày
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

    //Tính trung bình theo giờ trong ngày
    public function analysisByHour(Request $request)
    {
        if ($request->all()) {
            $data = $this->getByHour($request->date);
            return view('analysis.by_hour')->with("hours_avg", $data);
        }
        return view('analysis.by_hour');
    }

    //Tính trung bình theo phút trong ngày giờ
    public function analysisByMinute(Request $request)
    {
        if ($request->all()) {
            $data = $this->getByMinute($request->date, $request->hour);
            return view('analysis.by_minute')->with("minutes_avg", $data);
        }
        return view('analysis.by_minute');
    }

    public function getByMinute($date, $hour) {
        $minutes = [];
        for($minute = 0; $minute < 60; $minute++) {
            $minutes[] = str_pad($minute, 2, '0', STR_PAD_LEFT);
        }

        $result = [];
        $result["minute"] = $minutes;
        $result["temperature"] = [];
        $result["humidity"] = [];
        $result["ph"] = [];
        $result["soil_moisture"] = [];
        $result["pir"] = [];
        $result["ec_meter"] = [];
        $result["light"] = [];
        $result["pin"] = [];

        foreach ($minutes as $minute) {
            $date_data = Weather::where('date', '>=', $date . " ". $hour . ":". $minute .":00")
                ->where('date', '<', $date . " ". $hour . ":". $minute .":59")->get();
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

    public function getByHour($date) {
        $hours = [];
        for($hour = 0; $hour < 24; $hour++) {
            $hours[] = str_pad($hour, 2, '0', STR_PAD_LEFT);
        }
        $result = [];
        $result["hour"] = $hours;
        $result["temperature"] = [];
        $result["humidity"] = [];
        $result["ph"] = [];
        $result["soil_moisture"] = [];
        $result["pir"] = [];
        $result["ec_meter"] = [];
        $result["light"] = [];
        $result["pin"] = [];

        foreach ($hours as $hour) {
            $date_data = Weather::where('date', '>=', $date . " ". $hour . ":00:00")
                ->where('date', '<', $date . " ". $hour . ":59:59")->get();
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
