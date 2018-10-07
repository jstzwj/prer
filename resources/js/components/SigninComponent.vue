<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="text-center">
                    <form class="form-signin">
                        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" v-model="formData.mail"
                            required autofocus>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" v-model="formData.password"
                            required>
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me" v-model="formData.remember"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="button" @click="submitForm('formData')">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                formData: {
                    mail: "",
                    password: "",
                    remember: ""
                }
            };
        },
        methods: {
            submitForm(formName) {
                var notify_method = this.$notify;
                var router_method = this.$router;
                var store_method = this.$store;
                var mail_val = this.$data.formData.mail;
                var password_val = this.$data.formData.password;
                //this.$refs[formName].validate((valid) => {
                var valid = true;
                if (valid) {
                    axios({
                        method: "post",
                        url: "/signin",
                        data: { token: 0, mail: mail_val, password: password_val }
                    })
                    .then(function (response) {
                        console.log(response);
                        if (response.data.status == "1") {
                            store_method.state.token = response.data.token;
                            router_method.push({path:'/'});
                        } else if (response.data.status == "0") {
                            notify_method({
                                title: "warning",
                                message: "Incorrect username or password.",
                                type: "warning"
                            });
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                        notify_method({
                            title: "Error",
                            message: "error: Unknown error.",
                            type: "error"
                        });
                    });
                } else {
                    console.log("error submit!!");
                    return false;
                }
            }
        }
    };
</script>