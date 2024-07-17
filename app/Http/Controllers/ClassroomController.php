<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\ClassroomStudent;

class ClassroomController extends Controller
{
    public function home()
    {
        try{
            $classrooms = DB::table('classrooms')->paginate(10);
            $categories = DB::table('categories')->get();
            return view('home',compact('classrooms', 'categories'));
        }catch(Exception $e){
            return route('fracasso');
        }
    }
    public function list()
    {
        try{
            $classrooms = DB::table('classrooms')->paginate(10);
            $categories = DB::table('categories')->get();
            return view('classroom.list',compact('classrooms','categories'));
        }catch(Exception $e){
            return route('fracasso');
        }
    }
    public function store(Request $request)
    {
        try{
            $classroom = new classroom;
            $classroom->year =  $request->year;
            $classroom->type =  $request->type;
            $classroom->parish =  $request->parish;
            $classroom->save();
            foreach($request->coordinators as $coordinator){
                DB::table('classroom_coordinators')->insert(['user_id' => $coordinator, 'classroom_id' => $classroom->id]);
             }
            return redirect()->route('classroom.list')->with('success', 'Sucesso, Turmas cadastrado com sucesso.');
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Desculpe, Houve um problema ao cadastrar Aluno.');
        }

    }
    public function show(Request $request)
    {
        $categories = DB::table('categories')->get();
        $search=trim($request->get('search'));
        $classrooms=DB::table('classrooms')
        ->select('id','year','parish','type')
        ->where('type','LIKE','%'.$search.'%')
        ->orWhere('parish','LIKE','%'.$search.'%')
        ->orWhere('year','LIKE','%'.$search.'%')
        ->orderBy('parish','asc')
        ->paginate(10);
        return view('classroom.list',compact('classrooms','categories'));
    }
    public function edit(Request $request, $id)
    {
        try{
            $classroom = Classroom::findOrfail($id);
            $classroom->year =  $request->year;
            $classroom->type =  $request->type;
            $classroom->parish =  $request->parish;
            $classroom->save();
            foreach($request->coordinators as $coordinator){
                DB::table('classroom_coordinators')->insert(['user_id' => $coordinator, 'classroom_id' => $id]);
             }
            return redirect()->route('classroom.list');

        }catch(Exception $e){
            return redirect()->back()->with('error', 'Desculpe, Aconteceu um problema ao atualizar turmas.');
        }
    }
    public function lowProfile($id){
        try{
            $classroom = Classroom::find($id);
            $categories = DB::table('categories')->get();
            $users = DB::table('users')->get();
            $coordinators = DB::table('classroom_coordinators')->get();
            $list =DB::table('classroom_coordinators')
                ->select('id','classroom_id','user_id')
                ->where('classroom_id','LIKE','%'.$id.'%')
                ->orderBy('id','asc')
                ->get();
            return view('classroom.profile',compact('categories','coordinators','classroom', 'users'));
        }catch(Exception){
            return redirect()->back()->with('error', 'Desculpe, erro ao acessar perfil.');
        }
    }
    public function profile($id)
    {
        try{
            $classroom = Classroom::find($id);
            $categories = DB::table('categories')->get();
            $users = DB::table('users')->get();
            $coordinators = DB::table('classroom_coordinators')->get();
            return view('classroom.edit',compact('categories','coordinators','classroom', 'users'));
        }catch(Exception){
            return redirect()->back()->with('error', 'Desculpe, erro ao acessar perfil.');
        }
    }

    public function studentList($id)
    {
        try{
            $students = DB::table('students')->paginate(10);
            $classrooms = DB::table('classroom_students') ->select('id','classroom_id','student_id')
                ->where('classroom_id','LIKE','%'.$id.'%')->get();
            return view('classroom.studentList',compact('classrooms','students','id'));
        }catch(Exception $e){
            return route('fracasso');
        }
    }

