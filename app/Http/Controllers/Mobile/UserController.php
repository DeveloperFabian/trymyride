<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserMobile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $emailExists = UserMobile::where('email', $request->input('email'))->exists();

        if ($emailExists) {
            return response()->json([
                'status' => 400,
                'message' => 'Este correo electrónico ya existe',
            ], 400);
        } else {
            try {
                $dataUserMobile = new UserMobile();

                $dataUserMobile->fill([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'state_id' => 1,
                ]);
                $dataUserMobile->save();

                $token = $dataUserMobile->createToken('auth_token')->plainTextToken;

                return response()->json([
                    'status' => 200,
                    'message' => 'Registro creado exitosamente',
                    "access_token" => $token
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => 500,
                    'message' => 'Error en el servidor',
                    'error' => $e->getMessage()
                ], 500);
            }
        }
    }

    public function login(Request $request)
    {
        $user = UserMobile::where('email', $request->input('email'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json([
                'status' => 401,
                'message' => 'Credenciales incorrectas',
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 200,
            'message' => 'Autenticación exitosa',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }

    public function account()
    {
        $user = Auth::guard('sanctum')->user();

        if ($user) {
            return response()->json([
                'user' => $user
            ]);
        } else {
            return response()->json([
                'message' => 'Usuario no autenticado',
            ], 401);
        }
    }

    public function update(Request $request)
    {
        $user = Auth::guard('sanctum')->user();

        if ($user) {
            $user->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password'))
            ]);

            return response()->json([
                'user' => $user,
                'message' => 'Datos del usuario actualizados correctamente',
            ]);
        } else {
            return response()->json([
                'message' => 'Usuario no autenticado',
            ], 401);
        }
    }

    public function logout()
    {
        $user = Auth::guard('sanctum')->user();

        if ($user) {
            $user->tokens->each(function (PersonalAccessToken $token) {
                $token->delete();
            });

            return response()->json([
                'status' => 200,
                'message' => 'Has cerrado sesión satisfactoriamente'
            ]);
        }

        return response()->json([
            'status' => 401,
            'message' => 'No estás autenticado'
        ], 401);
    }
}
