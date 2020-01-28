<?php
namespace App\Modules\General\Alunos\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\General\Alunos\Repositories\AlunosRepository;

class AlunosController extends Controller
{
    private $alunosRepository;

    function __construct(AlunosRepository $alunosRepository ){
        $this->alunosRepository = $alunosRepository;
    }

    public function index(Request $request){
        try {
            $dataObject =  $this->alunosRepository->index($request);
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
            $dataObject = $this->alunosRepository->show($id);
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
            $dataObject = $this->alunosRepository->store($request);
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
            $dataObject = $this->alunosRepository->update($request, $id);
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
            $dataObject = $this->alunosRepository->destroy($id);
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
