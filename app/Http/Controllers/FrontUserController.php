<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FrontUserController extends Controller
{
    public function index()
    {
        $postsPage = DB::table('frontuser')
            ->join('image', 'frontuser.Flowers_Name', '=', 'image.Flowers_Name')
            ->select('frontuser.*', 'image.photo')
            ->paginate(16);

        foreach ($postsPage as $post) {
            if ($post->photo) {
                // Convert binary data to base64
                $post->photo_base64 = 'data:image/jpeg;base64,' . base64_encode($post->photo);
            } else {
                $post->photo_base64 = null;
            }
        }

        $suitableLocations = DB::table('frontuser')
        ->select('Suitable_Locations')
        ->distinct()
        ->pluck('Suitable_Locations');

    return view('listTanaman', [
        'postsPage' => $postsPage,
        'suitableLocations' => $suitableLocations,
    ]);
    }

    public function show($Flowers_Name)
    {
        $post = DB::table('frontuser')
            ->join('image', 'frontuser.Flowers_Name', '=', 'image.Flowers_Name')
            ->select('frontuser.*', 'image.photo')
            ->where('frontuser.Flowers_Name', $Flowers_Name)
            ->first();

        if ($post && $post->photo) {
            // Convert binary data to base64
            $post->photo_base64 = 'data:image/jpeg;base64,' . base64_encode($post->photo);
        } else {
            $post->photo_base64 = null;
        }

        return view('post', ['post' => $post]);
    }
}
