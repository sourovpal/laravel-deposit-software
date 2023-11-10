<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        return view('backend.product.index');
    }
    
    public function create(Request $request){
        return view('backend.product.create');
    }

    public function store(Request $request){
        
    }

    public function show(Request $request){
        
    }

    public function edit(Request $request){
        
    }

    public function update(Request $request){
        
    }

    public function destroy(Request $request){
        
    }
}
    