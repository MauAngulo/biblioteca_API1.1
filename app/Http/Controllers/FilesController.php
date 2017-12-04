<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//usar modelos
use App\Files;
use App\UserTypes;
use App\User;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_type_id = Auth::user()->user_type_id;

        if ($user_type_id == '1') {
            $data = Files::all();
        } else {
            $data = Files::select('files.file_name', 'files.avaliability')
                    ->join('access', 'files.id', '=', 'access.id_file')
                    ->join('user_types', 'access.id_user_types', '=', 'user_types.id') 
                    ->where('user_types.id','=', $user_type_id)
                    ->where('files.avaliability', '=', '0')
                    ->getQuery()
                    ->get();
        }

        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = false;
        if ($user_type_id == '1') {
            $data = true;
        }
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user_type_id = Auth::user()->user_type_id;

        if ($user_type_id == '1') {
            $file = Files::create($request->all());
            if (!isset($file)) {
                # code...
                $error = [
                    'errors' => true,
                    'msg' => 'Error al registrar el archivo.',
                ];
                $file = \Response::json($error, 404);
            }
        }
        
        return Redirect::to('/files');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user_type_id = Auth::user()->user_type_id;

        $search = $id;
        if ($user_type_id == '1') {
            $file = Files::where('file_name', 'LIKE', "%{$search}%")->get();
        } else {
            $file = Files::select('files.id', 'files.file_name', 'files.avaliability')
                        ->join('access', 'files.id', '=', 'access.id_file')
                        ->join('user_types', 'access.id_user_types', '=', 'user_types.id') 
                        ->where('user_types.id','=', $user_type_id)
                        ->where('files.avaliability', '=', '0')
                        ->where('file_name', 'LIKE', "%{$search}%")
                        ->getQuery()
                        ->get();
        }

        if (!isset($file)) {
            # code...
            $error = [
                'errors' => true,
                'msg' => 'Error al registrar el archivo.',
            ];
            $file = \Response::json($error, 404);
        }
        return $file;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user_type_id = Auth::user()->user_type_id;
        if ($user_type_id == '1') {
            $file = Files::find($id);
            $file->fill($request->all());
            $fileReturn = $file->save();
            if (isset($file)) {
                # code...
                $file = \Response::json($fileReturn, 200);
            } else {
                $file = \Response::json(['error' => 'No se pudo actualizar los datos del archivo.'], 404);
            }
        }
        return $file;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user_type_id = Auth::user()->user_type_id;

        if ($user_type_id == '1') {
            $files = Files::find($id);

            if ($files = delete()) {
                # code...
                $files = \Response::json(['delete' => true, 'id' => $id], 200);
            } else {
                $files = \Response::json(['error' => 'No se pudo eliminar el archivo'], 403);
            }
        }
        
        return $files;
    }
}
