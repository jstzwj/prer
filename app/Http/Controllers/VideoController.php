<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //
    public function homeVideoList(Request $request)
    {
        $videos = DB::table('videos')->get();
        $retval = [];
        foreach ($videos as $video) {
            $item = ['vid' => $video->id,
            'watch_url' => '/watch/'.$video->id, 
            'thumbnail' => $video->thumbnail,
            'title' => $video->title,
            'description' => $video->description];
            array_push($retval, $item);
        }
        return json_encode($retval);
    }

}
