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


    public function videoInfo(Request $request)
    {
        $vid = $request->vid;

        $is_exists = DB::table('videos')
            ->where('id', $vid)
            ->exists();

        if($is_exists)
        {
            $video = DB::table('videos')
            ->where('videos.id', $vid)
            ->leftJoin('users', 'users.id', '=', 'videos.author_id')
            ->select('videos.id as vid',
                'author_id',
                'name',
                'email',
                'title',
                'description',
                'thumbnail')->first();

            $parts = DB::table('video_parts')
                ->where('video_id', $vid)
                ->select('title','url')->get();

            $video = (array)$video;
            $video['parts'] = $parts;
            $video['status'] = 1;

            return json_encode($video);
        }
        else
        {
            return json_encode(['status' => 0]);
        }
    }

}
