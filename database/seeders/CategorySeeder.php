<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        $category1 = Category::create([
            'code' => 1,
            'name' => 'فاكهة',
            'latin_name' => 'fruit',
            'security_degree' => 1,
            'type' => 'Aggregate',
            'branch_id' => 1,
            'is_active' => false,
            'is_aggregate' => true,
            'notes' => 'notes',

        ]);
    }
}