<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Searchable\Search;

use App\Models\colors;
use App\Models\models;
use App\Models\brands;
use App\Models\pricings;
use DB;

class SearchAllColors extends Component
{
    use WithPagination;
    public $searchTerm;

    public function render()
    {
        if(!empty($this->searchTerm)){
          $term = '%'.$this->searchTerm.'%';
          $colors = DB::select("SELECT * FROM colors WHERE name like '$term'
                                    OR model_id in (SELECT id FROM models WHERE name like '$term'
                                    OR series like '$term'
                                    OR brand_id in (SELECT id FROM brands WHERE name like '$term'))");
          $searchResults = colors::hydrate($colors);
          $search = 1;
        }else{
          $searchResults = colors::paginate(10);
          $search = 0;
        }

        return view('livewire.search-all-colors',[
          'colors' => $searchResults, 'search' => $search
        ]);
    }
}
