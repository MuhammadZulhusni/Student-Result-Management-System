<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = []; // Disable mass-assignment protection for all fields

    // Define a many-to-many relationship with the Classes model
    public function classes(): BelongsToMany
    {
        // Return the relationship using the pivot table 'classes_subject' & Include the 'status' column from the pivot table in queries
        return $this->belongsToMany(classes::class, 'classes_subject', 'subject_id', 'classes_id')->withPivot('status');
    }
}
