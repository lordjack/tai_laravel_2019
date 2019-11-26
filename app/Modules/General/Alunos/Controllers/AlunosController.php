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
            $data =  $this->alunosRepository->index($request);
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
            $data = $this->alunosRepository->show($id);
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
            $data = $this->alunosRepository->store($request);
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
            $data = $this->alunosRepository->update($request, $id);
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
            $data = $this->alunosRepository->destroy($id);
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