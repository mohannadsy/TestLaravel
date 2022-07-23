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
        'notes',//ملاحظات
        'is_client',// عميل ؟

        'is_active',// مفعل ؟

        'account_id',//الحساب الرئيسي
        'final_account_id',//حساب ختامي
        'cost_center_id',//مركز الكلفة
        'currency_id', //عملة
        'equality',// تعادل
        'budget',//موازنة تقديرية
        'budget_value',//قيمة موازنة تقديرية

        'nature',//طبيعة الحساب Debtor or Creditor (مدين أو دائن)
        'current_balance',//الرصيد الحالي للحساب
        'final_account_result_id',//حساب النتائج
        'division_rate',//نسبة التقسيم
        'rates_sum',// مجموع النسب

        'creditor',
        'debtor',
        'balance',
        'client_id',

        'debtor_and_creditor', // مدين ودائن معا
        'not_debtor_not_creditor',// لا دائن ولا مدين
        'is_aggregate',// تجميعي ؟
        'is_distributive',// توزيعي ؟
        'is_final',// ختامي ؟
        'aggregate_ids',    //مصفوفة تضم الحسابات العادية ضمن هذا الحساب التجميعي
        'distributive_ids',//مصفوفة تضم الحسابات العادية ضمن هذا الحساب التوزيعي
        'security_degree',
    ];

    public function accounts()
    {
        return $this->hasMany(Account::class, 'account_id');
    }

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function client()
    {
        return $this->hasOne(Client::class, 'account_id');
    }
    public function stores()
    {
        return $this->hasMany(Store::class,'account_id');
    }
}
