<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\TestFixture\C;

class CategoriesController extends Controller
{

    public function main() {
        $objCategories = new Category();
        $objCategories = $objCategories->get();
        return view('Admin.main');
    }

    public function Categories() {
        $objCategories = new Category();
        $objCategories = $objCategories->get();
        return view('Admin.Categories.main', ['categories' => $objCategories]);
    }

    public function addCategories() {
        return view('Admin.Categories.add');
    }

    public function addCategoriesRequest(Request $request) {
        $objCategories = new Category();
        $objCategories = $objCategories->create([
            'title' => $request->input('title'),
            'description' => $request->input('description')
        ]);
//            return "Категория изменена";
        return redirect()->route('adminCategories');
    }

    public function editCategories(int $id)
    {
        $objCategories = Category::find($id);
        return view('Admin.Categories.edit', ['categories' => $objCategories]);
    }

    public function editCategoriesRequest(Request $request, int $id) {
        $objCategories = Category::find($id);
        if (!$objCategories) {
            return 'ОШИБКА';
        }

        $objCategories->title = $request->input('title');
        $objCategories->description = $request->input('description');

        if ($objCategories->save()) {
            return redirect()->route('categories');
        }
    }

    public function deleteCategories(Request $request)
    {
        if($request->ajax()) {
            $id = (int)$request->input('id');
            $objCategories = new Category();

            $objCategories->where('id', $id)->delete();

        }
    }

}
