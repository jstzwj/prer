<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="text-center">
                    <form class="form-signin">
                        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" v-model="formData.mail" required autofocus>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" v-model="formData.password" required>
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me" v-model="formData.remember"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="button"  @click="submitForm('formData')">Sign in</button>
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
                    mail: '',
                    password: '',
                    remember: ''
                },
            };
        },
        methods: {
            submitForm(formName) {
                var notify_method = this.$notify;
                var mail_val = this.$data.formData.mail;
                var password_val = this.$data.formData.password;
                //this.$refs[formName].validate((valid) => {
                var valid = true;
                if (valid) {
                    $.ajax({
                        url: '/signin',
                        data: { 'mail': mail_val, 'password': password_val },
                        type: "POST",
                        dataType: 'json',
                        success: function (data) {
                            if (data.status == '1') {
                                window.location.href = '/';
                            }
                            else if (data.status == '2') {
                                notify_method({
                                    title: 'warning',
                                    message: '验证码错误',
                                    type: 'warning'
                                });
                            } else if (data.status == '0') {
                                notify_method({
                                    title: 'warning',
                                    message: 'Incorrect username or password.',
                                    type: 'warning'
                                });
                            }
                        },
                        error: function (data) {
                            notify_method({
                                title: 'Error',
                                message: 'error: ' + data.code,
                                type: 'error'
                            });
                        }
                    });
                } else {
                    console.log('error submit!!');
                    return false;
                }
            }
        }
    }
</script>