<?php

namespace App\Http\Controllers;

use App\Models\Paste;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class SearchController extends Controller
{
    public function index(){

        return view('search.index');
    }


    public function searchPastes(Request $request){

        $validator = Validator::make($request->all(), [
            'pasteName' => ['required', 'max:150', 'string']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors() // Returns detailed error messages
            ], 422);
        }


        $pastes = Paste::query()->publicPastesSearch($request->input('pasteName'))->get();

        return response()->json([
            'success' => true,
            'message' => 'Pastes retrieved successfully',
            'data' => $pastes
        ], 200);

    }
}
