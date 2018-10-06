<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="text-center">
                    <form class="form-signin">
                        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required
                            autofocus>
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                        <div class="checkbox mb-3">
                            <label>
                                <input type="checkbox" value="remember-me"> Remember me
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
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
            };
        },
        methods: {
            submitForm(formName) {
                var notify_method = this.$notify;
                var mail_val = this.$data.ruleForm.mail;
                var password_val = this.$data.ruleForm.password;
                this.$refs[formName].validate((valid) => {
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
                });
            }
        }
    }
</script>