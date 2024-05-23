<?php

namespace App\Models;

use App\Models\User;
use App\Models\Option;
use App\Models\OptionResult;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'score',
    ];

   
    
     public function options()
    {
        return $this->belongsToMany(Option::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


   
    /**
     * Summary of optionResult
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
//     public function optionResult()
// {
//     return $this->hasMany(OptionResult::class);
// }
// public function resultOptions()
//     {
//         return $this->hasMany(ResultOption::class);
//     }
    
// public function options()
//     {
//         return $this->belongsToMany(Option::class, 'option_result', 'result_id', 'option_id')->withTimestamps();
//     }
    
}
