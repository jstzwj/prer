<template>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 my-10">
                <el-form :model="ruleForm" status-icon :rules="rules" ref="ruleForm" label-width="100px">
                    <el-form-item label="e-mail" prop="mail">
                        <el-input v-model="ruleForm.mail" autocomplete="off"></el-input>
                    </el-form-item>
                    <el-form-item label="password" prop="pass">
                        <el-input type="password" v-model="ruleForm.pass" autocomplete="off"></el-input>
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
                var reg=new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+/);   
                if (!reg.test(value)) {
                    callback(new Error('Invalidate mail format'));
                } else {
                    callback();
                }
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
                    pass: '',
                },
                rules: {
                    mail: [
                        { validator: validateMail, trigger: 'blur' }
                    ],
                    pass: [
                        { validator: validatePass, trigger: 'blur' }
                    ]
                }
            };
        },
        methods: {
            submitForm(formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        alert('submit!');
                    } else {
                        console.log('error submit!!');
                        return false;
                    }
                });
            }
        }
    }
</script>