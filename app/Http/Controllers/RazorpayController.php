<?php

namespace App\Http\Controllers;

use App\Models\WalletHistory;
use Exception;
use Illuminate\Http\Request;
use Log;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function handlePayment(Request $request)
    {
        $input = $request->all();

        $api = new Api(env('RAZORPAY_API_KEY'), env('RAZORPAY_API_SECRET'));
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture([
                    'amount' => $payment['amount']
                ]);
                WalletHistory::create([
                    'user_id' => auth()->user()->id,
                    'type' => 'credit',
                    'transaction_id' => $response['id'],
                    'amount' => $response['amount'] / 100,
                    'status' => $response['status'],
                    'json_response' => json_encode((array)$response),
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' => $response['email'],
                    'contact' => $response['contact'],
                    'fee' => $response['fee'],
                    'tax' => $response['tax'],
                ]);
                // add this amount to user wallet
                $user = auth()->user();
                $user->balance += $response['amount'] / 100;
                $user->saveOrFail(); 
                return back()->withSuccess('Payment done.');
            } catch (Exception $e) {
                Log::info($e->getMessage());
                return back()->withError($e->getMessage());
            }
        }
    }
}
