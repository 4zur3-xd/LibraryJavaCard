<?php

namespace App\Http\Controllers;

use App\Models\User;
use phpseclib3\Crypt\RSA;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use phpseclib3\Math\BigInteger;

class RSAController extends Controller
{
    public function challengeGen()
    {
        $challenge = Str::random(32);

        return ResponseHelper::green($challenge);
    }

    public function RSAVerify(Request $request)
    {
        try {
            $user = User::find($request->user_id);

            if(!$user){
                return ResponseHelper::red("User not exists");
            }

            $rawKey = hex2bin(str_replace(' ', '', $user->public_key));
            $challenge = $request->challenge;
            $sign = hex2bin(str_replace(' ', '', $request->sign));

            $modulus = new BigInteger($rawKey, 256);
            $exponent = new BigInteger('65537');

            $rsa = RSA::load([
                'n' => $modulus,
                'e' => $exponent,
            ]);

            $result = $rsa->verify($challenge, $sign);

            if($result){
                return ResponseHelper::green('Verify successfully!');
            }else{
                return ResponseHelper::red('Failed to verify!');
            }
        } catch (\Throwable $th) {
            return ResponseHelper::red($th->getMessage());
        }
    }
}
