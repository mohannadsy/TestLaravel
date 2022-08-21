<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = ['path',
        'name',
        'type',
        'extension',
        ];

    public function attachmentable()
    {
        return $this->morphTo();

    }


}
