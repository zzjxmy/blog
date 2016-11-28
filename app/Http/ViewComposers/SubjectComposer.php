<?php

namespace App\Http\ViewComposers;

use App\Model\Subject;
use Illuminate\View\View;

class SubjectComposer{
    public function compose(View $view){
        $subjects = session('subjects');
        if(!$subjects){
            $subjects = Subject::withCount('blogs')->get(['id','name']);
            session()->set('subjects',$subjects);
        }
        $view->with(['subjects' => $subjects]);
    }
}