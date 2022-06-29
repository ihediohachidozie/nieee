<?php

namespace App\Http\Livewire;

use App\Models\Account;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\MembershipType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;

class Annualpayment extends Component
{
   // public $purpose = ['Membership Registration', 'Annual Fee'];

    public function getUser()
    {

       return MembershipType::where('group', auth()->user()->membershipgroup)->where('type', 'Old')->get();
    }

    public function annual()
    {

        try {

            $msg = '';

            $ref = Str::random();

            // url to go to after payment
          //  $callback_url = route('annual');

            $url = "https://api.paystack.co/transaction/initialize";
            $fields = [
                'email' => auth()->user()->email,
                'amount' => $this->getUser()[0]['cost']*100,
                'reference' => $ref,
                'callback_url' => route('annual'),
                 'metadata' => [
                    //'membershipgroup' => $this->membership_group,
                 //   'userid' => auth()->id(),
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


            
            return Redirect::to($link->data->authorization_url);

            
        } catch (\Exception $e) {
            return Redirect::back()->withErrors(['msg' => 'The paystack token has expired. Please refresh the page and try again.', 'type' => 'error']);
        }
    }

    public function handleGatewayAnnual()
    {
    
        try {
            $paymentDetails = Paystack::getPaymentData();

           // dd($paymentDetails);

            // store on accounts table
          
    
            $paymentStatus = $paymentDetails['data']['status'];
           // json_decode($paymentStatus)
    
            if ($paymentStatus == 'success') {

               
                Account::create([
                    'amount' => $paymentDetails['data']['amount']/100,
                    'reference' => $paymentDetails['data']['reference'],
                    'user_id' => auth()->id(),
                    'purpose' => 2,
                ]);

    
               // $resp = 'Vehicle Booking completed. Thank you for your patronge!';
            } else {
    
 
    
               // $resp = 'Vehicle Booking failed. Please try again!';
            }
        } catch (\Throwable $th) {
            throw $th;
           // $resp = 'Vehicle Booking completed. Thank you for your patronge!';
       }

       
        return redirect()->route('dashboard');
    }

    public function render()
    {

        return view('livewire.annualpayment',[
            'cost' => $this->getUser()[0]['cost'],
            'name' => $this->getUser()[0]['name'],
            'data' => auth()->user()->accounts,

        ]);
    }
}
