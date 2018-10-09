<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <router-link to="/" class="navbar-brand">Prer</router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
            aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample05">
            <ul class="navbar-nav ml-auto">
                <template v-if="this.$store.state.isSignin == true">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown_user" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user-circle fa-lg"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown_user">
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-info"></i>
                                Your Profile
                            </a>
                            <router-link to="/upload" class="dropdown-item">
                                <i class="fa fa-upload"></i>
                                Upload
                            </router-link>
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-question-circle"></i>
                                Help
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fa fa-cog"></i>
                                Setting
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" @click="signout()">
                                <i class="fa fa-sign-out"></i>
                                Sign out
                            </a>
                        </div>
                    </li>
                </template>
                <template v-if="this.$store.state.isSignin == false">
                    <router-link to="/signup" class="btn btn-outline-primary mx-2">Sign up</router-link>
                    <router-link to="/signin" class="btn btn-primary mx-2">Sign in</router-link>
                </template>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        data() {
            return {
                activeIndex: "1"
            };
        },
        methods: {
            signout() {
                console.log('user sign out.');
                this.$store.commit('setSignout');
                axios({
                    method: "post",
                    url: "/signout",
                    data: {}
                })
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    };
</script>

<style>
</style>