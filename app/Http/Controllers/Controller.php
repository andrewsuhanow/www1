<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\http\Request;
use Sentinel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function main(){


        return view('main');
    }

    public function reg(Request $request){


        $input = $request->only('email', 'password');
        try {
            if (Sentinel::authenticate($input, $request->has('remember'))) {
                return response()->json([
                    'status' => 'success'
                ]);
            }
            return response()->json([
                'status' => 'fail1',
            ]);
        } catch (\Cartalyst\Sentinel\Checkpoints\NotActivatedException $e) {
            return response()->json([
                'status' => 'fail2',
            ]);
        } catch (\Cartalyst\Sentinel\Checkpoints\ThrottlingException $e) {
            return response()->json([
                'status' => 'fail3',
            ]);
        }


//        return response()->json([
//            'status'=>'success'
//        ]);
    }

    public function unReg(Request $request){

        Sentinel::logout();

        return response()->json([
            'status'=>'success'
        ]);
    }
}
