<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class CustomerExport implements FromCollection, WithHeadings,  WithColumnFormatting, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Customer::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Customer Name',
            'Email Address',
            'Gender',
            'Address',
            'State',
            'Country',
            'Dob',
            'Password',
            'Status',
            'Points',
            'Created_at',
            'Updated_at',
            
        ];
    }
    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER, 
            'B' => NumberFormat::FORMAT_TEXT, 
            'C' => NumberFormat::FORMAT_TEXT, 
            'D' => NumberFormat::FORMAT_TEXT, 
            'E' => NumberFormat::FORMAT_TEXT, 
            'F' => NumberFormat::FORMAT_TEXT, 
            'G' => NumberFormat::FORMAT_TEXT, 
            'H' => NumberFormat::FORMAT_DATE_YYYYMMDD2, 
            'I' => NumberFormat::FORMAT_TEXT,  //password
            'J' => NumberFormat::FORMAT_TEXT, 
            'K' => NumberFormat::FORMAT_TEXT, 
            'L' => NumberFormat::FORMAT_TEXT, 
            'M' => NumberFormat::FORMAT_TEXT, 
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 10, 
            'B' => 30, 
            'C' => 30, 
            'D' => 10, 
            'E' => 40, 
            'F' => 20, 
            'G' => 20, 
            'H' => 20,
            'I' => 35,   //password
            'J' => 10, 
            'K' => 10,
            'L' => 35, 
            'M' => 35, 

        ];
    }
    
}
