<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        return view('user.gallery.gallery-view', [
            $gallery = auth()->user()->galleries
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'file_input' => 'required|mimes:jpg,jpeg,png'
        ]);

        $data['user_id'] = auth()->user()->id;

        $gallery = Gallery::create($data);

        if($request->hasFile('file_input')) {
            $file = $request->file('file_input');
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->guessExtension();
            $customFileName = uniqid() . now()->timestamp . '.' . $fileExtension;

            $file->storeAs('/public/gallery/', $customFileName);

            //update image filename
            $gallery->filename = $customFileName;
            $gallery->update();
        }

        return redirect()->route('user.gallery.index')->with('success', 'Image uploaded successfully.');
    }


    public function update()
    {

    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
