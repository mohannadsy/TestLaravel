<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;


    protected $fillable = [

        // basics
        'code',
        'name',
        'latin_name',
        'is_active',// مفعلة
        'is_inherited',// مورثة

        // new
        'code_starts_with',
        'name_starts_with',
        'color',
        'size',
        'height',// ارتفاع
        'width', // عرض
        'length ',//طول


        'security_degree',


        // general
        'category_id', // صنف
        'place',//مكان التواجد
        'manufacture_company', // الشركة المصنعة
        'origin_country',//بلد المنشأ
        'source',//المصدر
        'caliber',//العيار
        'chemical_composition',//تركيب كيميائي
        'weight',
        'size',
        'photo',
        'notes',


        // units
        'unit_id',


        // options
        'type',
        'product_date',// تاريخ الانتاج

        // تاريخ انتهاء الصلاحية
        'expiration_date_force_on_input',//فرض عند الادخال
        'expiration_date_force_on_output',//فرض عند الاخراج

        'aggregate_item',//مادة تجميعية
        'modified_item',//مادة معدلة

        //   رقم تسلسلي
        'serial_number_force_on_input',//فرض عند الادخال
        'serial_number_force_on_output',//فرض عند الاخراج

        // item type
        'is_service', //مادة خدمية
        'is_stored',// مادة مستودعية
        'is_origin', //مادة أصل

        // Stores Amounts

        'store_id',
        'amount',
        'amount_sum',


        'is_additive',
        'additive_IDs',

        //  أسعار
//
//
//        'question',
//        'mandatory',
//        'price_increase',
//        'Price_before_increase',
//        'Price_before_increase',


//        //معدلات المواد
//        'rate',//معدل
//        //بدائل المادة
//        'statement',// بيان


        // updates : add branch in all cards
        'branch_id'
    ];

    protected $casts = [
        'additive_IDs' => 'array',
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
