<?php

namespace App\Models;

use App\Enums\InputType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Input extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'type' => InputType::class,
    ];

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }
}
