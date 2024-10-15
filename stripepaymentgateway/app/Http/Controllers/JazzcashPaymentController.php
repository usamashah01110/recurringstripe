<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JazzcashPaymentController extends Controller
{
    public function initiatePayment()
    {
        $data = [
            'pp_Version' => '1.1',
            'pp_TxnType' => 'MWALLET',
            'pp_Language' => 'EN',
            'pp_MerchantID' => env('JAZZCASH_MERCHANT_ID'),
            'pp_SubMerchantID' => '',
            'pp_Password' => env('JAZZCASH_PASSWORD'),
            'pp_TxnRefNo' => 'T' . time(),
            'pp_Amount' => 20 * 100, // Amount in paisa (multiply by 100)
            'pp_TxnCurrency' => 'PKR',
            'pp_TxnDateTime' => now()->format('YmdHis'), // Correct format for transaction datetime
            'pp_BillReference' => 'billRef123',
            'pp_Description' => 'Test Payment',
            'pp_ReturnURL' => env('JAZZCASH_RETURN_URL'),
            'pp_SecureHash' => '', // Placeholder, we will generate this below
        ];

        // Generate the secure hash
        $data['pp_SecureHash'] = $this->generateSecureHash($data);

        // Log request data and secure hash string
        Log::info('JazzCash Request Data: ', $data);
        Log::info('JazzCash Request Secure Hash String: ' . $this->getSecureHashString($data));

        return view('payment.jazzcash_redirect', compact('data'));
    }

    public function paymentResponse(Request $request)
    {
        Log::info('JazzCash Response: ', $request->all());

        $response = $request->all();

        // Log the response hash string for debugging
        Log::info('JazzCash Response Secure Hash String: ' . $this->getSecureHashString($response));

        // Verify secure hash and process response
        if ($this->verifySecureHash($response)) {
            if ($response['pp_ResponseCode'] == '000') {
                Log::info('Payment successful: ', $response);
                return 'Payment was successful.';
            } else {
                Log::error('Payment failed with response code: ' . $response['pp_ResponseCode'], $response);
                return 'Payment failed with error code: ' . $response['pp_ResponseCode'];
            }
        }

        Log::error('Secure hash verification failed.', $response);
        return 'Payment failed due to secure hash mismatch.';
    }

    private function generateSecureHash($data)
    {
        $integritySalt = env('JAZZCASH_INTEGRITY_SALT');
        $hashString = $this->getSecureHashString($data);

        // Log the generated hash string for debugging
        Log::info('Generated Hash String for Request: ' . $hashString);

        // Generate the HMAC SHA-256 hash
        return hash_hmac('sha256', $hashString, $integritySalt);
    }

    private function verifySecureHash($response)
    {
        $integritySalt = env('JAZZCASH_INTEGRITY_SALT');
        $secureHash = $response['pp_SecureHash'];
        unset($response['pp_SecureHash']); // Remove the secure hash field for verification

        $hashString = $this->getSecureHashString($response);

        // Log the hash string used for verification
        Log::info('Generated Hash String for Response Verification: ' . $hashString);

        // Verify the secure hash
        return hash_hmac('sha256', $hashString, $integritySalt) === $secureHash;
    }

    // Utility function to generate the string for hash generation
    private function getSecureHashString($data)
    {
        ksort($data); // Sort the array by keys

        $hashString = '';
        foreach ($data as $key => $value) {
            if (!empty($value)) {
                $hashString .= trim($value) . '&';
            }
        }

        return rtrim($hashString, '&'); // Remove the last & character
    }

}
