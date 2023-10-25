<?php

namespace App\Http\Controllers;

use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $majors = Major::orderBy('id', 'desc')->paginate(10);
        return view("majors.index", compact("majors"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("majors.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'artist_name' => 'required',
            'description' => 'required',
            'art_type' => 'required',
        ]);
        // Check if data like $validatedData['artist_name'] already exists
        $existingmajor = Major::where('name', $validatedData['artist_name'])->first();

        // If the data already exists
        if ($existingmajor) {
            return redirect()->route('majors.create')->with('result', 'store_exist')->with('message', 'Data already exists.');
        }

        $major = new Major();
        $major->name = $validatedData['artist_name']; // Assign value to the 'name' field
        $major->description = $validatedData['description'];
        $major->duration = $validatedData['art_type'];
        

        if (!$major->save()) {
            return redirect()->route('majors.create')->with('result', 'store_false')->with('message', 'An error occurred while saving the data.');
        } else {
            return redirect()->route('majors.index')->with('result', 'store_true')->with('message', 'Data stored successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        $major = Major::where("id", $major->id)->first();
        return view("majors.show", compact("major"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        $major = Major::where("id", $major->id)->first();
        return view("majors.edit", compact("major"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Major $major)
    {
        $validatedData = $request->validate([
            'artist_name' => 'required',
            'description' => 'required',
            'art_type' => 'required',
        ]);

        $majorToUpdate = Major::where('id', $major->id)->first();
        $majorToUpdate->name = $validatedData['artist_name']; // Assign value to the 'name' field
        $majorToUpdate->description = $validatedData['description'];
        $majorToUpdate->duration = $validatedData['art_type'];

        if (!$majorToUpdate->save()) {
            return redirect()->route('majors.edit', $major)->with('result', 'update_false')->with('message', 'An error occurred while saving the data.');
        } else {
            return redirect()->route('majors.index')->with('result', 'update_true')->with('message', 'Data updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        $majorToDelete = Major::where('id', $major->id)->first();
        if (!$majorToDelete) {
            return redirect()->route('majors.index')->with('result', 'delete_false')->with('message', 'No directory found to delete.');
        }

        if (!$majorToDelete->delete()) {
            return redirect()->route('majors.index')->with('result', 'delete_false')->with('message', 'An error occurred while deleting data.');
        }else{
            return redirect()->route('majors.index')->with('result', 'delete_true')->with('message', 'Deleted data successfully.');
        }
    }
}
