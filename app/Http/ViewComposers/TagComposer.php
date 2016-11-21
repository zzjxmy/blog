<?php

namespace App\Http\ViewComposers;

use App\Model\Tag;
use Illuminate\View\View;

class TagComposer
{
    public function compose(View $view)
    {
        $tags = Tag::withCount('blogs')->get(['name']);
        $view->with(['tags' => $tags]);
    }
}