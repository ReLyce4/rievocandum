<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Note extends Model
{
    public function storage($fileName, $editorData, $userId) {
        Storage::put('notes/'.$userId.'/'.$fileName, $editorData);
    }

    public function fileNameExists($fileName, $userId) {
        $fileNameExists = DB::table('notes')->where([
            ['file_name', '=', $fileName], ['user_id', '=', $userId]
            ])->value('id');
        if(isset($fileNameExists) && Storage::disk('local')->exists('notes/'.$userId.'/'.$fileName)) {
            return true;
        } elseif(Storage::disk('local')->exists('notes/'.$userId.'/'.$fileName)) {
            $this->create($fileName, $userId);
            return true;
        } elseif (isset($fileNameExists)) {
            DB::table('notes')->where([['file_name', '=', $fileName], ['user_id', '=', $userId]])->delete();
            return false;
        } else {
            return false;
        }
    }

    public function create($fileName, $userId, $categoryId) {
        DB::table('notes')->insert(
            ['file_name' => $fileName, 'user_id' => $userId, 'category_id' => $categoryId]
        );
        if(!(Storage::disk('local')->exists('notes/'.$userId.'/'.$fileName))) {
            $this->storage($fileName, "", $userId);
        }
    }

    public function show($fileName, $userId) {
        return Storage::get('notes/'.$userId.'/'.$fileName);
    }

    public function remove($fileName, $userId) {
        DB::table('notes')->where([['file_name', '=', $fileName], ['user_id', '=', $userId]])->delete();
        Storage::delete('notes/'.$userId.'/'.$fileName);
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
            return DB::table('notes')
            ->join('users', 'users.id', '=', 'notes.user_id')
            ->join('categories', 'categories.id', '=', 'notes.category_id')
            ->select('notes.user_id', 'notes.file_name', 'users.name', 'categories.category', 'notes.category_id', 'notes.created_at', 'notes.updated_at')->where([
                ['notes.user_id', '=', $userId], ['file_name', 'like', '%'.$fileName.'%']
                ])->orderBy('file_name', 'asc')->paginate(10);
        } else {
            return DB::table('notes')
            ->join('users', 'users.id', '=', 'notes.user_id')
            ->join('categories', 'categories.id', '=', 'notes.category_id')
            ->select('notes.user_id', 'notes.file_name', 'users.name', 'categories.category', 'notes.category_id', 'notes.created_at', 'notes.updated_at')->where([
                ['file_name', 'like', '%'.$fileName.'%']
                ])->orderBy('file_name', 'asc')->paginate(10);
        }
    }
}
