<?php

namespace App\Http\Controllers;

use App\Photo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminMediaController extends Controller
{

    public function create() {

        return view('admin.media.create');

    }

    public function destroy($id) {
        $photo = Photo::findOrFail($id);

        unlink(public_path($photo->file));

        $photo->delete();

        return redirect('/admin/media');

    }

    public function index() {

        $photos = Photo::all();

        return view('admin.media.index', compact('photos'));
    }

    public function store(Request $request) {

        request()->validate([

            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        $file = $request->file('file');
        $name = Carbon::now()->format('Y_m_d_H_i_s') . '_' . $file->getClientOriginalName();
        $file->move('images', $name);
        Photo::create(['file' => $name]);

    }

    public function bulkMediaDelete(Request $request) {

        if(!empty($request->mediaCheckboxArray)) {
            Photo::whereIn('id', $request->mediaCheckboxArray)->delete();
        }

        return redirect()->back();
    }
}