    public function studentSearch(Request $request)
    {
        $id = $request->id;
        $search=trim($request->get('search'));
        $students=DB::table('students')
            ->select('id','name','status')
            ->where('name','LIKE','%'.$search.'%')
            ->orWhere('identification','LIKE','%'.$search.'%')
            ->orWhere('phone','LIKE','%'.$search.'%')
            ->orderBy('status','desc')
            ->paginate(10);
        $classrooms = DB::table('classroom_students') ->select('id','classroom_id','student_id')
            ->where('classroom_id','LIKE','%'.$id.'%')->get();
        return view('classroom.studentList',compact('classrooms','students','id'));
    }
    public function create()
    {
        try{
            $categories = DB::table('categories')->get();
            $coordinators = DB::table('users')->get();
            return view('classroom.add',compact('categories','coordinators'));
        }catch(Exception $e){
            return route('fracasso');
        }
    }
    public function destroy(string $id)
    {
        $classroom = Classroom::find($id);
        $classroom->status = 4;
        return route("classroom.list");
    }
    public function addStudent($id)
    {
        try{
            $students = DB::table('students')->orderBy('created_at','desc')->Paginate(10);
            $list =DB::table('classroom_students')
                ->select('id','classroom_id','student_id')
                ->where('classroom_id','LIKE','%'.$id.'%')
                ->orderBy('id','asc')
                ->paginate(10);
            $classroom = Classroom::find($id);

            return view('classroom.addStudent',compact('students','classroom', 'list'));
        }catch(Exception){
            return route('fracasso');
        }
    }
    public function register($id, $student)
    {
        $list = ClassroomStudent::get();
        try{
            foreach ($list as $item){
                if($item->student_id == $student){
                    $students = DB::table('students')->orderBy('created_at','desc')->Paginate(10);
            $list =DB::table('classroom_students')
                ->select('id','classroom_id','student_id')
                ->where('classroom_id','LIKE','%'.$id.'%')
                ->orderBy('id','asc')
                ->paginate(10);
            $classroom = Classroom::find($id);

            return view('classroom.addStudent',compact('students','classroom', 'list'));
                }
            }
            DB::table('classroom_students')->insert(['student_id' => $student, 'classroom_id' => $id]);
            $students = DB::table('students')->orderBy('created_at','desc')->Paginate(10);
            $list =DB::table('classroom_students')
                ->select('id','classroom_id','student_id')
                ->where('classroom_id','LIKE','%'.$id.'%')
                ->orderBy('id','asc')
                ->paginate(10);
            $classroom = Classroom::find($id);

            return view('classroom.addStudent',compact('students','classroom', 'list'));
        }catch(Exception){
            return route('fracasso');
        }
    }
    public function remove($id, $student)
    {
        $list = ClassroomStudent::get();
        try{
            foreach ($list as $item){
                if($item->student_id == $student){
                    DB::table('classroom_students')->where('student_id','LIKE','%'.$student.'%')->delete();
                    $students = DB::table('students')->orderBy('created_at','desc')->Paginate(10);
                    $list =DB::table('classroom_students')
                    ->select('id','classroom_id','student_id')
                    ->where('classroom_id','LIKE','%'.$id.'%')
                    ->orderBy('id','asc')
                    ->paginate(10);
                    $classroom = Classroom::find($id);

            return view('classroom.addStudent',compact('students','classroom', 'list'));
                }
            }
            return redirect()->back()->with('error', 'Erro');
        }catch(Exception){
            return route('fracasso');
        }
    }

    public function searchClass(Request $request)
    {
        try{
            $search=trim($request->get('search'));
            $id=trim($request->get('id'));
            $students=DB::table('students')
                ->select('id','name','status')
                ->where('name','LIKE','%'.$search.'%')
                ->orWhere('identification','LIKE','%'.$search.'%')
                ->orWhere('phone','LIKE','%'.$search.'%')
                ->orderBy('created_at','desc')
                ->paginate(10);
            $list =DB::table('classroom_students')
                ->select('id','classroom_id','student_id')
                ->where('classroom_id','LIKE','%'.$id.'%')
                ->orderBy('id','asc')
                ->paginate(10);
            $classroom = Classroom::find($id);
            return view('classroom.addStudent',compact('students','classroom', 'list'));
        }catch(Exception){
            return redirect()->back()->with('error', 'Erro');
        }
    }
}
