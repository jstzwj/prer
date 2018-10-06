<template>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <div class="list-group mb-3">
                <a href="#" class="list-group-item d-flex justify-content-between lh-condensed" v-for="(item, index) in playList"
                    v-bind:key="item.title">
                    <img class="rounded float-left video-thumbnail" v-bind:src="item.thumbnail" alt="Card image cap">
                    <div>
                        <h6 class="my-0">{{item.title}}</h6>
                        <small class="text-muted">{{item.author}}</small>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                activeIndex: "1",
                playList: [{
                    thumbnail: "https://cn.vuejs.org/images/logo.png",
                    title: "1",
                    author: "123"
                },
                {
                    thumbnail: "https://cn.vuejs.org/images/logo.png",
                    title: "2",
                    author: "123"
                }]
            };
        },
        methods: {
            handleSelect(key, keyPath) {
                console.log(key, keyPath);
            }
        }
    };
</script>

<style>
    .video-thumbnail {
        height: 40px;
    }
</style>