<template>
    <div>
        <el-row>
            <el-col :span="8" v-for="(item, index) in playList" v-bind:key="item.title">
                <el-card :body-style="{ padding: '0px' }">
                    <img v-bind:src="item.thumbnail" class="image">
                    <div style="padding: 14px;">
                        <span>{{item.title}}</span>
                        <div class="bottom clearfix">
                            {{item.author}}
                        </div>
                    </div>
                </el-card>
            </el-col>
        </el-row>
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
    .author {
        font-size: 13px;
        color: #999;
    }

    .bottom {
        margin-top: 13px;
        line-height: 12px;
    }

    .button {
        padding: 0;
        float: right;
    }

    .image {
        max-height: 64px;
        max-width: 64px;
        display: block;
    }

    .clearfix:before,
    .clearfix:after {
        display: table;
        content: "";
    }

    .clearfix:after {
        clear: both
    }
</style>