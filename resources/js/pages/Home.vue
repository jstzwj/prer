<template>
    <main-layout>
        <div class="d-flex flex-wrap">
            <div class="card" v-for="(item, index) in videos" v-bind:key='index'>
                <router-link :to="item.watch_url">
                    <div style="width: 286px; height: 160px; overflow:hidden; position: relative;">
                        <img class="card-img-top" style="width:286px" v-bind:src="item.thumbnail" alt="Thumbnail">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{item.title}}</h5>
                        <p class="card-text">{{item.description}}</p>
                    </div>
                </router-link>
            </div>
        </div>
    </main-layout>
</template>

<script>
    import MainLayout from "../layouts/MainLayout.vue";
    export default {
        data() {
            return {
                videos: []
            };
        },
        mounted: function () {
            var that = this;
            axios({
                method: "get",
                url: "/list",
                data: {}
            })
                .then(function (response) {
                    console.log(response);
                    Vue.set(that, 'videos', response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        components: {
            "main-layout": MainLayout
        }
    };
</script>