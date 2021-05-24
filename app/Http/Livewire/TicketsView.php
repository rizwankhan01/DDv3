<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\tickets;
use App\Models\dealers;
use App\User;

class TicketsView extends Component
{
    public $ticket;

    public function openSlider($id)
    {
      $this->ticket = $id;
    }

    public function emptyExpandTickets()
    {
      $this->ticket = '';
    }

    public function render()
    {
      if(!empty($this->ticket)){
        $expandTicket = tickets::find($this->ticket);
      }else{
        $expandTicket = '';
      }
        $tickets = tickets::all();
        $smen   = user::where('user_type','Service Man')->get();
        $dealers = dealers::all();

      return view('livewire.tickets-view', compact('expandTicket','tickets','smen','dealers'));
    }
}
