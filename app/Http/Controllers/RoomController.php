<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\User;

class RoomController extends Controller
{
    public function index()
    {
        return view('user.room.index', [
            'rooms' => auth()->user()->rooms,
            'room' => new Room,
        ]);
    }

    public function getRooms(Request $request, $vendor_id)
    {
        $rooms = Room::where('vendor_id', $vendor_id)->get();

        return response()->json($rooms);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image',
            'capacity' => 'required',
        ]);

        if($request->hasFile('image')) {
            // rename first the filename with unique id + timestamp for security
            $filename = uniqid() . time() . '.' . $request->image->extension();
            $request->image->storeAs('public/rooms', $filename);
            $data['image'] = $filename;
        }
        $data['vendor_id'] = auth()->user()->id;

        // dd($data);

        Room::create($data);

        return redirect()->route('vendor.rooms.index')->with('success', 'Room created successfully.');
    }

    public function update(Request $request, Room $room)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'image',
            'capacity' => 'required',
        ]);

        if($request->hasFile('image')) {
            $room->deleteImage();

            // rename first the filename with unique id + timestamp for security and delete the old image
            $filename = uniqid() . time() . '.' . $request->image->extension();
            $request->image->storeAs('public/rooms', $filename);
            $data['image'] = $filename;
        }

        $room->update($data);

        return redirect()->route('vendor.rooms.index')->with('success', 'Room updated successfully.');
    }
}
