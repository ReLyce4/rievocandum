<?php

namespace App\Http\Controllers;

use App\Flashcard;
use App\User;
use App\Category;
use App\Exceptions\Handler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class FlashcardController extends Controller
{
    public function addInfo() {
        return view('flashcards.addInfo');
    }
    /**
    * @param  \Illuminate\Http\Request  $request
    */
    public function add(Request $request) {
        $flashcardModel = new Flashcard();
        $categoryModel = new Category();

        $data['fileName'] = $request->input('fileName');
        $data['category'] = $request->input('category');
        $categoryId = $categoryModel->getIdByCategory($data['category']);
        $data['editorData'] = $request->input('editorData');



        if($flashcardModel->fileNameExists($data['fileName'], Auth::user()->id, $categoryId)) {
            return back()->withErrors(['msg' => 'Nome file in uso']);
        } else {
            $flashcardModel->create($data['fileName'], Auth::user()->id, $categoryId);
            return view('flashcards.write', $data);
        }
    }

    public function remove(Request $request) {
        $data['fileName'] = $request->input('fileName');
        if($request->isMethod('post')) {
            $flashcardModel = new Flashcard();
            $flashcardModel->remove($data['fileName'], Auth::user()->id);
            return redirect('flashcard/list/'.Auth::user()->name);
        } elseif(isset($data['fileName'])) {
            return view('flashcards.remove', $data);
        } else {
            return abort('404');
        }
    }

    /**
    * @param  \Illuminate\Http\Request  $request
    */
    public function write(Request $request)
    {
        $flashcardModel = new Flashcard();
        $categoryModel = new Category();

        $fileName = $request->input('fileName');
        $category = $request->input('category');
        $categoryId = $categoryModel->getIdByCategory($category);
        $userId = Auth::user()->id;

        $data['fileName'] = $fileName;
        if($flashcardModel->fileNameExists($fileName, $userId, $categoryId)) {
            $data['editorDataFront'] = $flashcardModel->showFront($fileName, $userId);
            $data['editorDataBack'] = $flashcardModel->showBack($fileName, $userId);
            $data['category'] = $categoryModel->getCategoryByFileName($fileName);
            return view('flashcards.write', $data)->withErrors(['msg' => 'Apertura flashcard']);
        } else {
            $categoryModel->create($category);
            $data['category'] = $category;
            $categoryId = $categoryModel->getIdByCategory($category);
            $flashcardModel->create($fileName, $userId, $categoryId);
            return view('flashcards.write', $data);
        }
    }

    public function view(Request $request) {
        $flashcardModel = new Flashcard();
        $categoryModel = new Category();

        $userId = $request->input('userId');
        $data['fileName'] = $request->input('fileName');
        $data['category'] = $request->input('category');
        
        if($flashcardModel->fileNameExists($data['fileName'], $userId, $data['category'])) {
            $data['editorDataFront'] = $flashcardModel->showFront($data['fileName'], $userId);
            $data['editorDataBack'] = $flashcardModel->showBack($data['fileName'], $userId);
            $data['category'] = $categoryModel->getCategoryByFileName($data['fileName']);
            return view('flashcards.view', $data);
        } else {
            return back()->withErrors(['msg' => 'Il file non esiste']);
        }
    }

    /**
    *@param  \Illuminate\Http\Request  $request
    */
    public function search(Request $request) {
        $flashcardModel = new Flashcard();

        $fileName = $request->fileName;
        if(isset($request->userId)) {
            $data['userId'] = $request->userId;
            $data['list'] = $flashcardModel->search($fileName, $data['userId']);
            return view('flashcards.list', $data);
        } else {
            $data['list'] = $flashcardModel->search($fileName);
            return view('flashcards.list', $data);
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
        $editorDataFront = $request->input('editorDataFront');
        $editorDataBack = $request->input('editorDataBack');
        $userId = Auth::user()->id;

        $flashcardModel = new Flashcard();

        $flashcardModel->storage($fileName, $editorDataFront, $editorDataBack, $userId);

        date_default_timezone_set('Europe/Rome');
        return date('d F Y H:i');
    }

    public function list($name) {
        $flashcardModel = new Flashcard();
        $userModel = new User();
        $data['userId'] = $userModel->getIdByName($name);
        $data['list'] = $flashcardModel->search(null, $data['userId']);
        return view('flashcards.list', $data);
    }
}
