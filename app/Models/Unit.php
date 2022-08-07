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

        'not_fixed',

        'default_unit',
        'item_limits',

        // Prices


        'automatic_price_calculation',  // حساب تلقائي للأسعار


        'value',// قيمة
        'gain',// ربح
        'percentage_gain',//ربح %



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
//        'is_default',



    ];

    public function item()
    {
        return $this->belongsTo(Item::class, 'unit_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
    public function units()
    {
        return $this->hasMany(Unit::class, 'unit_id');
    }

}
