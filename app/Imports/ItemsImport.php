<?php

namespace App\Imports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ItemsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Item([
            'itemName_id' => $row['item_name'],
            'manufacturerName_id' => $row['manufacturer_name'],
            'serial_number' => $row['serial_number'],
            'configurationStatusName_id' => $row['configuration_status'],
            'location' => $row['location'],
            'description' => $row['description'],
        ]);
    }
}
