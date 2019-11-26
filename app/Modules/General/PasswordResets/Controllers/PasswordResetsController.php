<?php
namespace App\Modules\General\PasswordResets\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\General\PasswordResets\Repositories\PasswordResetsRepository;

class PasswordResetsController extends Controller
{
    private $passwordresetsRepository;

    function __construct(PasswordResetsRepository $passwordresetsRepository ){
        $this->passwordresetsRepository = $passwordresetsRepository;
    }

    public function index(Request $request){
        try {
            $data =  $this->passwordresetsRepository->index($request);
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
            $data = $this->passwordresetsRepository->show($id);
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
            $data = $this->passwordresetsRepository->store($request);
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
            $data = $this->passwordresetsRepository->update($request, $id);
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
            $data = $this->passwordresetsRepository->destroy($id);
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