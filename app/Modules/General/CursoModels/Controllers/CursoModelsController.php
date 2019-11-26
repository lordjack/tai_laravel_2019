<?php
namespace App\Modules\General\CursoModels\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\General\CursoModels\Repositories\CursoModelsRepository;

class CursoModelsController extends Controller
{
    private $cursomodelsRepository;

    function __construct(CursoModelsRepository $cursomodelsRepository ){
        $this->cursomodelsRepository = $cursomodelsRepository;
    }

    public function index(Request $request){
        try {
            $data =  $this->cursomodelsRepository->index($request);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 401);
        }
    }

    public function show($id){
        try {
            $data = $this->cursomodelsRepository->show($id);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }

    public function store(Request $request){
        try {
            $data = $this->cursomodelsRepository->store($request);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "code" => $e->getCode(),
                "text "=>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }

    public function update(Request $request, $id){
        try {
            $data = $this->cursomodelsRepository->update($request, $id);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message" => "Error, try again!",
                 "code" => $e->getCode(),
                "text" =>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }

    public function destroy($id){
        try {
            $data = $this->cursomodelsRepository->destroy($id);
            return response()->json($data, 200);
        } catch(\Exception $e){
            $data = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($data, 400);
        }
    }

}