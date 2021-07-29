<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\stocks;
use App\User;

class StoreStock extends Component
{
    public $stockId;
    public $app;
    public $ret;

    public function approveStock($id)
    {
      $this->stockId = $id;
      $this->app = 1;

    }

    public function returnStock($id)
    {
      $this->stockId = $id;
      $this->ret = 1;
    }

    public function closeModal()
    {
      $this->stockId = '';
    }

    public function render()
    {
        if(!empty($this->stockId)){
          if($this->app==1){
            $return = '';
            $approve = stocks::find($this->stockId);
          }else if($this->ret==1){
            $return = stocks::find($this->stockId);
            $approve = '';
          }
        }else{
          $return = ''; $approve = '';
        }
        $stocks = stocks::where('store_name',auth()->user()->store_name)->get();
        return view('livewire.store-stock', compact('stocks','return','approve'));
    }
}
