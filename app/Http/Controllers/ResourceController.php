<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ResourceController extends Controller
{

    public function index(Request $request)
    {
        // Fetch resources based on the search query, if present
        $resources = Resource::query();
        
        if ($request->has('field')) {
            $resources->where('field', 'like', '%' . $request->field . '%');
        }
        
        if ($request->has('module')) {
            $resources->where('module', 'like', '%' . $request->module . '%');
        }
        
        $resources = $resources->get();  // Execute the query to get the resources
    
        // Pass resources to the view
        return view('ressources', compact('resources'));
    }
    
    
    
    

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'field' => 'required|string|max:100',
        'module' => 'required|string|max:100',
        'file' => 'required|file|max:20480', // Max 20MB
    ]);
    

    $file = $request->file('file');
    $path = $file->store('resources', 'public');

    Resource::create([
        'title' => $request->title,
        'field' => $request->field,
        'module' => $request->module,
        'type' => $file->getClientOriginalExtension(),
        'file_path' => $path,
        'user_id' => Auth::id(),
    ]);
    
    Log::info('File uploaded: ', [$file->getClientOriginalName(), $path]);

    return redirect()->route('resources.index')->with('success', 'Fichier uploadé avec succès!');
}



    //
}
