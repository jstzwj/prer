<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Carbon\Carbon;

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

    public function upload(Request $request)
    {
        if ($request->session()->has('user_id')) {
            $user_data = $request->session()->get('user_data');
            $title = $request->title;
            $description = $request->description;
            // 数据检查
            if($title == NULL || $description == NULL){
                return json_encode(['status'=> 0, 'code' => 0, 'msg' => 'Error: Empty message.']);
            }
            
            // 用户已登陆，允许上传
            // $all_files = $request->files->all()['file'];
            $all_files = $request->file('file');

            $vid = DB::table('videos')->insertGetId(
                ['author_id' => $user_data->id,
                'title' => $title,
                'description' => $description,
                'thumbnail' => '',
                'created_at' => Carbon::now()]
            );

            var_dump($all_files);
            foreach ($all_files as $file)
            {
                $path = $file->store('videos');
                // $path = Storage::putFile('videos', $file);
                $pid = DB::table('video_parts')->insertGetId(
                    ['video_id' => $vid,
                    'title' => $file->getClientOriginalName(),
                    'thumbnail' => '',
                    'url' => Storage::url($path),
                    'created_at' => Carbon::now()]
                );
            }
            return json_encode(['status'=> 1, 'code' => 0, 'msg' => 'Success: Succeed to upload.']);
        }else{
            return json_encode(['status'=> 0, 'code' => 0, 'msg' => 'Error: User not login.']);
        }
    }
}
