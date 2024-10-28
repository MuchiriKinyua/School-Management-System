<?php

namespace App\Http\Controllers;

use App\Models\C2brequest;
use App\Models\B2bTransaction;
use App\Models\STKrequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Throwable;

class PaymentController extends Controller
{
   public function token(){
    $consumerKey = 'QAhtpLgSo7Rf9nfM6bG0K0HtrCgy07Pp8ovroNkyCuhMmtB9';
    $consumerSecret = 'd34b7XJnwRn4RMYgZEyIpwCaS0ZGYYiXGGFd7kCklHyw1ydQcobwZbWuV2EXEAqJ';
    $url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';

    $response=Http::withBasicAuth($consumerKey,$consumerSecret)->get($url);
    return $response['access_token'];
   }

   public function initiateStkPush(Request $request)
{
    $accessToken = $this->token();
    $url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
    $PassKey = '1bf235dc92b21a2921665f672c11a4bb99905589a710f819ae230d5b4f008c60';
    $BusinessShortCode = 6544046;
    $Timestamp = Carbon::now()->format('YmdHis');
    $password = base64_encode($BusinessShortCode . $PassKey . $Timestamp);
    $TransactionType = 'CustomerBuyGoodsOnline';
    $Amount = $request->input('amount');
    $PartyA = $request->input('phone');
    $PartyB = 8834744;
    $PhoneNumber = $PartyA;
    $CallBackURL = 'https://mpesa.learnsoftbeliotechsolutions.co.ke/payments/stkCallback';
    $AccountReference = 'Belio SPA';
    $TransactionDesc = 'Customer Goods Payment';

    try {
        // Send the STK push request to Safaricom API
        $response = Http::withToken($accessToken)->post($url, [
            'BusinessShortCode' => $BusinessShortCode,
            'Password' => $password,
            'Timestamp' => $Timestamp,
            'TransactionType' => $TransactionType,
            'Amount' => $Amount,
            'PartyA' => $PartyA,
            'PartyB' => $PartyB,
            'PhoneNumber' => $PhoneNumber,
            'CallBackURL' => $CallBackURL,
            'AccountReference' => $AccountReference,
            'TransactionDesc' => $TransactionDesc
        ]);

        // Decode the JSON response body
        $res = json_decode($response->body());

        // Check if ResponseCode exists before accessing it
        if (isset($res->ResponseCode) && $res->ResponseCode == 0) {
            // Success, extract details
            $MerchantRequestID = $res->MerchantRequestID;
            $CheckoutRequestID = $res->CheckoutRequestID;
            $CustomerMessage = $res->CustomerMessage;

            // Save the transaction details to the database
            $payment = new STKrequests();
            $payment->phone = $PhoneNumber;
            $payment->amount = $Amount;
            $payment->reference = $AccountReference;
            $payment->description = $TransactionDesc;
            $payment->MerchantRequestID = $MerchantRequestID;
            $payment->CheckoutRequestID = $CheckoutRequestID;
            $payment->status = 'Requested';
            $payment->save();

            return $CustomerMessage; 

        } else {
            return redirect()->back()->with('error', 'Transaction failed. Response: ' . json_encode($res));
        }

    } catch (Throwable $e) {
        return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
    }
}

public function b2b(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'sender_till' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        // Call your B2B payment initiation method here
        return $this->initiateB2BPayment($request);
    }

