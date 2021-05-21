<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\User;

class AllUseraccounts extends Component
{
    use WithPagination;
    public $searchTerm;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.all-useraccounts',[
          'users' => user::where('name','like',$searchTerm)
                        ->orWhere('primary_phone','like',$searchTerm)->paginate(10)
        ]);
    }
}
