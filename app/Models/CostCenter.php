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
         ];
        public function cost_centers()
        {
            return $this->hasMany('App\Models\CostCenters', 'center_id');
        }
        public function cost_center()
        {
            return $this->belongsTo('App\Models\CostCenters', 'center_id');
        }
}