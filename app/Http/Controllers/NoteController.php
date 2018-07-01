<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function addInfo()
    {
        return view('notes.addInfo');
    }

    /**
    * @param  \Illuminate\Http\Request  $request
    */
    public function write(Request $request)
    {
        $note = new note();
        $fileName = $request->input('fileName');
        $userId = Auth::user()->id;
        $data['fileName'] = $fileName;
        if($note->fileNameExists($fileName, $userId)) {
            $data['editorData'] = $note->show($fileName, $userId);
            return view('notes.write', $data)->withErrors(['msg' => 'Esiste già una nota con questo nome']);
        } else {
            $note->create($fileName, $userId);
            return view('notes.write', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        $fileName = $request->input('fileName');
        $editorData = $request->input('editorData');
        //$fileName = "a";
        //$editorData = "<p>b</p>";
        $userId = Auth::user()->id;
        $note = new Note();
        $note->storage($fileName, $editorData, $userId);
        return date('d F Y H:i:s');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
