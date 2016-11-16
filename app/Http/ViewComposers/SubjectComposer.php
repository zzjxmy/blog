<?php

namespace App\Http\ViewComposers;

use App\Model\Subject;
use Illuminate\View\View;

class SubjectComposer
{
    public function compose(View $view)
    {
        $subjects = Subject::withCount('blogs')->get(['name']);
        $view->with(['subjects' => $subjects]);
    }
}