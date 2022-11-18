<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //
    public function sections()
    {
        $sections = Section::get();
        $title = 'Sections';
        $description = 'A list of all sections in this app';
        return view(
            'admin.sections.sections',
            compact(
                'sections',
                'title',
                'description'
            )
        );
    }
}
