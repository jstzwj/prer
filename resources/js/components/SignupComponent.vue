<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" v-model="formData.mail">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password" v-model="formData.password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-primary" @click="submitForm('formData')">Sign up</button>
                        </div>
                    </div>
                </form>
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
                    pass: ""
                }
            };
        },
        methods: {
            submitForm(formName) {
                var notify_method = this.$notify;
                var mail_val = this.$data.formData.mail;
                var password_val = this.$data.formData.password;
                var valid = true;
                if (valid) {
                    axios({
                        method: "post",
                        url: "/signup",
                        data: { mail: mail_val, password: password_val }
                    })
                    .then(function (response) {
                        console.log(response);
                        if (response.data.status == "1") {
                            notify_method({
                                title: "success",
                                message: "Register successfully.",
                                type: "success"
                            });
                        } else if (response.data.status == "0") {
                            notify_method({
                                title: "warning",
                                message: "E-mail has been registered.",
                                type: "warning"
                            });
                        }
                    })
                    .catch(function (error) {
                        console.log(error);
                        notify_method({
                            title: "Error",
                            message: "error: " + error.data.code,
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