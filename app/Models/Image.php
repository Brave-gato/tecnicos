<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['intervention_id', 'path'];

    public function intervention()
    {
        return $this->belongsTo(Intervention::class);
    }
}
