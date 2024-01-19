<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'team_name',
    ];
    
    /**
     * The team belongs many projects.
     */
    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }

     /**
     * Team belongs to many users.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'team_user', 'team_id', 'user_id');
    }
}
