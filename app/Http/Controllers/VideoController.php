<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Carbon\Carbon;


class VideoController extends Controller
{
    protected function toRelativeUrl($url)
    {
        if($url!=NULL&&$url[0]=='/')
        {
            return substr($url,1);
        }
        else
        {
            return $url;
        }
    }

    protected function getVideoFrame($video_url, $pic_url)
    {
        // url proccess
        $video_url = $this->toRelativeUrl($video_url);

        $ffmpeg = \FFMpeg\FFMpeg::create();
        $video = $ffmpeg->open($video_url);
        $video
            ->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds(0))
            ->save($pic_url);
    }

    // 320 240
    protected function resizeVideo($video_url, $width, $height)
    {
        $video_url = $this->toRelativeUrl($video_url);

        $ffmpeg = \FFMpeg\FFMpeg::create();
        $video = $ffmpeg->open($video_url);
        $video
            ->filters()
            ->resize(new \FFMpeg\Coordinate\Dimension($width, $height), \FFMpeg\Filters\Video\ResizeFilter::RESIZEMODE_INSET, true)
            ->synchronize();
    }
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
        if ($request->session()->has('user_data')) {
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

            $main_video_thumbnail = '';
            
            foreach ($all_files as $file)
            {
                $path = $file->store('public/videos');
                // generate thumbnail
                $original_name = $file->getClientOriginalName();
                $part_name = str_replace(strrchr($original_name, "."),"",$original_name); 
                $hash_name = basename($path,'.mp4');
                $this->getVideoFrame(Storage::url($path), 'storage/pics/'.$hash_name.'.jpg');
                if ($main_video_thumbnail == NULL)
                    $main_video_thumbnail = 'storage/pics/'.$hash_name.'.jpg';
                // record in database
                $pid = DB::table('video_parts')->insertGetId(
                    ['video_id' => $vid,
                    'title' => $part_name,
                    'thumbnail' => '/storage/pics'.$hash_name.'.jpg',
                    'url' => Storage::url($path),
                    'created_at' => Carbon::now()]
                );
            }

            DB::table('videos')
                ->where('id', $vid)
                ->update(['thumbnail' => $main_video_thumbnail]);

            return json_encode(['status'=> 1, 'code' => 0, 'msg' => 'Success: Succeed to upload.']);
        }else{
            return json_encode(['status'=> 0, 'code' => 0, 'msg' => 'Error: User not login.']);
        }
    }
}
