<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * get payment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function payment(){
        $data = array(
            "name" => Auth::user() -> first_name.' '.Auth::user() -> last_name,
            "description" => "1 x ghg, 1 x DEWALT DCF899N-XJ Vridmomentskiftnyckel, 18V, Gul",
            "pricing_type" => "fixed_price",
            "local_price" => array(
                "amount" => "0.01175",
                "currency" => "ETH"
            ),
            "metadata" => array(
                "user_id" => Auth::user()->id,
                "email"    => Auth::user()->email,
            ),
            "redirect_url" => route('home'),
            "cancel_url" => route('home')
        );

        $post = json_encode( $data );
        $api_key = 'e6704d3a-9a8f-4a49-8710-f1c6d3ac8c47';

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.commerce.coinbase.com/charges/');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $headers = array();
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'X-Cc-Api-Key: ' . $api_key;
        $headers[] = 'X-Cc-Version: 2018-03-22';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $result_de = json_decode( $result );

        $re_url = $result_de->data->hosted_url;
        return redirect()->intended($re_url);
    }

    /**
     * for get payment data after success or failed
     */
    public function handle_webhook() {
        $payload    = file_get_contents( 'php://input' );
        $data       = json_decode( $payload, true );
        $event_data = $data['event']['data'];

        if ( ! isset( $event_data['metadata']['user_id'] ) ) {
            // Probably a charge not created by us.
            exit;
        }

        if ( 'charge:confirmed' == $data['event']['type'] ) {
            $user_id = $event_data['metadata']['user_id'];
            $user = User::find( $user_id );
            $user->payment_status = 1;
            $user->save();
        }

        exit;  // 200 response for acknowledgement.
    }

    public function verifyPayment(){
        return view('verify');
    }
}
