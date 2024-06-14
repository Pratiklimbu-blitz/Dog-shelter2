<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DonationController extends Controller
{
    public function verifyDonation(Request $request){

         $totalPrice = $request->input('total');
         $args       = self::setArgs($request->token, $totalPrice * 100);
         $url    = "https://khalti.com/api/v2/payment/verify/";
         $header = self::getApiHeader();
         $resp   = Http::acceptJson()->withHeaders($header)->post($url, $args);
         if ($resp->getStatusCode() == 200) {
              \DB::transaction(function () use ($totalPrice,$resp) {
                   $resp_body = collect(json_decode($resp->body()));
              });
              return response()->json([
                   'success' => 1,
                   'message' => 'Thank you, donation made successfylly',
              ], 200);
         } else {
              return response()->json([
                   'error'   => 1,
                   'message' => 'Failed',
                   'code'    => 500
              ]);
         }
    }


     public function setArgs($token, $amount)
     {
          return [
               'token'  => $token,
               'amount' => $amount,
          ];
     }

     public function getApiHeader(): array
     {
          return [
               'Authorization' => 'Key ' . config('services.khalti.private_key'),
          ];
     }

}
