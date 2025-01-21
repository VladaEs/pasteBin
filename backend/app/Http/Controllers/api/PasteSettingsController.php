<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paste_Category;
class PasteSettingsController extends Controller
{
    public function index(){
        $categories = Paste_Category::all();
        var_dump($categories);
        return response()->json($categories, 200);
    }
}
