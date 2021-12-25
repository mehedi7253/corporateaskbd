<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Library\SslCommerz\SslCommerzNotification;

class SslCommerzPaymentController extends Controller
{

    public function exampleEasyCheckout()
    {
        return view('payment.index');
    }

    public function exampleHostedCheckout()
    {
        return view('pages.services.orders');
    }

    public function index(Request $request)
    {
        if (Auth::user() == true){
            $post_data = array();
            $post_data['total_amount'] = $request->amount; # You cant not pay less than 10
            $post_data['currency'] = "BDT";
            $post_data['invoice_number'] = $request->invoice_number;
            $post_data['tran_id'] = "C.ASK_".''.uniqid(); // tran_id must be unique
            $delivery = $post_data['delivery'] = $request->delivery;
            if ($delivery == ''){
                $post_data['delivery'] = 'Regular';
            }else{
                $post_data['delivery'] = 'Urgent';
            }
            # CUSTOMER INFORMATION
            $post_data['cus_name'] =  Auth::user()->first_name.' '.Auth::user()->last_name;
            $post_data['cus_email'] =  Auth::user()->email;
            $post_data['cus_add1'] =  Auth::user()->address;
            $post_data['cus_add2'] = "";
            $post_data['cus_city'] = "";
            $post_data['cus_state'] = "";
            $post_data['cus_postcode'] = "";
            $post_data['cus_country'] = "Bangladesh";
            $post_data['cus_phone'] =  Auth::user()->phone;
            $post_data['cus_fax'] = "";

            # SHIPMENT INFORMATION
            $post_data['ship_name'] = "Store Test";
            $post_data['ship_add1'] = "Dhaka";
            $post_data['ship_add2'] = "Dhaka";
            $post_data['ship_city'] = "Dhaka";
            $post_data['ship_state'] = "Dhaka";
            $post_data['ship_postcode'] = "1000";
            $post_data['ship_phone'] = "";
            $post_data['ship_country'] = "Bangladesh";

            $post_data['shipping_method'] = "NO";
            $post_data['product_name'] = "Computer";
            $post_data['product_category'] = "Goods";
            $post_data['product_profile'] = "physical-goods";

            # OPTIONAL PARAMETERS
            $post_data['value_a'] = "ref001";
            $post_data['value_b'] = "ref002";
            $post_data['value_c'] = "ref003";
            $post_data['value_d'] = "ref004";

            $order_date = @date('Y-m-d');
            #Before  going to initiate the payment order status need to insert or update as Pending.
            $update_product = DB::table('orders')
                ->where('transaction_id', $post_data['tran_id'])
                ->updateOrInsert([
                    'name' => $post_data['cus_name'],
                    'email' => $post_data['cus_email'],
                    'phone' => $post_data['cus_phone'],
                    'amount' => $post_data['total_amount'],
                    'status' => 'Pending',
                    'address' => $post_data['cus_add1'],
                    'transaction_id' => $post_data['tran_id'],
                    'currency' => $post_data['currency'],
                    'invoice_number' => $post_data['invoice_number'],
                    'process_status' => '0',
                    'created_at'     => $order_date,
                    'delivery' => $post_data['delivery']
                ]);

            $sslc = new SslCommerzNotification();
            # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
            $payment_options = $sslc->makePayment($post_data, 'hosted');

            if (!is_array($payment_options)) {
                print_r($payment_options);
                $payment_options = array();
            }
        } else{
            $this->validate($request,[
                'customer_name' => 'required  | regex:/^[a-zA-Z-.\s]+$/',
                'customer_email' => 'required',
                'customer_mobile' => 'required |min:11|max:11 | regex:/^[-0-9\+]+$/',
            ],[
                'customer_name.required'   => 'Please Enter your Full Name',
                'customer_name.regex'      => 'Name Should Be In Character Value',
                'customer_email.required'  => 'Please Enter Email Address',
                'customer_mobile.required' => 'Please Enter your Mobile Number',
                'customer_mobile.min'      => 'Phone Number Must Be 11 Digit',
                'customer_mobile.max'      => 'Phone Number Must Be 11 Digit',
                'customer_mobile.regex'    => 'Phone Number Must Be 11 Digit Long With Numeric Value',
            ]);

            $post_data = array();
            $post_data['total_amount'] = $request->amount; # You cant not pay less than 10
            $post_data['currency'] = "BDT";
            $post_data['tran_id'] = "C.ASK_".''.uniqid(); // tran_id must be unique
            $post_data['type']  = 'Manual Payment';

            $invoice = $post_data['invoice_number'] = $request->invoice_number;
            if ($invoice == ''){
                $post_data['invoice_number'] = ' ';
            }else{
                $post_data['invoice_number'] = $request->invoice_number;
            }
            $delivery = $post_data['delivery'] = $request->delivery;
            if ($delivery == ''){
                $post_data['delivery'] = 'Regular';
            }else{
                $post_data['delivery'] = 'Urgent';
            }
            # CUSTOMER INFORMATION
            $post_data['cus_name'] =  $request->customer_name;
            $post_data['cus_email'] =  $request->customer_email;
            $post_data['cus_add1'] =  'dhaka';
            $post_data['cus_add2'] = "";
            $post_data['cus_city'] = "";
            $post_data['cus_state'] = "";
            $post_data['cus_postcode'] = "";
            $post_data['cus_country'] = "Bangladesh";
            $post_data['cus_phone'] =  $request->customer_mobile;
            $post_data['cus_fax'] = "";

            # SHIPMENT INFORMATION
            $post_data['ship_name'] = "Store Test";
            $post_data['ship_add1'] = "Dhaka";
            $post_data['ship_add2'] = "Dhaka";
            $post_data['ship_city'] = "Dhaka";
            $post_data['ship_state'] = "Dhaka";
            $post_data['ship_postcode'] = "1000";
            $post_data['ship_phone'] = "";
            $post_data['ship_country'] = "Bangladesh";

            $post_data['shipping_method'] = "NO";
            $post_data['product_name'] = "Computer";
            $post_data['product_category'] = "Goods";
            $post_data['product_profile'] = "physical-goods";

            # OPTIONAL PARAMETERS
            $post_data['value_a'] = "ref001";
            $post_data['value_b'] = "ref002";
            $post_data['value_c'] = "ref003";
            $post_data['value_d'] = "ref004";

            $order_date = @date('Y-m-d');
            #Before  going to initiate the payment order status need to insert or update as Pending.
            $update_product = DB::table('orders')
                ->where('transaction_id', $post_data['tran_id'])
                ->updateOrInsert([
                    'name' => $post_data['cus_name'],
                    'email' => $post_data['cus_email'],
                    'phone' => $post_data['cus_phone'],
                    'amount' => $post_data['total_amount'],
                    'status' => 'Pending',
                    'address' => $post_data['cus_add1'],
                    'transaction_id' => $post_data['tran_id'],
                    'currency' => $post_data['currency'],
                    'invoice_number' => $post_data['invoice_number'],
                    'process_status' => '0',
                    'created_at'     => $order_date,
                    'type' => $post_data['type'],
                    'delivery' => $post_data['delivery']
                    ]);

            $sslc = new SslCommerzNotification();
            # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
            $payment_options = $sslc->makePayment($post_data, 'hosted');

            if (!is_array($payment_options)) {
                print_r($payment_options);
                $payment_options = array();
            }
        }


    }


