<?php

namespace App\Http\Controllers;

//necesary facades - class

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Laravel\Sanctum\PersonalAccessToken;
use Symfony\Component\HttpFoundation\Response;

//models references
use App\Models\User;

class AuthController extends Controller
{

    //REGISTER

    public function register(Request $request)
    {
        try {

            //data validation
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'surname' => 'required|string',
                'email' => 'required|email|unique:users,email',
                'password' => ['required', Password::min(8)->mixedCase()->numbers()]
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }

            $validData = $validator->validated();

            $lastEmployeeNumber = User::withoutGlobalScopes()->max('employee_number');
            $newEmployeeNumber = $lastEmployeeNumber + 1;
            $paddedEmployeeNumber = str_pad($newEmployeeNumber, 3, '0', STR_PAD_LEFT);


            //creation new user 
            $newUser = User::create([
                'name' => $validData['name'],
                'surname' => $validData['surname'],
                'email' => $validData['email'],
                'password' => bcrypt($validData['password']),
                'role_id' => 3,
                'employee_number' => $paddedEmployeeNumber,
            ]);

            //Token generation
            $token = $newUser->createToken('apiToken')->plainTextToken;

            return response()->json([
                'message' => 'User registered successfully',
                'data' => $newUser,
                'token' => $token
            ], Response::HTTP_CREATED);
        } catch (\Exception $ex) {
            Log::error('Error registering user: ' . $ex->getMessage());
            return response()->json([
                'message' => 'Error registering user',
                'error' => $ex->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

//LOGIN

public function login(Request $request)
{
    try {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email' => 'Invalid email or password',
            'password' => 'Invalid email or password'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $validData = $validator->validated();

        $user = User::where('email', $validData['email'])->first();

        if (!$user) {
            return response()->json([
                'message' => 'Invalid email or password'
            ], Response::HTTP_FORBIDDEN);
        }

        if (!Hash::check($validData['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid email or password'
            ], Response::HTTP_FORBIDDEN);
        }

        $token = $user->createToken('apiToken')->plainTextToken;

        return response()->json([
            'message' => 'User logged in',
            'data' => $user,
            'token' => $token
        ], Response::HTTP_CREATED);
    } catch (\Throwable $th) {
        Log::error('Error logging user in ' . $th->getMessage());

        return response()->json([
            'message' => 'Error logging user in'
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

//LOGOUT

public function logout(Request $request)
{

    try {
        $headerToken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($headerToken);
        $token->delete();

        return response()->json([
            'message' => 'User logged out'
        ], Response::HTTP_OK);
    } catch (\Throwable $th) {
        Log::error('Error logging user out ' . $th->getMessage());

        return response()->json([
            'message' => 'Error logging user out'
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
}
