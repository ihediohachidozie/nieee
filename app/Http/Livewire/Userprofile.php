<?php

namespace App\Http\Livewire;

use App\Models\Chapter;
use App\Models\Profile;
use Livewire\Component;
use App\Models\Specialty;
use App\Models\Subspecialty;
use App\Models\MembershipType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class Userprofile extends Component
{
    public $firstName, $lastName, $memberid, $email, $about, $group, $chapter_id, $specialty_id, $subspecialty_id, $state, $lga;
    public $phone, $address, $kphone, $kaddress, $kfirstName, $klastName, $relationship;
    public $message, $profileid;
    public $current_password, $password, $password_confirmation;



    public function Mount()
    {
        $this->userInfo();
        $this->userProfile();
    }
    public function chapter()
    {
        return Chapter::all();
    }

    public function relationships()
    {
        return [
            1 => 'Spouse',
            2 => 'Sibling',
            3 => 'Son',
            4 => 'Daughter',
        ];
    }

    public function states()
    {
        return [
            1 => "Abia",
            2 => "Adamawa",
            3 => "Akwa Ibom",
            4 => "Anambra",
            5 => "Bauchi",
            6 => "Bayelsa",
            7 => "Benue",
            8 => "Borno",
            9 => "Cross River",
            10 => "Delta",
            11 => "Ebonyi",
            12 => "Edo",
            13 => "Ekiti",
            14 => "Enugu",
            15 => "Gombe",
            16 => "Imo",
            17 => "Jigawa",
            18 => "Kaduna",
            19 => "Kano",
            20 => "Katsina",
            21 => "Kebbi",
            22 => "Kogi",
            23 => "Kwara",
            24 => "Lagos",
            25 => "Nasarawa",
            26 => "Niger",
            27 => "Ogun",
            28 => "Ondo",
            29 => "Osun",
            30 => "Oyo",
            31 => "Plateau",
            32 => "Rivers",
            33 => "Sokoto",
            34 => "Taraba",
            35 => "Yobe",
            36 => "Zamfara",
            37 => "FCT"
        ];
    }

    public function specialty()
    {
        return Specialty::all();
    }

    public function subspecialty()
    {
        return Subspecialty::all();
    }

    public function changeEvent($value)
    {
        $this->subspecialties = Subspecialty::where('specialty_id', $value)->get();
    }

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

    public function userProfile()
    {
        $userP = Profile::where('user_id', auth()->id())->get();
        $this->chapter_id = $userP[0]['chapter_id'];
        $this->specialty_id = $userP[0]['specialty_id'];
        $this->subspecialty_id = $userP[0]['subspecialty_id'];
        $this->profileid = $userP[0]['id'];
        $this->phone = $userP[0]['phone'];
        $this->address = $userP[0]['address'];
        $this->state = $userP[0]['state'];
        $this->lga = $userP[0]['lga'];
        $this->kaddress = $userP[0]['kaddress'];
        $this->relationship = $userP[0]['relationship'];
        $this->kphone = $userP[0]['kphone'];

        $name = $userP[0]['nextofkin'];
        $pos = strpos($name, " ");
        $this->kfirstName = substr($name, 0, $pos);
        $this->klastName = substr($name, $pos + 1);
    }


    /**
     * update UserInfo function
     *
     * @return void
     */
    public function updateUserInfo()
    {
        //dd('i am here');
        Auth::user()->update([
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'about' => $this->about
        ]);
        return $this->message = 'User Information updated...';
    }

    /**
     * update Contact function
     *
     * @return void
     */
    public function updateContact()
    {
        Profile::find($this->profileid)->update([
            'chapter_id' => $this->chapter_id,
            'specialty_id' => $this->specialty_id,
            'subspecialty_id' => $this->subspecialty_id,
            'address' => $this->address,
            'phone' => $this->phone,
            'state' => $this->state,
            'lga' => $this->lga,
            ''

        ]);
    }

    /**
     * update Next of kin function
     *
     * @return void
     */
    public function updateNextkin()
    {
        Profile::find($this->profileid)->update([
            'kaddress' => $this->kaddress,
            'relationship' => $this->relationship,
            'kphone' => $this->kphone,
            'nextofkin' => $this->kfirstName . ' ' . $this->klastName,

        ]);
    }

    protected $rules = [
        'current_password' => ['required', 'string'],
        //'password' => $this->passwordRules(),
        'password' => ['required', 'string','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 'confirmed']
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    /**
     * change Password function
     *
     * @return void
     */
    public function changePassword()
    {
        $this->validate();

        if (! isset($this->current_password) || ! Hash::check($this->current_password, auth()->user()->password)) {
            session()->flash('msg', 'The provided password does not match your current password.');
            
        }

        Auth::user()->update([
            'password' => Hash::make($this->password),
        ]);
        
        $this->current_password = $this->password = $this->password_confirmation = '';
    }

    /**
     * render function
     *
     * @return void
     */
    public function render()
    {

        return view('livewire.userprofile', [
            'chapters' => $this->chapter(),
            'specialties' => $this->specialty(),
            'subspecialties' => $this->subspecialty(),
            'relationships' => $this->relationships(),
            'states' => $this->states()
        ]);
    }
}
