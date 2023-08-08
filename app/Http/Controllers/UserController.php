<?php

namespace App\Http\Controllers;

//necesary facades - class

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class UserController extends Controller
{
    //GET PROFILE
    public function getUserProfile()
    {
        try {

            $user = auth()->user();

            if (!$user) {
                return response()->json([
                    'message' => 'User not found'
                ], Response::HTTP_NOT_FOUND); // 404 state
            }

            return response()->json([
                'message' => 'User found',
                'data' => $user,
            ], Response::HTTP_OK); // 200 state

        } catch (\Throwable $th) {
            Log::error('Error retrieving user ' . $th->getMessage());
            return response()->json([
                'message' => 'Error retrieving user'
            ], Response::HTTP_INTERNAL_SERVER_ERROR); //500 state
        }
    }

    //UPDATE PROFILE
    public function updateProfile(Request $request)
    {
        try {

            //obtencion del usuario autenticado
            $user = Auth::user();

            //validacion de los datos recibidos en la solicitud
            $validator = Validator::make($request->all(), [
                'name' => 'string|max:255',
                'surname' => 'string|max:255',
                'dni' => 'nullable|string|unique:users,dni,' . $user->id,
                'birthdate' => 'nullable|date_format:Y-m-d',
                'phone_number' => 'nullable|numeric|unique:users,phone_number,' . $user->id,
                'gender' => 'nullable|in:male,female',
                'category' => 'nullable|string',
                'image' => 'nullable|string',
            ]);


            if ($validator->fails()) {
                return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
            }

            // Obtener los datos validados
            $validData = $validator->validated();

            // Actualizar los campos del perfil del usuario con los datos validados
            $user->update($validData); //esta en rojo pero esta funcionando correctamemte

            return response()->json([
                'message' => 'User profile updated successfully',
                'data' => $user,
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error updating user profile: ' . $th->getMessage());

            return response()->json([
                'message' => 'Error updating user profile'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    //DELETE PROFILE

    public function deleteUser($id)
    {
        try {
            // busqueda del usuario por su id
            $user = User::find($id);

            // verificacion de la existencia del usuario
            if (!$user) {
                return response()->json([
                    'message' => 'User not found'
                ], Response::HTTP_NOT_FOUND);
            }

            $user->delete();
            return response()->json([
                'message' => 'User deleted'
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error deleting user ' . $th->getMessage());

            return response()->json([
                'message' => 'Error deleting user'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    //ALL USERS
    public function getAllUsers()
{
    try {
        $users = User::all();

        return response()->json([
            'message' => 'Users found',
            'data' => $users,
        ], Response::HTTP_OK); // 200 state

    } catch (\Throwable $th) {
        Log::error('Error retrieving users ' . $th->getMessage());
        return response()->json([
            'message' => 'Error retrieving users'
        ], Response::HTTP_INTERNAL_SERVER_ERROR); //500 state
    }
}
}
