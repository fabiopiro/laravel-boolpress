<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//
use App\Category;

class CategoryController extends Controller
{
    public function show($id) {
        // 1) recuperare la Categoria con quell'id
        $category = Category::findOrFail($id);
        // 2) passarla alla vista di Categoria
        // creo show.blade.php in views/admin/categories
        // manca la rotta
        // web.php
        return view('admin.categories.show', compact('category'));
    }
}
