<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\UserModel;
class Home extends BaseController
{
    private $categories;
    private $products;
    private $user;
    public function __construct(){
        $this->categories = new CategoryModel();
        $this->products = new ProductModel();
        $this->user = new UserModel();
    }
    public function index()
    {
        $data['categories']= $this->categories->findAll();
        $data['products' ]= $this->products->findAll();
        return view('home');
    }
    public function categories($category_id){
        $categories = $this->categories->find($category_id);
        $products = $this->products->where('category_id', $category_id)->findAll();
        $data = [
            'categories' => $categories,
            'products' => $products,
        ];
        return view ('home', $data);

    }
    public function collection()
    {
        return view('include/collection');
    }
    public function special()
    {
        return view('include/special');
    }
    public function blog()
    {
        return view('include/blog');
    }
    public function about()
    {
        return view('include/about');
    }
    public function popular()
    {
        return view('include/popular');
    }
    
}
