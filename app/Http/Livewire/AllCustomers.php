<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\customers;

class AllCustomers extends Component
{
    use WithPagination;
    public $searchTerm;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.all-customers',[
          'customers' => customers::where('name','like',$searchTerm)
                                  ->orWhere('phone_number','like',$searchTerm)
                                  ->orWhere('email','like',$searchTerm)->orderby('created_at','desc')->paginate(10)
      ]);
    }
}
