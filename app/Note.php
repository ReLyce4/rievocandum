<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Note extends Model
{
    public function storage($fileName, $editorData, $userId) {
        Storage::put('notes/'.$userId.'/'.$fileName, $editorData);
        //DB::table('notes')->where([''])
    }

    public function fileNameExists($fileName, $userId) {
        $fileNameExists = DB::table('notes')->where(['file_name' => $fileName], ['user_id' => $userId])->value('id');
        if(isset($fileNameExists) && Storage::disk('local')->exists('notes/'.$userId.'/'.$fileName)) {
            return true;
        } elseif(Storage::disk('local')->exists('notes/'.$userId.'/'.$fileName)) {
            $this->create($fileName, $userId);
            return true;
        } elseif (isset($fileNameExists)) {
            $this->remove($fileName, $userId);
            return false;
        } else {
            return false;
        }
    }

    public function create($fileName, $userId) {
        DB::table('notes')->insert(
            ['file_name' => $fileName, 'user_id' => $userId]
        );
        if(!(Storage::disk('local')->exists('notes/'.$userId.'/'.$fileName))) {
            $this->storage($fileName, "", $userId);
        }
    }

    public function show($fileName, $userId) {
        return Storage::get('notes/'.$userId.'/'.$fileName);
    }

    public function remove($fileName, $userId) {
        DB::table('notes')->where(['file_name' => $fileName], ['user_id' => $userId])->delete();
    }
}
