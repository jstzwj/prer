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
                            <el-upload drag class="upload-demo" action="/upload" ref="uploader" accept=".mp4,.flv"
                                :auto-upload="false" :file-list="fileList" :before-upload="beforeUpload"
                                multiple>
                                <i class="el-icon-upload"></i>
                                <div class="el-upload__text">drag file here or<em>click</em></div>
                                <div slot="tip" class="el-upload__tip">mp4 file only</div>
                            </el-upload>
                        </el-form-item>
                        <el-form-item>
                            <el-button type="primary" @click="onSubmit">upload</el-button>
                        </el-form-item>
                    </el-form>
                    <el-dialog title="Notice" :visible.sync="dialogVisible" width="30%"
                        :close-on-click-modal="false"
                        :close-on-press-escape="false"
                        :show-close="false">
                        <span>Uploading</span>
                        <el-progress type="circle" :percentage="progress"></el-progress>
                        <span slot="footer" class="dialog-footer">
                            <template v-if="progress==100">
                                <div>Uploading completed</div>
                                <el-button type="primary" @click="backHome()">Back to home</el-button>
                            </template>
                        </span>
                    </el-dialog>
                </div>
            </div>
        </div>
    </main-layout>
</template>

<script>
    import MainLayout from "../layouts/MainLayout.vue";
    export default {
        data() {
            return {
                form: {
                    title: "",
                    description: ""
                },
                dialogVisible: false,
                progress: 0
                ,
                uploadForm: new FormData(),
                fileList: []
            };
        },
        methods: {
            beforeUpload(file) {
                this.uploadForm.append('file[]', file);
                return false;
            },
            onSubmit() {
                Vue.set(this, 'dialogVisible', true);
                this.uploadForm.append("title", this.form.title);
                this.uploadForm.append("description", this.form.description);

                this.$refs.uploader.submit();
                axios({
                    data: this.uploadForm,
                    url: "/upload",
                    method: "post",
                    onUploadProgress: progressEvent => {
                        Vue.set(this, 'progress', parseInt(progressEvent.loaded / progressEvent.total * 100));
                    }
                })
                    .then(function (response) {
                        console.log(response);
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            backHome() {
                this.$router.push({path:'/'});
            }
        }
    };
</script>