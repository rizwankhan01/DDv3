<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class brands extends Model implements Searchable
{
    protected $table = "brands";
    protected $fillable = [
      'name',
      'brand_logo',
      'description',
      'meta_title',
      'meta_description',
    ];

    public function getSearchResult(): SearchResult
    {
        $url = route('brands.show', $this->id);

        return new SearchResult(
            $this,
            $this->name,
            $url
         );
    }
}
