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

    public function changeSectionStatus($id)
    {
        $section = Section::find($id);
        // dd($section->section_name);
        if ($section->status == 0) {
            $section::where('id', $id)->update(
                ['status' => 1,]
            );
            return redirect()->back()->with('success', 'STATUS CHANGED: section is now active');
        }

        $section::where('id', $id)->update(
            ['status' => 0,]
        );
        return redirect()->back()->with('warning', 'STATUS CHANGED: section is now in-active');
    }

    // delete section
    public function deleteSection($id)
    {
        $section = Section::find($id);
        $section->delete();
        return redirect()->back()->with('success', 'Section was successfully deleted!');
    }

    // edit section
    public function editSection(Request $request, $id)
    {
        // dd($request);
        $section = Section::find($id)->update([
            'section_name' => $request->section_name,
        ]);
        return redirect()->back()->with('success', 'Section was successfully updated!');
    }
}
