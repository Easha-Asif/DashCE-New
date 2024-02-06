<?php

namespace App\Repositories\User\Content;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentRepositories
{
    public function index()
    {
        $categories['terms_condition_title'] = Content::where('name', 'terms_condition_title')->first();
        $categories['terms_condition_paragraph'] = Content::where('name', 'terms_condition_paragraph')->first();

        $categories['about_us_title'] = Content::where('name', 'about_us_title')->first();
        $categories['about_us_paragraph'] = Content::where('name', 'about_us_paragraph')->first();

        if ($categories['terms_condition_title']) {
            $categories['terms_condition_title'] = $categories['terms_condition_title']->value;
        } else {
            $categories['terms_condition_title'] = '';
        }

        if ($categories['terms_condition_paragraph']) {
            $categories['terms_condition_paragraph'] = $categories['terms_condition_paragraph']->value;
        } else {
            $categories['terms_condition_paragraph'] = '';
        }

        if ($categories['about_us_title']) {
            $categories['about_us_title'] = $categories['about_us_title']->value;
        } else {
            $categories['about_us_title'] = '';
        }

        if ($categories['about_us_paragraph']) {
            $categories['about_us_paragraph'] = $categories['about_us_paragraph']->value;
        } else {
            $categories['about_us_paragraph'] = '';
        }

        return $cate = $categories;

    }
}
