<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\staff;
use App\Http\Resources\cms;

class CMSController extends Controller
{
    //

    public function show(Request $request)
    {
        $dataModel=['data' => staff::find('113')];
        $dataModel['error'] = false;
        $dataModel['message'] = "Success";
        // $dataModel
        // return $dataModel;
        $dataResource= new cms($dataModel);
        return $dataResource;
    }
}
