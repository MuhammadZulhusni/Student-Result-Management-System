<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Classe extends Model
{
    use HasFactory;
    protected $guarded = []; // Disable mass-assignment protection for all fields

    // Define a many-to-many relationship with the Subject model
    public function subjects(): BelongsToMany
    {
        // Return the relationship using the pivot table 'classes_subject' & Include the 'status' column from the pivot table in queries
        return $this->belongsToMany(Subject::class, 'classes_subject', 'classes_id', 'subject_id')->withPivot('status');
    }
}
