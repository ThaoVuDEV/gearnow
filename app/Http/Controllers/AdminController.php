<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Admin/Dashboard');
    }
     public function listUser()
    {
        $users = User::get();
        return Inertia::render('Admin/ListUser', [
            'users' => $users,
        ]);
    }

    public function listCategory()
    {
        $categories = Category::get();
        return Inertia::render('Admin/ListCategory', [
            'categories' => $categories,
        ]);
    }

    public function createCategory()
    {
        return Inertia::render('Admin/CreateCategory');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('categoryManager');
    }

    public function editCategory(Category $category)
    {
        return Inertia::render('Admin/EditCategory', [
            'category' => $category,
        ]);
    }

    public function updateCategory(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);

        return redirect()->route('categoryManager');
    }

    public function destroyCategory(Category $category)
    {
        $category->delete();

        return redirect()->route('categoryManager');
    }


    public function listProduct()
    {
        $products = Product::get();
        return Inertia::render('Admin/ListProduct', [
            'products' => $products,
        ]);
    }

    public function createProduct()
    {
        $categories = Category::get();
        return Inertia::render('Admin/CreateProduct', [
            'categories' => $categories,
        ]);
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        Product::create($request->all());

        return redirect()->route('productManager');
    }

    public function editProduct(Product $product)
    {
        $categories = Category::get();
        return Inertia::render('Admin/EditProduct', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function updateProduct(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($request->all());

        return redirect()->route('productManager');
    }

    public function destroyProduct(Product $product)
    {
        $product->delete();

        return redirect()->route('productManager');
    }
}
