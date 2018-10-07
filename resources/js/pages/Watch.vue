<template>
    <main-layout>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-8">
                    <player-component :url="player_url" :pic="player_pic">
                    </player-component>
                </div>
                <div class="col col-lg-4">
                    <h5>Video parts</h5>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action"
                        v-for="(item, index) in parts" v-bind:key='index'
                        @click="changePart(index)">
                            {{item.title}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col col-lg-2">
                    1 of 3
                </div>
                <div class="col-md-auto">
                    Variable width content
                </div>
                <div class="col col-lg-2">
                    3 of 3
                </div>
            </div>
        </div>
    </main-layout>
</template>

<script>
    import MainLayout from "../layouts/MainLayout.vue";
    import PlayerComponent from "../components/PlayerComponent.vue";
    export default {
        data(){
            return {
                player_url: '',
                player_pic: '',
                parts: [{title:'1part',
                    url:'http://static.smartisanos.cn/common/video/t1-ui.mp4',
                    pic:'http://static.smartisanos.cn/pr/img/video/video_03_cc87ce5bdb.jpg'},
                    {title:'2part',
                    url:'http://192.168.162.2/static.smartisanos.cn/os/assets/videos/bigbang@2x.16541ee68979473a10401ca54cd2c1d7.mp4',
                    pic:'http://static.smartisanos.cn/pr/img/video/video_03_cc87ce5bdb.jpg'}]
            }
        },
        mounted(){
            var count = Object.keys(this.parts).length;
            if(count>0)
            {
                Vue.set(this, 'player_url', this.parts[0].url);
                Vue.set(this, 'player_pic', this.parts[0].pic);
            }
            else
            {
                console.log('Error: Negative parts number.');
            }
        },
        methods:{
            changePart(index) {
                Vue.set(this, 'player_url', this.parts[index].url);
                Vue.set(this, 'player_pic', this.parts[index].pic);
                console.log(`Part changed.\nurl:${this.player_url}\npic:${this.player_pic}`);
            }
        },
        components: {
            "player-component": PlayerComponent
        }
    };
</script>