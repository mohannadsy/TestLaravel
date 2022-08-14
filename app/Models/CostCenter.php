<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostCenter extends Model
{
    use HasFactory;

         protected $fillable = [
             'code',
             'name',
             'latin_name',
             'center_id',
             'balance',
             'in_balance',
             'out_balance',
             'notes',
             'security_degree',

             // updates : add branch in all cards
             'branch_id'
         ];
        public function cost_centers()
        {
            return $this->hasMany('App\Models\CostCenters', 'center_id')->with('cost_centers')->select('id','name','code', 'center_id');
        }
        public function cost_center()
        {
            return $this->belongsTo('App\Models\CostCenters', 'center_id');
        }
        public function branch()
        {
            return $this->belongsTo(Branch::class, 'branch_id');
        }
}
