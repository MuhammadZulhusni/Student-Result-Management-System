<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;
    protected $guarded = []; // Disable mass-assignment protection for all fields

    public function class(): BelongsTo
    {
        // This method defines an inverse one-to-many relationship between the student model and the 'Classes' model.
        return $this->belongsTo(Classe::class, 'class_id', 'id');
    }
}
