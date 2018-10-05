@extends('layouts.app')

@section('title', 'Prer')

@section('header')
@parent
@endsection

@section('main')
<el-row :gutter="10">
    <el-col :xs="16" :sm="16" :md="16" :lg="16" :xl="16">
        <div>
            <div id="dplayer"></div>
        </div>
    </el-col>
    <el-col :xs="8" :sm="8" :md="8" :lg="8" :xl="8">
        <div>
            <playlist-component>
            </playlist-component>
        </div>
    </el-col>
    <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
        <div>1</div>
    </el-col>
</el-row>
@endsection

@section('footer')
@parent
@endsection

@section('js_script')
<script>
    const dp = new DPlayer({
        container: document.getElementById('dplayer'),
        screenshot: true,
        video: {
            url: 'http://www.w3school.com.cn/i/movie.ogg',
            pic: 'demo.jpg',
            thumbnails: 'thumbnails.jpg'
        },
        subtitle: {
            url: 'webvtt.vtt'
        },
        danmaku: {
            id: 'demo',
            api: 'https://api.prprpr.me/dplayer/'
        }
    });
</script>
@endsection