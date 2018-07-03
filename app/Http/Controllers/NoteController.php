<?php

namespace App\Http\Controllers;

use App\Note;
use App\User;
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
    public function add(Request $request) {
        $noteModel = new Note();
        $categoryModel = new Category();

        $data['fileName'] = $request->input('fileName');
        $data['category'] = $request->input('category');
        $categoryId = $categoryModel->getIdByCategory($data['category']);
        $data['editorData'] = $request->input('editorData');

        if($noteModel->fileNameExists($data['fileName'], Auth::user()->id, $categoryId)) {
            return back()->withErrors(['msg' => 'Nome file in uso']);
        } else {
            $noteModel->create($data['fileName'], Auth::user()->id, $categoryId);
            return view('notes.write', $data);
        }
    }

    public function remove(Request $request) {
        $data['fileName'] = $request->input('fileName');
        if($request->isMethod('post')) {
            $noteModel = new Note();
            $noteModel->remove($data['fileName'], Auth::user()->id);
            return redirect('note/list/'.Auth::user()->name);
        } elseif(isset($data['fileName'])) {
            return view('notes.remove', $data);
        } else {
            return abort('404');
        }
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
        $categoryId = $categoryModel->getIdByCategory($category);
        $userId = Auth::user()->id;

        $data['fileName'] = $fileName;
        
        if($noteModel->fileNameExists($fileName, $userId, $categoryId)) {
            $data['editorData'] = $noteModel->show($fileName, $userId);
            $data['category'] = $categoryModel->getCategoryByFileName($fileName, "note");
            return view('notes.write', $data)->withErrors(['msg' => 'Apertura nota']);
        } else {
            $categoryModel->create($category);
            $data['category'] = $category;
            $categoryId = $categoryModel->getIdByCategory($category);
            $noteModel->create($fileName, $userId, $categoryId);
            return view('notes.write', $data);
        }
    }

    public function view(Request $request) {
        $noteModel = new Note();
        $categoryModel = new Category();

        $userId = $request->input('userId');
        $data['fileName'] = $request->input('fileName');
        $data['category'] = $request->input('category');
        
        if($noteModel->fileNameExists($data['fileName'], $userId, $data['category'])) {
            $data['editorData'] = $noteModel->show($data['fileName'], $userId);
            $data['category'] = $categoryModel->getCategoryByFileName($data['fileName'], "note");
            return view('notes.view', $data);
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
            $data['userId'] = $request->userId;
            $data['list'] = $noteModel->search($fileName, $data['userId']);
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

        date_default_timezone_set('Europe/Rome');
        return date('d F Y H:i');
    }

    public function list($name) {
        $noteModel = new Note();
        $userModel = new User();
        $data['userId'] = $userModel->getIdByName($name);
        $data['list'] = $noteModel->search(null, $data['userId']);
        return view('notes.list', $data);
    }
}
