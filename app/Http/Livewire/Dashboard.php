<?php

namespace App\Http\Livewire;

use App\Models\Account;
use App\Models\Chapter;
use Livewire\Component;
use App\Models\Specialty;
use Illuminate\Support\Str;
use App\Models\Subspecialty;
use App\Models\MembershipType;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class Dashboard extends Component
{

    public $membershiptype_id, $membership_group, $chapter_id, $specialty_id, $subspecialty_id, $about;
    public $subspecialties = [];

    public $isDisabled = 'cursor-not-allowed';
    public $ck = true;

    

    protected $rules = [
        'membershiptype_id' => 'required',
        'chapter_id' => 'required',
        'specialty_id' => 'required',
        'subspecialty_id' => 'required',
        'about' => 'required',
    ];

    /**
     * get subspecialties on specialty change
     *
     * @return response()
     */
    public function changeEvent($value)
    {
        $this->subspecialties = Subspecialty::where('specialty_id', $value)->get();
    }
    

    public function checkEvent($value)
    {
       // dd($value);
  
       // $this->ck == $value ? $this->isDisabled = '' : $this->isDisabled = 'cursor-not-allowed';
    }
    public function pay()
    {
        # code...
        $this->validate();

        try {

            $msg = '';


            $member = MembershipType::where('id', $this->membershiptype_id)->get();
            $membership_cost = $member[0]['cost'].'00';
            $this->membership_group = $member[0]['group'];


            $ref = Str::random();

            // url to go to after payment
            $callback_url = route('callback');

            $url = "https://api.paystack.co/transaction/initialize";
            $fields = [
                'email' => auth()->user()->email,
                'amount' => $membership_cost,
                'reference' => $ref,
                'callback_url' => $callback_url,
                 'metadata' => [
                    'membershipgroup' => $this->membership_group,
                    'about' => $this->about,
                    'chapter_id' => $this->chapter_id,
                    'specialty_id' => $this->specialty_id,
                    'subspecialty_id' => $this->subspecialty_id,
                  ]

            ];
            $fields_string = http_build_query($fields);
            //open connection
            $ch = curl_init();

            //set the url, number of POST vars, POST data
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Authorization: Bearer sk_test_b7e22212038805c27591c521ec343cca9eeb10f3",
                "Cache-Control: no-cache",
            ));

            //So that curl_exec returns the contents of the cURL; rather than echoing it
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            //execute post
            $result = curl_exec($ch);
            $link = json_decode($result);


            // store transaction


           /*  $trans = Transaction::create([
                'amount' => $amount,
                'firstname' => $request->firstName,
                'lastname' => $request->lastName,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
                'reference' => $ref,
                'status' => 'pending',
                'month' => date('M'),
                'month_id' => date('m')
            ]); */


            // store booking

            //dd($this->membershiptype_id);
            // paystack payment process
            return Redirect::to($link->data->authorization_url);

            
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
        
    }

    public function handleGatewayCallback()
    {
        $msg = $resp = '';

        $user = Auth::user();
       // dd($user);

        try {
            $paymentDetails = Paystack::getPaymentData();

           // dd($paymentDetails);

           // $this->membership_group = $paymentDetails['data']['metadata']['membershipgroup'];

           // $paymentRef = ($paymentDetails['data']['reference']);
    
            $paymentStatus = $paymentDetails['data']['status'];
           // json_decode($paymentStatus)
    
            if ($paymentStatus == 'success') {

                $user->membershipgroup = $paymentDetails['data']['metadata']['membershipgroup'];
                $user->status = true;
                $user->about = $paymentDetails['data']['metadata']['about'];

               // dd($this->membershiptype_id);

                $user->save();

                Account::create([
                    'amount' => $paymentDetails['data']['amount']/100,
                    'reference' => $paymentDetails['data']['reference'],
                    'user_id' => auth()->id(),
                    'purpose' => 1,
                ]);

                Profile::create([
                    'chapter_id' => $paymentDetails['data']['metadata']['chapter_id'],
                    'specialty_id' => $paymentDetails['data']['metadata']['specialty_id'],
                    'user_id' => auth()->id(),
                    'subspecialty_id' => $paymentDetails['data']['metadata']['subspecialty_id'],
                ]);

    

    
                $resp = 'Vehicle Booking completed. Thank you for your patronge!';
            } else {
    
 
    
                $resp = 'Vehicle Booking failed. Please try again!';
            }
        } catch (\Throwable $th) {
            throw $th;
            $resp = 'Vehicle Booking completed. Thank you for your patronge!';
        }

       
        return redirect('/dashboard')->withErrors([$msg => $resp]);;
    }

    /**
     * the render function
     *
     * @return void
     */
    public function render()
    {
        if (auth()->user()->membershipgroup == null) {
            return view('livewire.userpayment', [
                'specialties' => Specialty::all(),
                'chapters' => Chapter::all(),
                'subspecialties' => Subspecialty::where('specialty_id', 1)->get(),
                'membershiptypes' => MembershipType::where('type', 'New')->get()
            ]);
        }
    
        return view('livewire.dashboard');
    }
}
