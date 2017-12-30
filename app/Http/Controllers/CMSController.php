<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Role;
use App\Student;
use App\Http\Resources\cms;

class CMSController extends Controller
{
    //

    public function show(Request $request)
    {
        $data = $this->faculty($request->email);
        if($data)
        {
            $roles = $this->role($data->e_id);
            $role = array();
            foreach ($roles as $roles) {                
                array_push($role, $roles->roles_id);
            }
            $dataModel['data'] = [
                'e_id' => $data->e_id,
                'first_name' => $data->first_name,
                'last_name' => $data->last_name,
                'type' => $data->type,
                'role' => $role
            ];
        }
        else
        {
            $data = $this->student($request->email);
            $dataModel['data'] = [
                'uid' => $data->uid,
                'first_name' => $data->first_name,
                'last_name' => $data->last_name
            ];
        }
        if($dataModel['data'])
        {
            $dataModel['error'] = false;
            $dataModel['message'] = "Success";
        }
        else
        {
            $dataModel['error'] = true;
            $dataModel['message'] = "No data found";
        }
        $dataResource= new cms($dataModel);
        return $dataResource;
    }

    public function faculty($email)
    {
        return Staff::where('email' , $email)->first();
    }

    public function role($eid)
    {
        return Role::where('e_id' , $eid)->get();
    }

    public function student($email)
    {
        return Student::where('email_id' , $email)->first();
    }
}
