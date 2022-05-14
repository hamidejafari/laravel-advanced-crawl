<?php

namespace App\Imports;

use App\Library\Help;
use App\Models\Product;
use App\Models\Category;
use App\Models\Language;
use App\Models\Country;
use App\Models\ProductCategory;
use App\Models\ProductStatus;
use App\Models\Status;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Product|null
     */

    public function model(array $row)
    {

        if($row[0] !== "نام دسته"){
            Category::create([
                'title'=>$row[0],
                'english_titles'=>$row[1],
            ]);
        }else{
            return [];
        }
    }
}
