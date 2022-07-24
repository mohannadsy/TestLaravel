<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;


    protected $fillable = [
        'code',
        'name',
        'latin_name',
        'is_active',
        'is_inherited',
        'security_degree',
        'class', // صنف
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



        // Prices

        'automatic_price_calculation',
        'last_purchase',
        'middle_purchase',
        'max_purchase',
        'min_price',
        'cost',

        'currency',
        'equality', // تعادل
        'automatic_discount_on_sale', // حسم تلقائي عند المبيع
        'added_value_tax',// ضريبة القيمة المضافة
        'pricing_method',

        // خيارات
        'item_type',
        'finish_date',// تاريخ الانتهاء
        'expiration_date',// تاريخ انتهاء الصلاحية
        'force_on_output',//فرض عند الاخراج
        'force_on_input',//فرض عند الادخال
        'aggregate_item',//مادة تجميعية
        'question',
        'mandatory',
        'price_increase',
        'Price_before_increase',
        'Price_before_increase',


        'modified_item',
        'serial_number',


        // كميات مستودعات

        'store_id',
        'amount',
        'amount_sum',

        //معدلات المواد
        'rate',//معدل
        //بدائل المادة
        'statement',// بيان








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


    ];
}
