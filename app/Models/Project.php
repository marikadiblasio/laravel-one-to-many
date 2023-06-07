<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'slug', 'image', 'url', 'description', 'type_id'];

    public function type():BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
