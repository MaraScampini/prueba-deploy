<?php

namespace App\Http\Controllers;

//necesary facades - class

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use App\Models\Project;

class ProjectController extends Controller
{
    //GET USER PROJECT
    public function getUserProjects(Request $request)
    {
        $user = $request->user(); // Obtiene el usuario autenticado desde el token
        // Obtener los equipos a los que pertenece el usuario
        $teams = $user->teams;
        // Verifica si hay equipos y devuelve una respuesta en formato JSON
        if ($teams->isEmpty()) {
            return response()->json(['message' => 'El usuario no pertenece a ningún equipo.']);
        }

        // Eager load the projects for each team
        $teams->load('projects');

        return response()->json($teams);
    }

    //GET ALL PROJECTS
    public function getAllProjects()
    {
        try {
            $projects = Project::all();

            return response()->json([
                'message' => 'All projects retrieved successfully',
                'data' => $projects,
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            Log::error('Error retrieving all projects: ' . $th->getMessage());
            return response()->json([
                'message' => 'Error retrieving all projects'
            ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 state
        }
    }

    //CREATE NEW PROJECT
    public function createProject(Request $request)
    {
        try {
            // Validar los datos recibidos en el cuerpo de la solicitud
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'place' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'team' => 'required|exists:teams,id',
                'description' => 'required|string',
            ]);

            // Comprobar si la validación falla y devolver los errores si los hay
            if ($validator->fails()) {
                return response()->json([
                    'message' => 'Validation error',
                    'errors' => $validator->errors(),
                ], Response::HTTP_BAD_REQUEST);
            }

            // Crear el nuevo proyecto con los datos validados
            $project = Project::create([
                'name' => $request->input('name'),
                'place' => $request->input('place'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'team' => $request->input('team'),
                'description' => $request->input('description'),
            ]);

            return response()->json([
                'message' => 'Project created successfully',
                'data' => $project,
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            Log::error('Error creating project: ' . $th->getMessage());
    
            // Devolver el mensaje del error como respuesta
            return response()->json([
                'message' => 'Error creating project: ' . $th->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 state
        }
    }

    //UPDATE PROJECT
    
    public function updateProject(Request $request)
    {
        try {
            // Obtener el ID del proyecto del cuerpo de la solicitud
            $id = $request->input('id');
    
            // Verificar si el proyecto existe
            $project = Project::find($id);
            if (!$project) {
                return response()->json([
                    'message' => 'Project not found'
                ], Response::HTTP_NOT_FOUND); // 404 state
            }
    
            // Validar los datos recibidos en el cuerpo de la solicitud
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'place' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'team' => 'required|exists:teams,id',
                'description' => 'required|string',
            ]);
    
            // Resto del código...
    
            // Actualizar el proyecto con los datos validados
            $project->update([
                'name' => $request->input('name'),
                'place' => $request->input('place'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'team' => $request->input('team'),
                'description' => $request->input('description'),
            ]);
    
            return response()->json([
                'message' => 'Project updated successfully',
                'data' => $project,
            ], Response::HTTP_OK); // 200 state
    
        } catch (\Throwable $th) {
            Log::error('Error updating project ' . $th->getMessage());
            return response()->json([
                'message' => 'Error updating project'
            ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 state
        }
    }

    //DELETE PROJECT

    public function deleteProject(Request $request)
{
    try {
        // Obtener el ID del proyecto del cuerpo de la solicitud
        $id = $request->input('id');

        // Verificar si el proyecto existe
        $project = Project::find($id);
        if (!$project) {
            return response()->json([
                'message' => 'Project not found'
            ], Response::HTTP_NOT_FOUND); // 404 state
        }

        // Eliminar el proyecto
        $project->delete();

        return response()->json([
            'message' => 'Project deleted successfully',
        ], Response::HTTP_OK); // 200 state

    } catch (\Throwable $th) {
        Log::error('Error deleting project ' . $th->getMessage());
        return response()->json([
            'message' => 'Error deleting project'
        ], Response::HTTP_INTERNAL_SERVER_ERROR); // 500 state
    }
}
}
