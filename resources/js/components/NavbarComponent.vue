<template>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">Prer</h5>
      <nav class="my-2 my-md-0 mr-md-3">
          <!--
        <a class="p-2 text-dark" href="#">Features</a>
        <a class="p-2 text-dark" href="#">Enterprise</a>
        <a class="p-2 text-dark" href="#">Support</a>
        <a class="p-2 text-dark" href="#">Pricing</a>
        -->
        <el-badge :value="3" class="item">
            <i class="fa fa-envelope-o"></i>
        </el-badge>
      </nav>
      <a class="btn btn-outline-primary mx-2" href="#">Sign up</a>
      <a class="btn btn-primary mx-2" href="#">Log in</a>
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
