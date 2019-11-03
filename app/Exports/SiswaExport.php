<?php

namespace App\Exports;

use App\Mapel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;

class SiswaExport implements FromCollection, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mapel::all();
    }

     public function map($mapel): array
    {
        return [
          
          $mapel->nama,
          $mapel->semester,
        
          
        ];
    }
}
