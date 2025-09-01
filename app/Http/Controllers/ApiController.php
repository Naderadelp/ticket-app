<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function include(string $relationship){
        $param = request()->get('include');
        if(!isset($param)){
            return false;
        }
        $includeValues = explode(',',strtoLower($param));
        return in_array(strtolower($relationship), $includeValues);
    }
}
