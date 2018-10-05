<template>
    <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">
        <el-menu-item index="1">Prer</el-menu-item>
        <el-submenu index="2">
            <template slot="title">user</template>
            <el-menu-item index="2-1">log out</el-menu-item>
            <el-menu-item index="2-2">settings</el-menu-item>
            <el-menu-item index="2-3">help</el-menu-item>
        </el-submenu>
        <el-menu-item index="3">message</el-menu-item>
    </el-menu>
</template>

<script>
    export default {
        data() {
            return {
                activeIndex: '1'
            };
        },
        methods: {
            handleSelect(key, keyPath) {
                console.log(key, keyPath);
            }
        }
    }
</script>

<style>
    .left-navbar{
        float: left;
    }

    .right-navbar{
        float: right;
    }
</style>
