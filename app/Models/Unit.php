<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'barcode',
        'convert_parameter',
        'unit_id',

        'default_unit',
        'item_limit',


        'value',
        'gain',
        'percentage_gain',
        // Prices

        'last_purchase',
        'middle_purchase',
        'max_purchase',
        'min_price',
        'cost',

        'currency_id',
        'equality', // تعادل
        'automatic_discount_on_sale', // حسم تلقائي عند المبيع
        'added_value_tax',// ضريبة القيمة المضافة
        'pricing_method',


    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'unit_id');
    }

}
