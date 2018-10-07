<template>
    <d-player :options="options"
              @play="play"
              ref="player"></d-player>
</template>

<script>
import VueDPlayer from "vue-dplayer";
import "vue-dplayer/dist/vue-dplayer.css";

export default {
    data() {
        return {
        options: {
            video: {
            url: "http://static.smartisanos.cn/common/video/t1-ui.mp4",
            pic:
                "http://static.smartisanos.cn/pr/img/video/video_03_cc87ce5bdb.jpg"
            },
            autoplay: false,
            contextmenu: [
            {
                text: "GitHub",
                link: "https://github.com/MoePlayer/vue-dplayer"
            }
            ]
        },
        player: null
        };
    },
    mounted() {
        this.player = this.$refs.player.dp;
    },
    methods: {
        play() {
        console.log("play callback");
        },
        switchHandle() {
        this.player.switchVideo({
            url: "http://static.smartisanos.cn/common/video/video-jgpro.mp4"
        });
        }
    },
    components: {
        "d-player": VueDPlayer
    }
};
</script>