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
                url: this.url,
                pic: this.pic
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
    props: ['url', 'pic'],
    mounted() {
        this.player = this.$refs.player.dp;
    },
    methods: {
        play() {
        console.log("play callback");
        },
        switchHandle(in_url, in_pic, in_thumbnail) {
            this.player.switchVideo({
                url: in_url,
                pic: in_pic,
                thumbnail: in_thumbnail
            });
        }
    },
    watch: {
        url: function (val) {
            this.player.switchVideo({
                url: val,
                pic: this.pic,
                thumbnail: this.pic
            });
            this.player.play();
        }
    },
    components: {
        "d-player": VueDPlayer
    }
};
</script>