    public function book_pay(Request $request)
    {
        $this->validate($request,[
            'name' => 'required  | regex:/^[a-zA-Z-.\s]+$/',
            'phone' => 'required |min:11|max:11 | regex:/^[-0-9\+]+$/',
            'address' => 'required'
        ],[
            'name.required'    => 'Please Enter your Full Name',
            'name.regex'       => 'Name Should Be In Character Value',
            'phone.required'   => 'Please Enter your Mobile Number',
            'email.min'        => 'Phone Number Must Be 11 Digit',
            'email.max'        => 'Phone Number Must Be 11 Digit',
            'email.regex'      => 'Phone Number Must Be 11 Digit Long With Numeric Value',
            'address.required' => "Please Enter Your Shiping Address",
        ]);

        $post_data = array();
        $post_data['total_amount'] = $request->amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = "C.ASK_".''.uniqid(); // tran_id must be unique
        $post_data['type']  = 'Book Payment';
        $post_data['invoice_number'] = $request->invoice_number;
        $post_data['delivery'] = 'Book Delivery';
        
        # CUSTOMER INFORMATION
        $post_data['cus_name'] =  $request->name;
        $post_data['cus_email'] =  Auth::user()->email;
        $post_data['cus_add1'] = $request->address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] =  $request->phone;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        $order_date = @date('Y-m-d');
        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name' => $post_data['cus_name'],
                'email' => $post_data['cus_email'],
                'phone' => $post_data['cus_phone'],
                'amount' => $post_data['total_amount'],
                'status' => 'Pending',
                'address' => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency' => $post_data['currency'],
                'invoice_number' => $post_data['invoice_number'],
                'process_status' => '0',
                'created_at'     => $order_date,
                'type' => $post_data['type'],
                'delivery' => $post_data['delivery']
                ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }


    public function cv_pay(Request $request)
    {
        $this->validate($request,[
            'customer_name' => 'required  | regex:/^[a-zA-Z-.\s]+$/',
            'customer_email' => 'required',
            'customer_mobile' => 'required |min:11|max:11 | regex:/^[-0-9\+]+$/',
        ],[
            'customer_name.required'   => 'Please Enter your Full Name',
            'customer_name.regex'      => 'Name Should Be In Character Value',
            'customer_email.required'  => 'Please Enter Email Address',
            'customer_mobile.required' => 'Please Enter your Mobile Number',
            'customer_mobile.min'      => 'Phone Number Must Be 11 Digit',
            'customer_mobile.max'      => 'Phone Number Must Be 11 Digit',
            'customer_mobile.regex'    => 'Phone Number Must Be 11 Digit Long With Numeric Value',
        ]);

        $post_data = array();
        $post_data['total_amount'] = $request->amount; # You cant not pay less than 10
        $post_data['currency'] = "BDT";
        $post_data['tran_id'] = "C.ASK_".''.uniqid(); // tran_id must be unique
        $post_data['invoice_number'] = $request->invoice_number;
        $post_data['type']  = 'CV Checking';
        # CUSTOMER INFORMATION
        $post_data['cus_name'] =  $request->customer_name;
        $post_data['cus_email'] =  $request->customer_email;
        $post_data['cus_add1'] =  'NULL';
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "";
        $post_data['cus_state'] = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] =  $request->customer_mobile;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile'] = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        $order_date = @date('Y-m-d');
        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('orders')
            ->where('transaction_id', $post_data['tran_id'])
            ->updateOrInsert([
                'name'           => $post_data['cus_name'],
                'email'          => $post_data['cus_email'],
                'phone'          => $post_data['cus_phone'],
                'amount'         => $post_data['total_amount'],
                'status'         => 'Pending',
                'address'        => $post_data['cus_add1'],
                'transaction_id' => $post_data['tran_id'],
                'currency'       => $post_data['currency'],
                'invoice_number' => $post_data['invoice_number'],
                'process_status' => '0',
                'created_at'     => $order_date,
                'type'           => $post_data['type'],
            ]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }


    public function success(Request $request)
    {
        $tran_id      = $request->input('tran_id');
        $amount       = $request->input('amount');
        $currency     = $request->input('currency');
        $tran_date    = $request->input('tran_date');
        $card_issuer  = $request->input('card_issuer');
        $bank_tran_id = $request->input('bank_tran_id');
        $process      = $request->input('process_status');
        $type         = $request->input('type');
        $order_id     = $request->input('id');
       
       
        $sslc = new SslCommerzNotification();

        #Check order status in order tabel against the transaction id or order id.
        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount', 'type', 'name', 'id', 'invoice_number')->first();

        if ($order_detials->status == 'Pending') {

            if($order_detials->type == 'CV Checking')
            {
                $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency, $process, $order_id);

                if ($validation == TRUE) {
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing', 'process_status' => '1']);
    
                  //  echo "<br >Transaction is successfully Completed";

                  $orderID = $order_detials->id;
                  $invoice = $order_detials->invoice_number;
                    return view('pages.cv_check.success', compact('tran_date', 'tran_id','bank_tran_id','card_issuer','currency','amount', 'orderID', 'invoice'));
                } else {
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Failed']);
                    echo "validation Fail";
                }
            }else{
                $validation = $sslc->orderValidate($request->all(), $tran_id, $amount, $currency, $process);

                if ($validation == TRUE) {
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing', 'process_status' => '1']);
    
                  //  echo "<br >Transaction is successfully Completed";
                    return view('pages.orders.success', compact('tran_date', 'tran_id','bank_tran_id','card_issuer','currency','amount'));
                } else {
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Failed']);
                    echo "validation Fail";
                }
            }
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete' || $order_detials->type == 'CV Checking') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount', 'type', 'name', 'id', 'invoice_number')->first();
            $orderID = $order_detials->id;
            $invoice = $order_detials->invoice_number;
            return view('pages.cv_check.success', compact('tran_date', 'tran_id','bank_tran_id','card_issuer','currency','amount', 'orderID', 'invoice'));

            // echo "Transaction is successfully Completed";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }


    }

    public function fail(Request $request)
    {
        $tran_id = $request->input('tran_id');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Failed']);
            echo "Transaction is Falied";
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function cancel(Request $request)
    {
        $tran_id = $request->input('tran_id');
        $amount  = $request->input('amount');
        $currency = $request->input('currency');

        $order_detials = DB::table('orders')
            ->where('transaction_id', $tran_id)
            ->select('transaction_id', 'status', 'currency', 'amount')->first();

        if ($order_detials->status == 'Pending') {
            $update_product = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->update(['status' => 'Canceled']);
            $msg = "Transaction is Cancel";
            return view('pages.orders.cancel', compact('msg','tran_id','amount','currency'));
        } else if ($order_detials->status == 'Processing' || $order_detials->status == 'Complete') {
            echo "Transaction is already Successful";
        } else {
            echo "Transaction is Invalid";
        }

    }

    public function ipn(Request $request)
    {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('orders')
                ->where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'currency', 'amount')->first();

            if ($order_details->status == 'Pending') {
                $sslc = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->amount, $order_details->currency);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Processing']);

                    echo "Transaction is successfully Completed";
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                    */
                    $update_product = DB::table('orders')
                        ->where('transaction_id', $tran_id)
                        ->update(['status' => 'Failed']);

                    echo "validation Fail";
                }

            } else if ($order_details->status == 'Processing' || $order_details->status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Completed";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Invalid Data";
        }
    }

}
