<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ContextController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->key = "LO9658JMP09876543";   
    }

    //Make it work
    private function SettingsServer(){
        //Return Importante values CAN BE STATIC STRINGS O CONSTANTS
    }

    //SettingServer is a private function, so Action should be called from a public context
    public function Action(){
        self::SettingsServer();
    }

}
