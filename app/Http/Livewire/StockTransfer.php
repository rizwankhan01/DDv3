<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\stocks;
use App\User;

class StockTransfer extends Component
{
    public $stockId;

    public function addStock($id)
    {
      $this->stockId = $id;
    }

    public function closeModal()
    {
      $this->stockId = '';
    }

      public function render()
    {
        if(!empty($this->stockId)){
          $modal = stocks::find($this->stockId);
        }else{
          $modal = '';
        }
          $stocks = stocks::all();
          $store_names  =  user::select('store_name')->whereNotNull('store_name')->groupby('store_name')->get();
        return view('livewire.stock-transfer', compact('stocks','modal','store_names'));
    }
}
