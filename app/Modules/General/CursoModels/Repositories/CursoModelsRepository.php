<?php
namespace App\Modules\General\CursoModels\Repositories;
use App\Modules\General\CursoModels\Models\CursoModels;
use App\Modules\General\CursoModels\Repositories\CursoModelsSearchRepository;
use Validator;
use Illuminate\Http\Request;

class CursoModelsRepository
{
    private $cursomodelsSearchRepository;
    function __construct(CursoModelsSearchRepository $cursomodelsSearchRepository){
        $this->cursomodelsSearchRepository = $cursomodelsSearchRepository;
    }

    public function index(Request $request){
        return $this->cursomodelsSearchRepository->search(CursoModels::with([]), $request);
    }

    public function show($id){
    	return CursoModels::where(["id"=>$id])->first();
    }

    public function store($request){
        $validator = Validator::make($request->all(), [
            "nome"=>"nullable",
            "abreviatura"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "nome"=>$request->nome,
            "abreviatura"=>$request->abreviatura,
            ];
            return CursoModels::create($data);
        }
    }

    public function update($request, $id){
        $validator = Validator::make($request->all(), [
            "nome"=>"nullable",
            "abreviatura"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "nome"=>$request->nome,
            "abreviatura"=>$request->abreviatura,
            ];
            return CursoModels::where(["id"=>$id])->update($data);
        }
    }

    public function destroy($id){
    	return CursoModels::where(["id"=>$id])->delete();
    }

}