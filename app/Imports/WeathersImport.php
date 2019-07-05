<?php

namespace App\Imports;

use App\Weather;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithStartRow;


class WeathersImport implements ToModel, WithBatchInserts, WithChunkReading, WithStartRow
{
    use Importable;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        return new Weather([
            'temperature' => $row[0],
            'humidity' => $row[1],
            'ph' =>  $row[2],
            'soil_moisture' =>  $row[3],
            'pir' =>  $row[4],
            'ec_meter' =>  $row[5],
            'light' =>  $row[6],
            'pin' => $row[7],
            'date' => date("Y-m-d G:i:s", strtotime($row[8]))
        ]);
    }

    //Bat dau tu hang thu 2 cua file excel return 2
    public function startRow(): int
    {
        return 2;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