    public function initiateB2BPayment(Request $request)
    {
        $accessToken = $this->token();
        $url = 'https://api.safaricom.co.ke/mpesa/b2b/v1/paymentrequest';
        $PassKey = '1bf235dc92b21a2921665f672c11a4bb99905589a710f819ae230d5b4f008c60';
        $BusinessShortCode = 6544046;  // This should be the initiator shortcode
        $Timestamp = Carbon::now()->format('YmdHis');
        $password = base64_encode($BusinessShortCode . $PassKey . $Timestamp);
        $TransactionType = 'CustomerBuyGoodsOnline';
        $Amount = $request->input('amount');
        $PartyA = $BusinessShortCode;  
        
        // Use the till number from the request
        $PartyB = $request->input('till');  
        
        $CallBackURL = 'https://mpesa.learnsoftbeliotechsolutions.co.ke/payments/stkCallback';
        $AccountReference = 'Belio SPA';
        $TransactionDesc = 'Payment for goods/services';

        try {
            // Send the B2B payment request to Safaricom API
            $response = Http::withToken($accessToken)->post($url, [
                'Initiator' => $PartyA,  
                'SecurityCredential' => 'Your_Security_Credential',
                'CommandID' => 'BusinessBuyGoods',
                "SenderIdentifierType" => "4",
                "RecieverIdentifierType" => "4",
                'Amount' => $Amount,
                'PartyA' => $PartyA,
                'PartyB' => $PartyB,
                'AccountReference' => $AccountReference,
                'TransactionDesc' => $TransactionDesc,
                "Remarks" => "OK",
                'QueueTimeOutURL' => $CallBackURL,
                'ResultURL' => $CallBackURL  
            ]);
    
            // Decode the JSON response body
            $res = json_decode($response->body());
    
            // Check if ResponseCode exists before accessing it
            if (isset($res->ResponseCode) && $res->ResponseCode == 0) {
                // Handle successful response...
            } else {
                return redirect()->back()->with('error', 'Transaction failed. Response: ' . json_encode($res));
            }
    
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
    }
    
        
    public function stkCallback() {
            $data=file_get_contents('php://input');
            Storage::disk('local')->put('stk.txt',$data);
    
            $response=json_decode($data);
    
            $ResultCode=$response->Body->stkCallback->ResultCode;
    
            if($ResultCode==0){
                $MerchantRequestID=$response->Body->stkCallback->MerchantRequestID;
                $CheckoutRequestID=$response->Body->stkCallback->CheckoutRequestID;
                $ResultDesc=$response->Body->stkCallback->ResultDesc;
                $Amount=$response->Body->stkCallback->CallbackMetadata->Item[0]->Value;
                $MpesaReceiptNumber=$response->Body->stkCallback->CallbackMetadata->Item[1]->Value;
                //$Balance=$response->Body->stkCallback->CallbackMetadata->Item[2]->Value;
                $TransactionDate=$response->Body->stkCallback->CallbackMetadata->Item[3]->Value;
                $PhoneNumber=$response->Body->stkCallback->CallbackMetadata->Item[4]->Value;
    
                $payment=STKrequests::where('CheckoutRequestID',$CheckoutRequestID)->firstOrfail();
                $payment->status='Paid';
                $payment->TransactionDate=$TransactionDate;
                $payment->MpesaReceiptNumber=$MpesaReceiptNumber;
                $payment->ResultDesc=$ResultDesc;
                $payment->save();
    
            }else{
    
            $CheckoutRequestID=$response->Body->stkCallback->CheckoutRequestID;
            $ResultDesc=$response->Body->stkCallback->ResultDesc;
            $payment=STKrequest::where('CheckoutRequestID',$CheckoutRequestID)->firstOrfail();
            
            $payment->ResultDesc=$ResultDesc;
            $payment->status='Failed';
            $payment->save();
    
            }
    
        }

public function stkQuery(){
    $accessToken=$this->token();
    $BusinessShortCode=174379;
    $PassKey='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
    $url='https://sandbox.safaricom.co.ke/mpesa/stkpushquery/v1/query';
    $Timestamp=Carbon::now()->format('YmdHis');
    $Password=base64_encode($BusinessShortCode.$PassKey.$Timestamp);
    $CheckoutRequestID='ws_CO_11102024130250238745416760';

    $response=Http::withToken($accessToken)->post($url,[

        'BusinessShortCode'=>$BusinessShortCode,
        'Timestamp'=>$Timestamp,
        'Password'=>$Password,
        'CheckoutRequestID'=>$CheckoutRequestID
    ]);

    return $response;
}

    public function registerUrl(){
        $accessToken=$this->token();
        $url='https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
        $ShortCode=600992;
        $ResponseType='Completed';  //Cancelled
        $ConfirmationURL='https://9563-196-207-169-62.ngrok-free.app/payments/confirmation';
        $ValidationURL='https://9563-196-207-169-62.ngrok-free.app/payments/validation';

        $response=Http::withToken($accessToken)->post($url,[
            'ShortCode'=>$ShortCode,
            'ResponseType'=>$ResponseType,
            'ConfirmationURL'=>$ConfirmationURL,
            'ValidationURL'=>$ValidationURL
        ]);

        return $response;
    }

    public function Simulate(){
        $accessToken=$this->token();
        $url='https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate';

        $ShortCode=600992;
        $CommandID='CustomerPayBillOnline'; //CustomerBuyGoodsOnline
        $Amount=1;

        $Msisdn=254708374149;
        $BillRefNumber='00000';

        $response=Http::withToken($accessToken)->post($url,[
            'ShortCode'=>$ShortCode,
            'CommandID'=>$CommandID,
            'Amount'=>$Amount,
            'Msisdn'=>$Msisdn,
            'BillRefNumber'=>$BillRefNumber
        ]);

        return $response;

    }

    public function Validation(){
        $data=file_get_contents('php://input');
        Storage::disk('local')->put('validation.txt',$data);

        //validation logic
        
        return response()->json([
            'ResultCode'=>0,
            'ResultDesc'=>'Accepted'
        ]);
        
        /*
        return response()->json([
            'ResultCode'=>'C2B00012', (invalid account number)
            'ResultDesc'=>'Rejected'
        ])
        */
    }
    public function Confirmation(){
        $data=file_get_contents('php://input');
        Storage::disk('local')->put('confirmation.txt',$data);
        $response=json_decode($data);
        $TransactionType=$response->TransactionType;
        $TransID=$response->TransID;
        $TransTime=$response->TransTime;
        $TransAmount=$response->TransAmount;
        $BusinessShortCode=$response->BusinessShortCode;
        $BillRefNumber=$response->BillRefNumber;
        $InvoiceNumber=$response->InvoiceNumber;
        $OrgAccountBalance=$response->OrgAccountBalance;
        $ThirdPartyTransID=$response->ThirdPartyTransID;
        $MSISDN=$response->MSISDN;
        $FirstName=$response->FirstName;
        $MiddleName=$response->MiddleName;
        $LastName=$response->LastName;

        $c2b=new C2brequest;
        $c2b->TransactionType=$TransactionType;
        $c2b->TransID=$TransID;
        $c2b->TransTime=$TransTime;
        $c2b->TransAmount=$TransAmount;
        $c2b->BusinessShortCode=$BusinessShortCode;
        $c2b->BillRefNumber=$BillRefNumber;
        $c2b->InvoiceNumber=$InvoiceNumber;
        $c2b->OrgAccountBalance=$OrgAccountBalance;
        $c2b->ThirdPartyTransID=$ThirdPartyTransID;
        $c2b->MSISDN=$MSISDN;
        $c2b->FirstName=$FirstName;
        $c2b->MiddleName=$MiddleName;
        $c2b->LastName=$LastName;
        $c2b->save();


        return response()->json([
            'ResultCode'=>0,
            'ResultDesc'=>'Accepted'
        ]);
        
    }

    public function ConfirmationForTill(){
        $data = file_get_contents('php://input');
        Storage::disk('local')->put('till_confirmation.txt', $data);  // Changed file name for clarity
        $response = json_decode($data);
    
        // Extract relevant fields from the response
        $TransactionType = $response->TransactionType;
        $TransID = $response->TransID;
        $TransTime = $response->TransTime;
        $TransAmount = $response->TransAmount;
        $BusinessShortCode = $response->BusinessShortCode;
        $BillRefNumber = $response->BillRefNumber;
        $InvoiceNumber = $response->InvoiceNumber;
        $OrgAccountBalance = $response->OrgAccountBalance;
        $ThirdPartyTransID = $response->ThirdPartyTransID;
        $TillNumber = $response->MSISDN;  // Assuming you want to use the MSISDN as the till number
    
        // Create a new instance of your model (update this to your actual model)
        $c2b = new C2brequest;
        $c2b->TransactionType = $TransactionType;
        $c2b->TransID = $TransID;
        $c2b->TransTime = $TransTime;
        $c2b->TransAmount = $TransAmount;
        $c2b->BusinessShortCode = $BusinessShortCode;
        $c2b->BillRefNumber = $BillRefNumber;
        $c2b->InvoiceNumber = $InvoiceNumber;
        $c2b->OrgAccountBalance = $OrgAccountBalance;
        $c2b->ThirdPartyTransID = $ThirdPartyTransID;
        $c2b->TillNumber = $TillNumber;  // Use the extracted till number
        $c2b->FirstName = $response->FirstName ?? null; // Optional fields
        $c2b->MiddleName = $response->MiddleName ?? null;
        $c2b->LastName = $response->LastName ?? null;
        $c2b->save();
    
        return response()->json([
            'ResultCode' => 0,
            'ResultDesc' => 'Accepted'
        ]);
    }
    

    public function generateQRCode(Request $request)
    {
        return $this->createQRCodeData($request); // Call the shared method for QR code data
    }
    
    public function showAccounts(Request $request)
    {
        return $this->createQRCodeData($request); // Reuse the same logic for generating QR code
    }
    
    // public method to generate QR code data
    public function createQRCodeData(Request $request)
    {
        $tillNumber = '9922091'; 
        $amount = 1; // Static amount
        $referenceNumber = $request->input('reference_number', 'ABC123');
        $paymentUrl = 'https://9563-196-207-169-62.ngrok-free.app'; 
    
        $qrCodeMessage = "Please enter your pin to pay Kshs. {$amount} to Daraja-sandbox Account no. {$tillNumber}.";
    
        // Return the accounts view with the QR code message
        return view('accounts', compact('qrCodeMessage')); // Prompt message
    }
    
    }