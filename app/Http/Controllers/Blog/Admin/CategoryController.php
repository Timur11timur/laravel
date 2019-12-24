<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryCreateRequest;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Support\Str;

class CategoryController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginatedItems = BlogCategory::paginate(15);

        return view('blog.admin.categories.index', ['items' => $paginatedItems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategory();
        $categoryList = BlogCategory::all();

        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BlogCategoryCreateRequest  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data = $request->input();
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title'], '-');
        }

        $item = new BlogCategory($data);
        $result = $item->save();

        if($result) {
            return redirect()->route('blog.admin.categories.index')->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => "Ошибка сохранения"])->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  BlogCategoryRepository $categoryRepositiry
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id, BlogCategoryRepository $categoryRepositiry)
    {
        //$categoryRepositiry = new BlogCategoryRepository();
        //$categoryRepositiry = app(BlogCategoryRepository::class);

        //$item = BlogCategory::findOrFail($id);
        //$categoryList = BlogCategory::all();

        $item = $categoryRepositiry->getEdit($id);
        if(empty($item)) {
            abort( 404);
        }

        $categoryList = $categoryRepositiry->getForComboBox();

        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BlogCategoryUpdateRequest  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {
        /*$rules = [
            'title'         => 'required|min:5|max:200',
            'slug'          => 'max:200',
            'description'   => 'string|min:3|max:500',
            'parent_id'     => 'required|integer|exists:blog_categories,id',
        ];*/

        //$validatedData = $this->validate($request, $rules);

        //$validatedData = $request->validate($rules);

        $item = BlogCategory::find($id);
        if(empty($item)) {
            return back()->withErrors(['msg' => "Запись с id=$id  не найдена"])->withInput();
        }

        $data = $request->all();

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title'], '-');
        }

        //$result = $item->fill($data)->save();
        $result = $item->update($data);

        if($result) {
            return redirect()->route('blog.admin.categories.index')->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => "Ошибка сохранения"])->withInput();
        }
    }
}
