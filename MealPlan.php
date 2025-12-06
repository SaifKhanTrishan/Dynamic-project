<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'recipe_id', 'date', 'servings'];
    
    // IMPORTANT: Cast date column to Carbon date object
    protected $casts = [
        'date' => 'date', // Converts string to Carbon date for formatting
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
?>