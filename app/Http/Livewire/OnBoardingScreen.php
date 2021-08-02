<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class OnBoardingScreen extends Component
{

    public function onBoardingScreen()
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->onBoarding = 0;
        $user->update();
    }

    public function render()
    {
        return view('livewire.on-boarding-screen');
    }
}
