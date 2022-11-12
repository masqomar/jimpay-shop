<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Http\Requests\{StoreCategoryRequest, UpdateCategoryRequest};
use Yajra\DataTables\Facades\DataTables;
use Image;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view category')->only('index', 'show');
        $this->middleware('permission:create category')->only('create', 'store');
        $this->middleware('permission:edit category')->only('edit', 'update');
        $this->middleware('permission:delete category')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $categories = Category::query();

            return Datatables::of($categories)
                
                ->addColumn('icon', function ($row) {
                    if ($row->icon == null) {
                        return 'https://via.placeholder.com/350?text=No+Image+Avaiable';
                    }

                    return asset('storage/uploads/icons/' . $row->icon);
                })

                ->addColumn('action', 'categories.include.action')
                ->toJson();
        }

        return view('categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $attr = $request->validated();

        if ($request->file('icon') && $request->file('icon')->isValid()) {

            $path = storage_path('app/public/uploads/icons/');
            $filename = $request->file('icon')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('icon')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            $attr['icon'] = $filename;
        }

        Category::create($attr);

        return redirect()
            ->route('categories.index')
            ->with('success', __('Category created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $attr = $request->validated();

        if ($request->file('icon') && $request->file('icon')->isValid()) {

            $path = storage_path('app/public/uploads/icons/');
            $filename = $request->file('icon')->hashName();

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            Image::make($request->file('icon')->getRealPath())->resize(500, 500, function ($constraint) {
                $constraint->upsize();
				$constraint->aspectRatio();
            })->save($path . $filename);

            // delete old icon from storage
            if ($category->icon != null && file_exists($path . $category->icon)) {
                unlink($path . $category->icon);
            }

            $attr['icon'] = $filename;
        }

        $category->update($attr);

        return redirect()
            ->route('categories.index')
            ->with('success', __('Category updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            $path = storage_path('app/public/uploads/icons/');

            if ($category->icon != null && file_exists($path . $category->icon)) {
                unlink($path . $category->icon);
            }

            $category->delete();

            return redirect()
                ->route('categories.index')
                ->with('success', __('Category deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()
                ->route('categories.index')
                ->with('error', __('The Category can`t be deleted because it is related to another table.'));
        }
    }
}
