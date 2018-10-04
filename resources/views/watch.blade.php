@extends('layouts.app')

@section('title', 'Prer')

@section('sidebar')
@parent
@endsection

@section('navbar')
@parent
@endsection

@section('content')
<v-container fill-height grid-list-md>
    <v-layout justify-start align-start row wrap>
        <v-flex xs12>
            <div id="dplayer"></div>
        </v-flex>
    </v-layout>
</v-container>
@endsection

@section('vue_script')
<script>
    new Vue({
        el: '#inspire',
        data: {
            drawer: true,
            subscripion_items: [
                { picture: 28, text: 'Joseph' },
                { picture: 38, text: 'Apple' },
                { picture: 48, text: 'Xbox Ahoy' },
                { picture: 58, text: 'Nokia' },
                { picture: 78, text: 'MKBHD' }
            ]
        },
        methods: {
            reverseMessage: function () {
                this.message = this.message.split('').reverse().join('')
            }
        }
    })
</script>
@endsection

@section('js_script')
<script>
    const dp = new DPlayer({
        container: document.getElementById('dplayer'),
        screenshot: true,
        video: {
            url: 'demo.mp4',
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