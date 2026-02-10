<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $table = 'tag';
    protected $fillable = ['tag_name'];

    public function communities(): BelongsToMany
    {
        return $this->belongsToMany(
            Community::class,
            'community_tag',
            'tag_id',
            'community_id'
        );
    }
}
