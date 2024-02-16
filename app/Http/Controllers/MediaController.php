<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Medias;
use Spatie\MediaLibrary\HasMedia;

class MediaController extends Controller
{
    public function index()
    {
        return view('medias.show_media');
    }

    public function mediaAddIndex() {
        return view('medias.ajouter_media');
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'file' => 'required|max:2048',
        ]);

        if($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $upload = Medias::create([

        ]);

        $upload->addMediaFromRequest('file[]')->toMediaCollection();

        return back()->with('success', 'Media Added Successfully');
    }

    public function show(Media $media) {

        return redirect('media.index', ['medias' => $media->all(),]);
    }

    public function destroy(Media $media) {
        $media->delete();

        return redirect('media.index')->with('success', 'media deleted successfully');
    }
}
