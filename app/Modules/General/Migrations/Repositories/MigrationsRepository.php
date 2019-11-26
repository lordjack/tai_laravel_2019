<?php
namespace App\Modules\General\Migrations\Repositories;
use App\Modules\General\Migrations\Models\Migrations;
use App\Modules\General\Migrations\Repositories\MigrationsSearchRepository;
use Validator;
use Illuminate\Http\Request;

class MigrationsRepository
{
    private $migrationsSearchRepository;
    function __construct(MigrationsSearchRepository $migrationsSearchRepository){
        $this->migrationsSearchRepository = $migrationsSearchRepository;
    }

    public function index(Request $request){
        return $this->migrationsSearchRepository->search(Migrations::with([]), $request);
    }

    public function show($id){
    	return Migrations::where(["id"=>$id])->first();
    }

    public function store($request){
        $validator = Validator::make($request->all(), [
            "migration"=>"nullable",
            "batch"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "migration"=>$request->migration,
            "batch"=>$request->batch,
            ];
            return Migrations::create($data);
        }
    }

    public function update($request, $id){
        $validator = Validator::make($request->all(), [
            "migration"=>"nullable",
            "batch"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "migration"=>$request->migration,
            "batch"=>$request->batch,
            ];
            return Migrations::where(["id"=>$id])->update($data);
        }
    }

    public function destroy($id){
    	return Migrations::where(["id"=>$id])->delete();
    }

}