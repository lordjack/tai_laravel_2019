<?php
namespace App\Modules\General\Users\Repositories;
use App\Modules\General\Users\Models\Users;
use App\Modules\General\Users\Repositories\UsersSearchRepository;
use Validator;
use Illuminate\Http\Request;

class UsersRepository
{
    private $usersSearchRepository;
    function __construct(UsersSearchRepository $usersSearchRepository){
        $this->usersSearchRepository = $usersSearchRepository;
    }

    public function index(Request $request){
        return $this->usersSearchRepository->search(Users::with([]), $request);
    }

    public function show($id){
    	return Users::where(["id"=>$id])->first();
    }

    public function store($request){
        $validator = Validator::make($request->all(), [
            "name"=>"nullable",
            "email"=>"nullable",
            "password"=>"nullable",
            "remember_token"=>"required",
            "USER"=>"required",
            "CURRENT_CONNECTIONS"=>"nullable",
            "TOTAL_CONNECTIONS"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password,
            "remember_token"=>$request->remember_token,
            ];
            return Users::create($data);
        }
    }

    public function update($request, $id){
        $validator = Validator::make($request->all(), [
            "name"=>"nullable",
            "email"=>"nullable",
            "password"=>"nullable",
            "remember_token"=>"required",
            "USER"=>"required",
            "CURRENT_CONNECTIONS"=>"nullable",
            "TOTAL_CONNECTIONS"=>"nullable",
        ]);
        if($validator->fails()){
            throw new \Exception("invalid_fields",400);
        } else {
            $data = [
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password,
            "remember_token"=>$request->remember_token,
            ];
            return Users::where(["id"=>$id])->update($data);
        }
    }

    public function destroy($id){
    	return Users::where(["id"=>$id])->delete();
    }

}