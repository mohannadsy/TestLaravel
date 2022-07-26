<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;


    protected $fillable = [
        // general
        'code',
        'name',
        'latin_name',

        'is_active',
        'is_inherited',

        'security_degree',

        'category_id', // صنف
        'place',//مكان التواجد
        'manufacture_company', // الشركة المصنعة
        'origin_country',//بلط المنشأ
        'source',//المصدر
        'caliber',//العيار
        'chemical_composition',//تركيب كيميائي
        'weight',
        'size',
        'photo',
        'notes',


        // خيارات
        'type',
        'product_date',// تاريخ الانتاج

        'force_on_output',//فرض عند الاخراج
        'force_on_input',//فرض عند الادخال

        'aggregate_item',//مادة تجميعية
        'modified_item',

        'is_service', //مادة خدمية
        'is_stored',// مادة مستودعية
        'origin', //مادة أصل


        'unit_id',

        //  أسعار
//
//
//        'question',
//        'mandatory',
//        'price_increase',
//        'Price_before_increase',
//        'Price_before_increase',


//        // Unites
//
//        'unit1_name',
//        'unit1_barcode',
//
//
//        'unit2_name',
//        'unit2_barcode',
//        'conversion_factor',//عامل التحويل
//        'unit_id',
//        'not fixed',
//
//        'unit3_name',
//        'unit3_barcode',
//
//        'unit4_name',
//        'unit4_barcode',
//
//        'unit5_name',
//        'unit5_barcode',
//
//        'default_unit',
//        'item_limits',


        // كميات مستودعات
//
//        'store_id',
//        'amount',
//        'amount_sum',
//
//        //معدلات المواد
//        'rate',//معدل
//        //بدائل المادة
//        'statement',// بيان


        // updates : add branch in all cards
        'branch_id'
    ];


    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function units()
    {
        return $this->hasMany(Unit::class, 'unit_id');
    }

}
