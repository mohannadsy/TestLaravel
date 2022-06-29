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
        'is_final',
        'final_account_id',//حساب ختامي
        'cost_center_id',//مركز الكلفة
        'currency_id',//عملة
        'equality',// تعادل
        'budget',//موازنة تقديرية
        'nature',//طبيعة الحساب Debor or Creditor (مدين أو دائن)
        'current_balance',//الرصيد الحالي للحساب
        'final_account_result_id',//حساب النتائج
        'notes',
    ];
}
