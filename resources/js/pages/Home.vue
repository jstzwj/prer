<template>
    <main-layout>
        <div class="d-flex flex-wrap">
            <div class="card" v-for="(item, index) in videos" v-bind:key='index'>
                <div style="width: 286px; height: 160px; overflow:hidden; position: relative;">
                    <img class="card-img-top" style="width:286px" v-bind:src="item.thumbnail" alt="Thumbnail">
                </div>
                <div class="card-body">
                <h5 class="card-title">{{item.title}}</h5>
                <p class="card-text">{{item.text}}</p>
                </div>
            </div>
        </div>
    </main-layout>
</template>

<script>
import MainLayout from "../layouts/MainLayout.vue";
export default {
    data(){
        return{
            videos:[
                { thumbnail:'https://cn.vuejs.org/images/logo.png', title:'123', text:'1234' }
            ]
        }
    },
    components: {
        "main-layout": MainLayout
    }
};
</script>
