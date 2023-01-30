<?php

namespace App\Imports;

use App\Models\CarList;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CarsImport implements ToModel, WithChunkReading, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row){
        return new CarList([
            'mmcode' => $row['mmcode'],
            'make' => $row['make'],
            'model' => $row['model'],
            'variant' => $row['variant'],
            'year' => $row['regyear'],
            'body_type' => $row['bodytype'],
            'drive' => $row['drive'],
            'transmission' => $row['manualauto'],
            'fuel_type' => $row['fueltype'],
            'cylinders' => $row['nocylinders'],
        ]);
    }

    public function chunkSize(): int{
        return 1000;
    }
}
