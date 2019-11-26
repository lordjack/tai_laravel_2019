<?php
namespace App\Modules\General\Alunos\Repositories;
use App\Modules\General\Alunos\Models\Alunos;
use App\Modules\General\Alunos\Repositories\AlunosSearchRepository;
use Validator;
use Illuminate\Http\Request;

class AlunosRepository
{
    private $alunosSearchRepository;
    function __construct(AlunosSearchRepository $alunosSearchRepository){
        $this->alunosSearchRepository = $alunosSearchRepository;
    }

    public function index(Request $request){
        return $this->alunosSearchRepository->search(Alunos::with([]), $request);
    }

    public function show($id){
    	return Alunos::where(["id"=>$id])->first();
    }

    public function store($request){
        $validator = Validator::make($request->all(), [
            "nome"=>"nullable",
            "curso"=>"nullable",
            "turma"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "nome"=>$request->nome,
            "curso"=>$request->curso,
            "turma"=>$request->turma,
            ];
            return Alunos::create($data);
        }
    }

    public function update($request, $id){
        $validator = Validator::make($request->all(), [
            "nome"=>"nullable",
            "curso"=>"nullable",
            "turma"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "nome"=>$request->nome,
            "curso"=>$request->curso,
            "turma"=>$request->turma,
            ];
            return Alunos::where(["id"=>$id])->update($data);
        }
    }

    public function destroy($id){
    	return Alunos::where(["id"=>$id])->delete();
    }

}