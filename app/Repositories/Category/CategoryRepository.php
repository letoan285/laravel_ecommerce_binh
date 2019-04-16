<?php
namespace App\Repositories\Category;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface 
{
    public function getAll(){
        return Category::all();
    }
    public function getOne($id){
        return Category::find($id);
    }
    public function getThree(){
        echo 'hello test';
        return Category::all();
    }
}