<?php

namespace App\Exports;


use App\Models\Product;
use App\Models\Category;
use App\Models\Comment;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportComment implements FromArray
{
    public function array(): array
    {
        $data = Comment::get();
       
        $data =  $data->toArray();

        $data_array = [];
        
        foreach ($data as $row) {

            $product = Product::where('id', $row["commentable_id"])->first();
            $category = Category::where('id', $row["commentable_id"])->first();
            $data_array[] = [
                
                "نام" =>$row["name"],
                "ایمیل" =>$row["email"],
                "متن" =>$row["text"],
                "نام رپورتاژ" => @$product->title,
                "نام مقاله" => @$category->title,
                               

            ];
        }
        return [
      ['نام' , 'ایمیل' , 'متن' , 'نام رپورتاژ','نام مقاله',],
           $data_array
        ];
    }



    
}
