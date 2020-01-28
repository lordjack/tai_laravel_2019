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
            $dataObject =  $this->cursomodelsRepository->index($request);
            return response()->json($dataObject, 200);
        } catch(\Exception $e){
            $dataObject = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($dataObject, 401);
        }
    }

    public function show($id){
        try {
            $dataObject = $this->cursomodelsRepository->show($id);
            return response()->json($dataObject, 200);
        } catch(\Exception $e){
            $dataObject = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($dataObject, 400);
        }
    }

    public function store(Request $request){
        try {
            $dataObject = $this->cursomodelsRepository->store($request);
            return response()->json($dataObject, 200);
        } catch(\Exception $e){
            $dataObject = [
                "message"=> "Error, try again!",
                "code" => $e->getCode(),
                "text "=>    $e->getMessage()
            ];
            return response()->json($dataObject, 400);
        }
    }

    public function update(Request $request, $id){
        try {
            $dataObject = $this->cursomodelsRepository->update($request, $id);
            return response()->json($dataObject, 200);
        } catch(\Exception $e){
            $dataObject = [
                "message" => "Error, try again!",
                 "code" => $e->getCode(),
                "text" =>    $e->getMessage()
            ];
            return response()->json($dataObject, 400);
        }
    }

    public function destroy($id){
        try {
            $dataObject = $this->cursomodelsRepository->destroy($id);
            return response()->json($dataObject, 200);
        } catch(\Exception $e){
            $dataObject = [
                "message"=> "Error, try again!",
                "text"=>    $e->getMessage()
            ];
            return response()->json($dataObject, 400);
        }
    }

}
