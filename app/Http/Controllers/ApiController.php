<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $this->validate_request($request);

        if ($validate->fails()) return $this->response_message('error', $validate->errors()->all()[0], 400);
        try {
            // If validation was successful create user account
            $user = User::create(['name' => $request->name]);
            return $this->response_message('success', 'user created successfully ', 200, $user);
        } catch (\Throwable $th) {
            return $this->response_message('error', $th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            $user = User::where('name', '=', $request->name)->first();
            // if no user found throw error 
            if (!$user) return $this->response_message('error', 'no user found',  400);
            // if user is found return a success message with user name 
            return $this->response_message('success', 'user data retrieved successfully ',  200, $user);
        } catch (\Throwable $th) {
            return $this->response_message('error', $th->getMessage(),  500);
        }
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validate = $this->validate_request_for_update($request);
        if ($validate->fails()) return $this->response_message('error', $validate->errors()->all(),  400);
        try {
            // If validation was successful create user account
            return $this->update_user_details($request);
        } catch (\Throwable $th) {
            return $this->response_message('error', $th->getMessage(),  500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $validate =  Validator::make($request->all(), ['name' => 'required|string',]);
        if ($validate->fails())  return $this->response_message('error', $validate->errors()->all(), 400);
        try {
            // If validation was successful create user account
            $user = User::where('name', '=', $request->name)->first();
            if (!$user)  return $this->response_message('error', 'This user is not found',  400);
            $user->delete();
            return $this->response_message('success', 'your account was deleted successfully',  200);
        } catch (\Throwable $th) {
            // If there's an error in creating the new user throw server Error
            return $this->response_message('error', $th->getMessage(),  500);
        }
    }


    private function update_user_details($request)
    {

        $user = User::where('name', '=', $request->old_name)->first();
        if (!$user)  return $this->response_message('error', 'This user is not found ' . $request->old_name,  400);
        $user->update(['name' => $request->new_name,]);
        return $this->response_message('success', 'user name updated successfully ',  200);
    }



    private function validate_request(Request $request)
    {
        return Validator::make($request->all(), ['name' => 'required|string|unique:users',]);
    }

    private function validate_request_for_update(Request $request)
    {
        return Validator::make($request->all(), [
            'old_name' => 'required|string',
            'new_name' => ['required', 'unique:users,name', 'string']
        ]);
    }

    private function response_message($status, $message, $status_code, $data = null)
    {
        if ($data == null) {
            return response()->json([
                'status' => $status,
                'message' =>  $message,
                'status_code' => $status_code
            ]);
        } else {
            return response()->json([
                'status' => $status,
                'data' => $data,
                'message' =>  $message,
                'status_code' => $status_code
            ]);
        }
    }
}
