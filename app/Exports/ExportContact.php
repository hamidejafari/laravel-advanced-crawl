<?php

namespace App\Exports;


use App\Models\Contact;


use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportContact implements FromArray
{
    public function array(): array
    {
        $data = Contact::get();
        
        $data =  $data->toArray();

        $data_array = [];
        foreach ($data as $row) {

            $data_array[] = [

                "نام" =>$row["name"],
                "ایمیل" =>$row["email"],
                "شماره" =>$row["phone"],
                "موضوع" =>$row["subject"],
                "درخواست" =>$row["text"],

                
            ];
        }
        return [
      ['نام' , 'ایمیل' ,'شماره', 'موضوع','درخواست', ],
           $data_array
        ];
    }
}
           