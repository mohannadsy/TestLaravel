<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'latin_name',
        'type',//نوع الحساب
        'account_id',//حساب رئيسي
        'final_account',//حساب ختامي
        'cost_center_id',//مركز الكلفة
        'currency_id',//عملة
        'equality',// تعادل
        'budget',//موازنة تقديرية
        'nature',//طبيعة الحساب
        'current_balance',//الرصيد الحالي للحساب
        'results',//حساب النتائج
        'notes',
    ];
}
