<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\orders;
use DB;

class ClosedOrders extends Component
{
    use WithPagination;
    public $searchTerm;

    public function render()
    {
      if(!empty($this->searchTerm)){
        $term = '%'.$this->searchTerm.'%';
        //$orders = orders::where('slot_time',$term)->paginate(1);
        $query  = DB::select("SELECT * FROM orders WHERE status='3'
          AND id in (SELECT order_id FROM order_lists
            WHERE color_id in (SELECT id FROM colors WHERE
              model_id in (SELECT id FROM models WHERE series LIKE '$term'
                          || name LIKE '$term')
            OR model_id IN (SELECT id FROM models WHERE brand_id in
                            (SELECT id FROM brands WHERE name LIKE '$term'))))");
        $orders = orders::hydrate($query);
        $search = 1;
      }else{
        $orders = orders::where('status',3)
                        ->orderBy('id','desc')
                        ->paginate(1);
        $search = 0;
      }
        return view('livewire.closed-orders', compact('orders','search'));
    }
}
