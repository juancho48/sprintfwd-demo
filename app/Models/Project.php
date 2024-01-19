<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'project_name',
    ];
    
    /**
     * Project belongs to a team.
     */
    public function team(): BelongsToMany
    {
        return $this->belongsToMany(Project::class);
    }

    /**
     * Project has many users.
     */
    public function users(): BelongsToMany
    {
        return $this->BelongsToMany(User::class, 'project_user', 'project_id', 'user_id');
    }
}
