<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Symfony\Component\HttpFoundation\Session\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::orderBy('name', 'asc')->paginate(4);
        
        return view('admin.categories.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::orderBy('name', 'asc')->get(); 
        return view('admin.categories.tambah', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $data = new Category;
        $data->name = $request->name;
        $data->slug = Str::slug($data->name);
        $data->parent_id = (int)$request->parent_id;
        $data->save();

        if($data) {
            return redirect()->route('categories.index')->with('success', 'Data Berhasil di ditambahkan');
        }else{
            return redirect()->route('categories.index')->with('error', 'Data gagal di ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $data = Category::findOrFail($id);
        $data->name = $request->name;
        $data->slug = Str::slug($data->name);
        $data->parent_id = 0;

        $data->update();
        if($data) {
            return redirect()->route('categories.index')->with('success', 'Data Berhasil di edit');
        }else{
            return redirect()->back()->with('error', 'Data gagal di edit');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::find($id);
        $data->delete();

        if($data) {
            return redirect()->route('categories.index')->with('success', 'Data Berhasil di hapus');
        }else{
            return redirect()->back()->with('error', 'Data gagal di hapus');
        }
    }
}
