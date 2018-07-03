<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Flashcard extends Model
{
    public function storage($fileName, $editorDataFront, $editorDataBack, $userId) {
        Storage::put('flashcards/'.$userId.'/front/'.$fileName, $editorDataFront);
        Storage::put('flashcards/'.$userId.'/back/'.$fileName, $editorDataBack);
    }

    public function fileNameExists($fileName, $userId, $categoryId) {
        $fileNameExists = DB::table('flashcards')->where([
            ['file_name', '=', $fileName], ['user_id', '=', $userId]
            ])->value('id');
        if(isset($fileNameExists) && Storage::disk('local')->exists('flashcards/'.$userId.'/front/'.$fileName)) {
            return true;
        } elseif(Storage::disk('local')->exists('flashcards/'.$userId.'/front/'.$fileName)) {
            $this->create($fileName, $userId, $categoryId);
            return true;
        } elseif (isset($fileNameExists)) {
            DB::table('flashcards')->where([['file_name', '=', $fileName], ['user_id', '=', $userId]])->delete();
            return false;
        } else {
            return false;
        }
    }

    public function create($fileName, $userId, $categoryId) {
        DB::table('flashcards')->insert(
            ['file_name' => $fileName, 'user_id' => $userId, 'category_id' => $categoryId]
        );
        if(!(Storage::disk('local')->exists('flashcards/'.$userId.'/front/'.$fileName))) {
            $this->storage($fileName, "", "", $userId);
        }
    }

    public function showFront($fileName, $userId) {
        return Storage::get('flashcards/'.$userId.'/front/'.$fileName);
    }

    public function showBack($fileName, $userId) {
        return Storage::get('flashcards/'.$userId.'/back/'.$fileName);
    }

    public function remove($fileName, $userId) {
        DB::table('flashcards')->where([['file_name', '=', $fileName], ['user_id', '=', $userId]])->delete();
        Storage::delete('flashcards/'.$userId.'/front/'.$fileName);
        Storage::delete('flashcards/'.$userId.'/back/'.$fileName);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function search($fileName = null, $userId = null) {
        if(isset($userId)) {
            return DB::table('flashcards')
            ->join('users', 'users.id', '=', 'flashcards.user_id')
            ->join('categories', 'categories.id', '=', 'flashcards.category_id')
            ->select('flashcards.user_id', 'flashcards.file_name', 'users.name', 'categories.category', 'flashcards.category_id', 'flashcards.created_at', 'flashcards.updated_at')->where([
                ['flashcards.user_id', '=', $userId], ['file_name', 'like', '%'.$fileName.'%']
                ])->orderBy('file_name', 'asc')->paginate(10);
        } else {
            return DB::table('flashcards')
            ->join('users', 'users.id', '=', 'flashcards.user_id')
            ->join('categories', 'categories.id', '=', 'flashcards.category_id')
            ->select('flashcards.user_id', 'flashcards.file_name', 'users.name', 'categories.category', 'flashcards.category_id', 'flashcards.created_at', 'flashcards.updated_at')->where([
                ['file_name', 'like', '%'.$fileName.'%']
                ])->orderBy('file_name', 'asc')->paginate(10);
        }
    }
}
