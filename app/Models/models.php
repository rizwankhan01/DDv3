<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class models extends Model implements Searchable
{
    protected $table  = "models";
    protected $fillable = [
      'brand_id',
      'series',
      'name',
      'description',
      'meta_title',
      'meta_description',
      'image',
      'additional_image'
    ];

    public function brand(){
      return $this->belongsTo(brands::class);
    }

    public function resource(){
      return $this->hasOne(model_resources::class,'model_id');
    }

    public function colortypes(){
      return $this->hasMany(colors::class,'model_id');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('models.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $this->series,
            $url
         );
    }

}
