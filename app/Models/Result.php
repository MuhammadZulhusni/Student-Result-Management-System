<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Result extends Model
{
    use HasFactory;
    protected $guarded = []; // Disable mass-assignment protection for all fields

    // Defines a relationship indicating that each result belongs to a specific student
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    // Defines a relationship indicating that each result belongs to a specific subject
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}
