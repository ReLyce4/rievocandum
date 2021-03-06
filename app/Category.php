<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    public function create($category) {
        if(DB::table('categories')->where('category', $category)->value('id') == null) {
            DB::table('categories')->insert(['category' => $category]);
        }
    }

    public function getIdByCategory($category) {
        return DB::table('categories')->where('category', $category)->value('id');
    }

    public function getCategoryByFileName($fileName, $fileType) {
        if($fileType == "note"){
            $categoryId = DB::table('notes')->where('file_name', $fileName)->value('category_id');
            return DB::table('categories')->where('id', $categoryId)->value('category');
        } else if($fileType == "flashcard") {
            $categoryId = DB::table('flashcards')->where('file_name', $fileName)->value('category_id');
            return DB::table('categories')->where('id', $categoryId)->value('category');
        }
    }

    public function notes() {
        return $this->hasMany('App\Note');
    }
}
