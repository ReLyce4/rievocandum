<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class Note extends Model
{
    public function storage($editorFileName, $editorData, $userName) {
        $userId = DB::table('users')->where('name', $userName)->value('id');
        $ExistsFileName = DB::table('notes')->where('file_name', $editorFileName)->value('id');
        if(!isset($ExistsFileName)) {
            DB::table('notes')->insert(
                ['file_name' => $editorFileName, 'user_id' => $userId]
            );
        }
        Storage::put('notes/'.$userId.'/'.$editorFileName, $editorData);
    }
}
