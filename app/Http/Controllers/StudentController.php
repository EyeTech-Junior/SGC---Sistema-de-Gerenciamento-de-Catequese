<?php

namespace App\Http\Controllers;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\View\View;

class StudentController extends Controller
{
    public function list()
    {
        try{
            $students = DB::table('students')->orderBy('status','desc')->Paginate(10);
            return view('student.list',compact('students'));
        }catch(Exception){
            return route('fracasso');
        }
    }
    public function show(Request $request):view
    {
        $search=trim($request->get('search'));
        $students=DB::table('students')
        ->select('id','name','status')
        ->where('name','LIKE','%'.$search.'%')
        ->orWhere('identification','LIKE','%'.$search.'%')
        ->orWhere('phone','LIKE','%'.$search.'%')
        ->orderBy('status','desc')
        ->paginate(10);
        return view('student.list',compact('students'));
    }
    public function edit(Request $request, $id):string
    {

        try{
            $student = Student::findOrfail($id);
            $student->name =  $request->name;
            $student->phone =  $request->phone;
            $student->identification =  $request->identification;
            $student->padrinho =  $request->padrinho;
            $student->status = $request->status;
            $student->observation = $request->observation;
            $student->address = $request->address;
            $student->madrinha =  $request->madrinha;
            $student->email =  $request->email;
            if(!empty($request->file)){
                $request->validate([
                    'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:10240'
                    ]);

                    if($request->file()) {
                        $fileName = time().'_'.$request->file->getClientOriginalName();
                        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                        $student->nameFile = time().'_'.$request->file->getClientOriginalName();
                        $student->file_path = '/storage/' . $filePath;

                    }
            }
            $student->save();
            return redirect()->route('student.list')->with('success','Sucesso.');

           }catch(Exception $e){
            return redirect()->back()->with('error', 'Erro');
        }

    }

    public function lowProfile($id){
        try{
            $student = Student::find($id);
            return view('student.profile',compact('student'));
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Desculpe, erro ao acessar perfil.');
        }
    }
    public function profile($id)
    {
        try{
            $student = Student::find($id);
            return view('student.edit',compact('student'));
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Desculpe, Aconteceu um problema ao atualizar aluno.');
        }
    }
    public function create(Request $request)
    {
        try{
            return view('student.add');
        }catch(Exception $e){
            return route('fracasso');
        }

    }
    public function store(Request $request)
    {

        try{
            $request->validate([
                'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:10240'
            ]);
            $student = new Student;
            if($request->file()) {
                $fileName = time().'_'.$request->file->getClientOriginalName();
                $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                $student->nameFile = time().'_'.$request->file->getClientOriginalName();
                $student->file_path = '/storage/' . $filePath;
                $student->name =  $request->name;
                $student->phone =  $request->phone;
                $student->identification =  $request->identification;
                $student->padrinho =  $request->padrinho;
                $student->madrinha =  $request->madrinha;
                $student->email =  $request->email;
                $student->address =  $request->address;
                $student->observation =  $request->observation;
                $student->save();
            }
            return redirect()->route('student.list')->with('success','Sucesso.');
        }catch(Exception){
            return back()->with('error','Erro no cadastro.');
        }

    }
    public function registro()
    {
        return view('register');
    }
    public function download(Request $request)
    {
        $pdf = "../storage/app/public/uploads/";
        $pdf .= $request->nameFile;
        return response()->file($pdf);
    }


    public function registrar(Request $request):string
    {
        try{
            $request->validate([
                'file' => 'required|mimes:pdf|max:10240'
                ]);
                $student = new Student;
                if($request->file()) {
                    $fileName = time().'_'.$request->file->getClientOriginalName();
                    $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
                    $student->nameFile = time().'_'.$request->file->getClientOriginalName();
                    $student->file_path = '/storage/' . $filePath;
                    $student->name =  $request->name;
                    $student->phone =  $request->phone;
                    $student->identification =  $request->identification;
                    $student->padrinho =  $request->padrinho;
                    $student->madrinha =  $request->madrinha;
                    $student->email =  $request->email;
                    $student->save();

                }
            return back()->with('success','Sucesso.');
           }catch(Exception){
            return back()->with('error','Erro no cadastro.');
        }
    }

    public function destroy(string $id):string
    {
        $student = Student::find($id);
        $student->status = 4;
        return route("student.list");
    }
}
