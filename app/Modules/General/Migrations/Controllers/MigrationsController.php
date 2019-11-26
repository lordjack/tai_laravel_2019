<?php
namespace App\Modules\General\Migrations\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\General\Migrations\Repositories\MigrationsRepository;

class MigrationsController extends Controller
{
    private $migrationsRepository;

    function __construct(MigrationsRepository $migrationsRepository ){
        $this->migrationsRepository = $migrationsRepository;
    }

    public function index(Request $request){
        try {
            $data =  $this->migrationsRepository->index($request);
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
            $data = $this->migrationsRepository->show($id);
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
            $data = $this->migrationsRepository->store($request);
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
            $data = $this->migrationsRepository->update($request, $id);
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
            $data = $this->migrationsRepository->destroy($id);
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