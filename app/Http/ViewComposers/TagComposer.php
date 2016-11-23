<?php

namespace App\Http\ViewComposers;

use App\Model\Tag;
use Illuminate\View\View;

class TagComposer
{
    public function compose(View $view)
    {
        $tags = session('tags');
        if(!$tags){
            $tags = Tag::withCount('blogs')->get(['id','name']);
            session()->set('tags',$tags);
        }
        $view->with(['tags' => $tags]);
    }
}