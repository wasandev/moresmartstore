<?php

namespace App\Imports;

use App\Businesstype;

use Maatwebsite\Excel\Concerns\ToModel;

class BusinesstypeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Businesstype([
            'name'     => $row[0],
            'description' => $row[1],
        ]);
    }
}
