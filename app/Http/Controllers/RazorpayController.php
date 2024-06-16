<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WalletHistory;
use Exception;
use Illuminate\Http\Request;
use Log;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function handlePayment(Request $request)
    {
        // request validate
        $request->validate([
            'razorpay_payment_id' => 'required',
            'razorpay_order_id' => 'required',
            'razorpay_signature' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);
        $input = $request->all();

        $api = new Api('rzp_test_S6OswYOR9CkFfd', 'ZVkOUAMWxgccNBs8FMUYmqXk');
        $payment = $api->payment->fetch($input['razorpay_payment_id']);
        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->order->fetch($input['razorpay_order_id'])->payments();
                $response = $response->items[0]->toArray();
                WalletHistory::create([
                    'user_id' => $input['user_id'],
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
                $user = User::find($input['user_id']);
                // if a user's balance is null, then set 0
                if ($user->balance == null) {
                    $user->balance = 0;
                }
                $user->balance += $response['amount'] / 100;
                $user->save();
                return response()->json(['status' => 'success', 'message' => 'Payment has been successfully completed.']);
            } catch (Exception $e) {
                return response()->json(['message' => $e->getMessage(), 'status' => 'error']);
            }
        }
    }
    public function createPaymentOrder(Request $request)
    {
        // validation
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'currency' => 'required'
        ]);
        $api = new Api('rzp_test_S6OswYOR9CkFfd', 'ZVkOUAMWxgccNBs8FMUYmqXk');
        // Generate receipt
        $receipt = 'receipt' . rand(1000, 9999);
        $order = $api->order->create([
            'receipt' => $receipt,
            'amount' => $request->amount,
            'currency' => $request->currency,
            'payment_capture' => 1
        ]);
        return response()->json($order->toArray());
    }
}
