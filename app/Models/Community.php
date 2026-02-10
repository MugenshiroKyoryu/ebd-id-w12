<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Community extends Model
{
    protected $table = "community";
    protected $fillable = ["name","location","district","province"];
    public function tags() : BelongstoMany
    {
        return $this->belongsToMany(Tag::class,'community_tag','community_id','tag_id');
    }


}
