<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class PrototypeController extends Controller
{

    private static $key = null; 
    private static $payload = null;
    private $decrypt = null; 
    private $InnerRequest = null; 
    private $Action = null; 

    //Your decode string need to be the same
    //You need to seend this on Params of request
    //Thats only for guide
    //private $my_encode_string = "uRAeeIeccbAYSQ5tYCEXnw8HYnSKn/zXhbBxVvKfSLg=";
    //Save in varable and show the decode need to be the same as us
    
    /**
     * Create a new controller instance.
     *
     * @return void 
     */

    public function __construct()
    {
        self::$key = "LO9658JMP09876543";           
    }
    
    public function _getContext(Request $request){
        if(!empty($request)):
            if($request->has('string_decrypt')):
                //Make it work (explain why and how)
                //I need to pass the param I got, in this case string_decrypt                
                self::GetOTFConnectionCredential($request->string_decrypt);
                //Add validation of context and response JSON
                //If it works make it work the next Line                
                if($this->decrypt):                    
                    //Make it work explain why                    
                    //$action() deosn't exist, and even then it should be action()
                    $this->InnerRequest = app('App\Http\Controllers\ContextController')->Action();
                    //Add response
                    //return
                    return response()->json(['message' => 'Succesful', 'data' => $this->decrypt], 200, ['Content-Type' => 'application/json']);
                else:
                    return response()->json(['message' => "Couldn't decrypt"], 400, ['Content-Type' => 'application/json']);
                endif;
                //If not make the response
            else:                
                return response()->json(['message' => 'Expected param string_decrypt'], 400, ['Content-Type' => 'application/json']);
            endif;
        else:
            return response()->json(['message' => 'Headers are empty'], 400, ['Content-Type' => 'application/json']);
        endif;
    }

    final private static function _setContext(){
        //aes127 doesn't exist on the list of decrypt methods, so it must be aes128
        //$this-> can't and shouldn't be used with static vars. self should be used
        self::$payload = "aes128";
    }

    final private  function GetOTFConnectionCredential($string_decrypt){
        //set context is static, so self should be used
        self::_setContext();
        //Add context for decrypt        
        //@openssl_decrypt in this case should receive 3 params (data, method, key)
        $this->decrypt =  @openssl_decrypt($string_decrypt, self::$payload, self::$key);                   
        //Add context for validate return
    }

}
