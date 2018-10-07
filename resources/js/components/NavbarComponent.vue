<template>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
        <router-link to="/" class="my-0 mr-md-auto font-weight-normal">Prer</router-link>
        <nav class="my-2 my-md-0 mr-md-3">
            <!--
            <a class="p-2 text-dark" href="#">Features</a>
            <a class="p-2 text-dark" href="#">Enterprise</a>
            <a class="p-2 text-dark" href="#">Support</a>
            <a class="p-2 text-dark" href="#">Pricing</a>
            -->
            
        </nav>
        <template  v-if="this.$store.state.token == 0">
          <router-link to="/signup" class="btn btn-outline-primary mx-2">Sign up</router-link>
          <router-link to="/signin" class="btn btn-primary mx-2">Sign in</router-link>
        </template >
        <template  v-else>
          <a class="p-2 text-dark" href="#">
            <i class="fa fa-envelope-o"></i>
          </a>
          <a class="dropdown-toggle" href="#" id="dropdown_user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user-circle fa-lg"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown_user">
            <a class="dropdown-item" href="#">
              <i class="fa fa-info"></i>
              Your Profile
            </a>
            <a class="dropdown-item" href="#">
              <i class="fa fa-question-circle"></i>
              Help
            </a>
            <a class="dropdown-item" href="#">
              <i class="fa fa-cog"></i>
              Setting
            </a>
            <a class="dropdown-item" href="#">
              <i class="fa fa-sign-out"></i>
              Sign out
            </a>
          </div>
        </template >
    </div>
</template>

<script>
export default {
  data() {
    return {
      activeIndex: "1"
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
.left-navbar {
  float: left;
}

.right-navbar {
  float: right;
}
</style>
