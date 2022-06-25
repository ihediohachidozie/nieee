<?php

namespace App\Http\Livewire;

use App\Models\MembershipType;
use Livewire\Component;

class Profile extends Component
{
    public $firstName, $lastName, $memberid, $email, $about, $group;


    public function userInfo()
    {
        $this->firstName = auth()->user()->firstName;
        $this->lastName = auth()->user()->lastName;
        $this->memberid = auth()->user()->memberid;
        $this->email = auth()->user()->email;
        $this->about = auth()->user()->about;
        $gp = MembershipType::where('group', auth()->user()->membershipgroup)->get('name');
        $this->group = $gp[0]['name'];
    }
    public function render()
    {
        $this->userInfo();

        return view('livewire.profile');
    }
}
