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
            // 'name' => 'required|max:255',
            'file_input.*' => 'required|mimes:jpg,jpeg,png'
        ]);

        $data['user_id'] = auth()->user()->id;

        if (!count(auth()->user()->galleries)) {
            $data['is_default'] = true;
        }

        // Create the gallery without the file information
       

        // Handle each file in the request
        foreach ($request->file('file_input') as $file) {
            $fileName = $file->getClientOriginalName();
            $fileExtension = $file->guessExtension();
            $customFileName = uniqid() . now()->timestamp . '.' . $fileExtension;

            // Store the file
            $file->storeAs('/public/gallery/', $customFileName);

            $data['filename'] = $customFileName;

            $gallery = Gallery::create($data);
        }

        return redirect()->route('user.gallery.index')->with('success', 'Images uploaded successfully.');
    }


    public function update()
    {

    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }

    public function setDefault(Request $request,Gallery $gallery)
    {

        $galleries = auth()->user()->galleries;
        foreach ($galleries as $image) {
            $image->fill(['is_default' => false]);
            $image->save();
        }

        $gallery->fill(['is_default' => true]);
        $gallery->save();

        return redirect()->back()->with('success', 'Image set as default successfully');

    }
}
