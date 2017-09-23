<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Payment;
use App\Orders;
use App\Order_details;
use DB;
use Pesapal;
use Gloudemans\Shoppingcart\Facades\Cart;

class PaymentsController extends Controller
{
   
    // generate a random string of a particular length
    public function payment(){
        //initiates payment
        $cartItems = Cart::content();
        //$total_price = DB::table('orders')->where('user_id',Auth::guard('web')->id())->value('total_price');
        //$orders  = Orders::all();

        //Generate random string
        $string = "";
        for ($i = 0; $i <= (10/32); $i++)
        $string .= md5(time() + rand(0, 99));
        $max_start_index = (32*$i)-10;
        $random_string = substr($string, rand(0, $max_start_index), 10);


        //end
        $unique_id = $random_string;
        $transaction = Pesapal::random_reference();

       
        foreach($cartItems as $cartItem){
            $orders = new Orders;
            $orders ->transaction_id = $transaction;
            $orders ->total_price =Cart::subtotal();
            $orders ->tax =Cart::tax();
            $orders->status = 2;
            $orders->unique_order_id = strtoupper($unique_id);
            $orders->total_quantity = $cartItem->qty;
            $orders->price = $cartItem->subtotal();
            $orders->seller_id = $cartItem->options->seller_id;
            $orders->product_id = $cartItem->id;
            $orders ->user_id = Auth::user()->id;
            //$orders->unique_order_id = md5(time().mt_rand(1,5));
            $orders -> save();

            $order_details = new Order_details;
            $order_details ->user_id = Auth::user()->id;
            $order_details->unique_order_id = $orders->unique_order_id;
            $order_details->product_id = $orders->product_id;
            $order_details ->seller_id = $orders->seller_id ;
            $order_details-> save();
           
        }
             

        

        $details = array(
        'amount' =>Cart::total(),
        'description' => 'Test Transaction',
         'type' => 'MERCHANT',
         'first_name' => 'joseph',
            'last_name' => 'shiyuli',
          'email' => 'jose@gmail.com',
            'phonenumber' => '0702092083',
           'reference' => $transaction,
           'height'=>'400px',
            'currency' => 'KES'
       );
       $iframe=Pesapal::makePayment($details);
       $cartItems = Cart::content();
       return view('front.checkout.checkout-payment', compact('iframe','orders','cartItems'));
    }
    public function paymentsuccess(Request $request)//just tells u payment has gone thru..but not confirmed
    {
        $trackingid = $request->input('tracking_id');
        $ref = $request->input('merchant_reference');

        $payments = Payment::where('transactionid',$ref)->first();
        $payments -> trackingid = $trackingid;
        $payments -> status = 'PENDING';
        $payments -> save();
        //go back home
        $payments=Payment::all();
        return view('payments.business.home', compact('payments'));
    }
    //This method just tells u that there is a change in pesapal for your transaction..
    //u need to now query status..retrieve the change...CANCELLED? CONFIRMED?
    public function paymentconfirmation(Request $request)
    {
        $trackingid = $request->input('pesapal_transaction_tracking_id');
        $merchant_reference = $request->input('pesapal_merchant_reference');
        $pesapal_notification_type= $request->input('pesapal_notification_type');

        //use the above to retrieve payment status now..
        $this->checkpaymentstatus($trackingid,$merchant_reference,$pesapal_notification_type);
    }
    //Confirm status of transaction and update the DB
    public function checkpaymentstatus($trackingid,$merchant_reference,$pesapal_notification_type){
        $status=Pesapal::getMerchantStatus($merchant_reference);
        $payments = Payment::where('trackingid',$trackingid)->first();
        $payments -> status = $status;
        $payments -> payment_method = "PESAPAL";//use the actual method though...
        $payments -> save();
        return "success";
    }
}