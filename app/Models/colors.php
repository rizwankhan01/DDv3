<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class colors extends Model implements Searchable
{
    protected $table = "colors";
    protected $fillable = [
      'id',
      'model_id',
      'name',
      'screen_color',
      'image'
    ];

    public function model(){
      return $this->belongsTo(models::class);
    }

    public function pricings(){
      return $this->hasOne(pricings::class,'color_id','id');
    }

    public function getSearchResult(): SearchResult
    {
        $url = route('colors.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
         );
    }
}
