<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 my-10">
                <el-form :model="ruleForm" status-icon :rules="rules" ref="ruleForm" label-width="100px">
                    <el-form-item label="e-mail" prop="mail">
                        <el-input placeholder="e-mail" v-model="ruleForm.mail" autocomplete="off"></el-input>
                    </el-form-item>
                    <el-form-item label="password" prop="password">
                        <el-input type="password" placeholder="password" v-model="ruleForm.password" autocomplete="off"></el-input>
                    </el-form-item>
                    <el-form-item>
                        <el-button type="primary" @click="submitForm('ruleForm')">submit</el-button>
                    </el-form-item>
                </el-form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            var validateMail = (rule, value, callback) => {
                if (!value) {
                    return callback(new Error('Empty email address'));
                }
                setTimeout(() => {
                    var reg = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+/);
                    if (!reg.test(value)) {
                        callback(new Error('Invalidate mail format'));
                    } else {
                        callback();
                    }
                }, 1000);
            };
            var validatePass = (rule, value, callback) => {
                if (value === '') {
                    callback(new Error('Please input password'));
                } else {
                    callback();
                }
            };
            return {
                ruleForm: {
                    mail: '',
                    password: '',
                },
                rules: {
                    mail: [
                        { validator: validateMail, trigger: 'blur' }
                    ],
                    password: [
                        { validator: validatePass, trigger: 'blur' }
                    ]
                }
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