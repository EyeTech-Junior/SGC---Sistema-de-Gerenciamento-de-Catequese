<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CoordinatorController extends Controller
{
    public function list()
    {
        try{
            $coordinators = DB::table('users')->orderBy('created_at','desc')->Paginate(10);
            return view('coordinator.list',compact('coordinators'));
        }catch(Exception){
            return redirect()->back()->with('error', 'Desculpe, Aconteceu um problema.');
        }

    }
    public function show(Request $request)
    {

            $search=trim($request->get('search'));
            $coordinators=DB::table('users')
                ->select('id','name','status','type')
                ->where('name','LIKE','%'.$search.'%')
                ->orWhere('email','LIKE','%'.$search.'%')
                ->orderBy('created_at','asc')
                ->paginate(10);
            return view('coordinator.list',compact('coordinators'));

    }
    public function edit(Request $request, $id)
    {
        try{
            if(!empty($request->password)){
                if($request->password == $request->password2){
                    $user = User::findOrfail($id);
                    $user->status = $request->status;
                    $user->name = $request->name;
                    $user->password = Hash::make($request->password);
                    $user->email = $request->email;
                    $user->save();
                }
            }else{
                    $user = User::findOrfail($id);
                    $user->status = $request->status;
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->save();
            }
            return redirect()->route('coordinator.list');
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Desculpe, Aconteceu um problema ao atualizar coordenador.');
        }

    }
    public function lowProfile($id){
        try{
            $user = User::find($id);
            return view('coordinator.profile',compact('user'));
        }catch(Exception){
            return redirect()->back()->with('error', 'Desculpe, erro ao acessar perfil.');
        }
    }
    public function profile(String $id)
    {
        try{
            $user = User::find($id);
            return view('coordinator.edit',compact('user'));
        }catch(Exception){
            return redirect()->back()->with('error', 'Desculpe, erro ao acessar perfil.');
        }
    }
    public function create(Request $request)
    {
        try{
            return view('coordinator.add');
        }catch(Exception $e){
            return route('fracasso');
        }
    }
    public function store(Request $request)
    {

        try{
            if($request->password == $request->password2){
                User::create([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                ]);
            }
            return redirect()->route("coordinator.list");
        }catch(Exception){
            return redirect()->back()->with('error', 'Desculpe, Aconteceu um problema ao cadastrar coordenador.');
        }


    }
    public function destroy(string $id)
    {
        try{
            $user = User::find($id);
            $user->status = 2;
            return route('coordinator.list');
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Desculpe, Aconteceu um problema ao deletar coordenador.');
        }
    }

}
