<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;

class ItemsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Item([
            'itemName_id' => $row[0],
            'manufacturerName_id' => $row[1],
            'serial_number' => $row[2],
            'configurationStatusName_id' => $row[3],
            'location' => $row[4],
            'description' => $row[5],
        ]);
    }
}
