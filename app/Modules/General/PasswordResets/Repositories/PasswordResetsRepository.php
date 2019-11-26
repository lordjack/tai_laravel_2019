<?php
namespace App\Modules\General\PasswordResets\Repositories;
use App\Modules\General\PasswordResets\Models\PasswordResets;
use App\Modules\General\PasswordResets\Repositories\PasswordResetsSearchRepository;
use Validator;
use Illuminate\Http\Request;

class PasswordResetsRepository
{
    private $passwordresetsSearchRepository;
    function __construct(PasswordResetsSearchRepository $passwordresetsSearchRepository){
        $this->passwordresetsSearchRepository = $passwordresetsSearchRepository;
    }

    public function index(Request $request){
        return $this->passwordresetsSearchRepository->search(PasswordResets::with([]), $request);
    }

    public function show($id){
    	return PasswordResets::where(["id"=>$id])->first();
    }

    public function store($request){
        $validator = Validator::make($request->all(), [
            "email"=>"nullable",
            "token"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "email"=>$request->email,
            "token"=>$request->token,
            ];
            return PasswordResets::create($data);
        }
    }

    public function update($request, $id){
        $validator = Validator::make($request->all(), [
            "email"=>"nullable",
            "token"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "email"=>$request->email,
            "token"=>$request->token,
            ];
            return PasswordResets::where(["id"=>$id])->update($data);
        }
    }

    public function destroy($id){
    	return PasswordResets::where(["id"=>$id])->delete();
    }

}