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
                <div class="col col-lg-8">
                    <h5>
                        {{title}}
                    </h5>
                </div>
                <div class="col col-lg-4">
                </div>
            </div>
            <div class="row">
                <div class="col col-lg-8">
                    {{description}}
                </div>
                <div class="col col-lg-4">
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
                title: 'title',
                description: '',
                author: '',
                player_url: '',
                player_pic: '',
                parts: []
            }
        },
        mounted(){
            var that = this;
            axios({
                method: "get",
                url: `/videoinfo?vid=${that.$route.params.vid}`,
                data: {}
            })
            .then(function (response) {
                console.log(response);
                Vue.set(that, 'parts', response.data.parts);
                if (response.data.status == 1)
                {
                    // set video info
                    Vue.set(that, 'title', response.data.title);
                    Vue.set(that, 'description', response.data.description);
                    // play video
                    var count = Object.keys(that.parts).length;
                    if(count > 0)
                    {
                        Vue.set(that, 'player_url', that.parts[0].url);
                        Vue.set(that, 'player_pic', that.parts[0].pic);
                    }
                    else
                    {
                        console.log('Error: Negative parts number.');
                    }
                }
                else
                {
                    console.log('Failed to get video info.');
                }
            })
            .catch(function (error) {
                console.log(error);
            });
            
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