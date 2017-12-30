<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Role;
use App\Student;
use App\ProfilePic;
use App\Http\Resources\cms;

class CMSController extends Controller
{
    //

    public function show(Request $request)
    {
        if($request->email)
        {
            $data = $this->faculty($request->email);
            if($data)
            {
                $roles = $this->role($data->e_id);
                $roleList = array();
                foreach ($roles as $role) {                
                    array_push($roleList, $roles->roles_id);
                }
                $dataModel['data'] = [
                    'user' => 'staff',
                    'e_id' => $data->e_id,
                    'first_name' => $data->first_name,
                    'last_name' => $data->last_name,
                    'type' => $data->type,
                    'role' => $roleList
                ];
            }
            else
            {
                $data = $this->student($request->email);
                $dataModel['data'] = [
                    'user' => 'student',
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
        }
        else
        {
            $dataModel['error'] = true;
            $dataModel['message'] = "Email parameter not found";
            $dataModel['data'] = null;
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

    public function getProfilePic()
    {
        $data = ProfilePic::where('id' , 200)->first();
        $data['image'] = base64_encode($data['image']);
        return $data;
        $dataModel['data'] = $data;
        $dataModel['error'] = false;
        $dataModel['message'] = "GG Profile Pic";
        $dataResource= new cms($dataModel);
        return $dataResource;
    }
}
