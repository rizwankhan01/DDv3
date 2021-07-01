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
        if(empty($this->searchTerm)){
          $search = 0;
          $users = user::paginate(10);
        }else{
          $searchTerm = '%'.$this->searchTerm.'%';
          $search = 1;
          $users = user::where('name','like',$searchTerm)
                        ->orWhere('primary_phone','like',$searchTerm)->paginate(10);
        }
        return view('livewire.all-useraccounts',compact('search','users'));
    }
}
