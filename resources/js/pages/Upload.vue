<template>
    <main-layout>
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <el-form ref="form" :model="form" label-width="80px">
                        <el-form-item label="title">
                            <el-input v-model="form.title"></el-input>
                        </el-form-item>
                        <el-form-item label="description">
                            <el-input type="textarea" :rows="2" placeholder="video desciption" v-model="form.description"></el-input>
                        </el-form-item>
                        <el-form-item label="upload">
                            <el-upload class="upload-demo" action="/upload"
                                :on-preview="handlePreview" :on-remove="handleRemove" :before-remove="beforeRemove"
                                multiple :limit="5" :on-exceed="handleExceed" :file-list="fileList">
                                <el-button size="small" type="primary">点击上传</el-button>
                                <div slot="tip" class="el-upload__tip">只能上传jpg/png文件，且不超过500kb</div>
                            </el-upload>
                        </el-form-item>
                        <el-form-item>
                            <el-button type="primary" @click="onSubmit">upload</el-button>
                        </el-form-item>
                    </el-form>
                </div>
            </div>
        </div>
    </main-layout>
</template>

<script>
    import MainLayout from "../layouts/MainLayout.vue";
    import SigninComponent from "../components/SigninComponent.vue";
    export default {
        data() {
            return {
                form: {
                    title: '',
                    description: ''
                },
                fileList: []
            };
        },
        methods: {
            handleRemove(file, fileList) {
                console.log(file, fileList);
            },
            handlePreview(file) {
                console.log(file);
            },
            handleExceed(files, fileList) {
                this.$message.warning(`当前限制选择 5 个文件，本次选择了 ${files.length} 个文件，共选择了 ${files.length + fileList.length} 个文件`);
            },
            beforeRemove(file, fileList) {
                return this.$confirm(`确定移除 ${file.name}？`);
            },
            onSubmit() {
                console.log('submit!');
            }
        },
        components: {
            "signin-component": SigninComponent
        }
    };
</script>