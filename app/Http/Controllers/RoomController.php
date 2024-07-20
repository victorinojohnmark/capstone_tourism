<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        return view('user.room.index', [
            'rooms' => auth()->user()->rooms
        ]);
    }

    public function getRooms(Request $request)
    {
        $rooms = Room::where('vendor_id', $request->vendor_id)->get();

        return response()->json($rooms);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'capacity' => 'required',
        ]);

        if($request->hasFile('image')) {
            // rename first the filename with unique id + timestamp for security
            $filename = uniqid() . time() . '.' . $request->image->extension();
            $request->image->storeAs('public/rooms', $filename);
            $request->merge(['image' => $filename]);
        }

        Room::create($request->all());

        return view('rooms.index', [
            'rooms' => auth()->user()->rooms
        ])->with('success', 'Room created successfully.');
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image',
            'capacity' => 'required',
        ]);

        if($request->hasFile('image')) {
            // rename first the filename with unique id + timestamp for security and delete the old image
            $filename = uniqid() . time() . '.' . $request->image->extension();
            $request->image->storeAs('public/rooms', $filename);
            $request->merge(['image' => $filename]);
            $room->deleteImage();
            $room->update($request->all());
            
        }

        return view('rooms.index', [
            'rooms' => auth()->user()->rooms
        ])->with('success', 'Room updated successfully.');
    }
}
