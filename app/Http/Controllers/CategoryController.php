<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $categories = DB::table('categories')->paginate(10);
            return view('category.list',compact('categories'));
        }catch(Exception $e){
            return route('fracasso');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try{
            return view('category.add');
        }catch(Exception $e){
            return route('fracasso');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->name == null){
            return redirect()->back()->with('error', 'error');
        }else {
            try {
                $category = new Category;
                $category->name = $request->name;
                $category->description = $request->description;
                $category->save();
                return redirect()->route('category.index')->with('success', 'Sucesso.');
            } catch (Exception) {
                return redirect()->back()->with('error', 'error');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
    }
    public function search(Request $request)
    {
        $search=trim($request->get('search'));
        $categories=DB::table('categories')
        ->select('id','name','description','type')
        ->where('name','LIKE','%'.$search.'%')
        ->orWhere('description','LIKE','%'.$search.'%')
        ->orderBy('created_at','desc')
        ->paginate(10);
        return view('category.list',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try{
            $category = category::find($id);
            return view('category.edit',compact('category'));
        }catch(Exception){
            return redirect()->back()->with('error', 'error');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if ($request->name == null){
            return redirect()->back()->with('error', 'Desculpe, Aconteceu um problema ao atualizar turmas.');
        }else {
            try {
                $category->name = $request->name;
                $category->type = $request->type;
                $category->description = $request->description;
                $category->save();
                return redirect()->route('category.index');

            } catch (Exception $e) {
                return redirect()->back()->with('error', 'Desculpe, Aconteceu um problema ao atualizar turmas.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
