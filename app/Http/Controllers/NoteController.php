<?php

namespace App\Http\Controllers;

use App\Note;
use App\Category;
use App\Exceptions\Handler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class NoteController extends Controller
{

    public function addInfo() {
        return view('notes.addInfo');
    }
    /**
    * @param  \Illuminate\Http\Request  $request
    */
    public function write(Request $request)
    {
        $noteModel = new Note();
        $categoryModel = new Category();

        $fileName = $request->input('fileName');
        $category = $request->input('category');
        $userId = Auth::user()->id;

        $data['fileName'] = $fileName;
        
        if($noteModel->fileNameExists($fileName, $userId)) {
            $data['editorData'] = $noteModel->show($fileName, $userId);
            $data['category'] = $categoryModel->getCategoryByFileName($fileName);
            return view('notes.write', $data)->withErrors(['msg' => 'Esiste già una nota con questo nome']);
        } else {
            $categoryModel->create($category);
            $data['category'] = $category;
            $categoryId = $categoryModel->getId($category);
            $noteModel->create($fileName, $userId, $categoryId);
            return view('notes.write', $data);
        }
    }

    public function open($fileName) {
        $noteModel = new Note();
        $categoryModel = new Category();

        $userId = Auth::user()->id;
        $data['fileName'] = $fileName;
        
        if($noteModel->fileNameExists($fileName, $userId)) {
            $data['editorData'] = $noteModel->show($fileName, $userId);
            $data['category'] = $categoryModel->getCategoryByFileName($fileName);
            return view('notes.write', $data);
        } else {
            return back()->withErrors(['msg' => 'Il file non esiste']);
        }
    }

    /**
    *@param  \Illuminate\Http\Request  $request
    */
    public function search(Request $request) {
        $noteModel = new Note();

        $fileName = $request->fileName;
        if(isset($request->userId)) {
            $userId = Auth::user()->id;
            $data['list'] = $noteModel->search($fileName, $userId);
            return view('notes.list', $data);
        } else {
            $data['list'] = $noteModel->search($fileName);
            return view('notes.list', $data);
        }
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
        $userId = Auth::user()->id;

        $noteModel = new Note();

        $noteModel->storage($fileName, $editorData, $userId);

        return date('d F Y H:i:s');
    }

    public function list() {
        $noteModel = new Note();
        $data['list'] = $noteModel->search(null, Auth::user()->id);
        return view('notes.list', $data);
    }
}
