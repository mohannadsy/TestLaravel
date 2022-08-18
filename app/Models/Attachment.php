<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    protected $fillable=['path','name','type','attachment_id' ];


    public function branch(){
        return $this->belongsTo(Branch::class,'attachment_id');
    }
    public function store(){
        return $this->belongsTo(Store::class,'attachment_id');
    }


}
