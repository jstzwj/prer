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
                            <el-upload
                                drag
                                class="upload-demo"
                                action="/upload"
                                ref="uploader"
                                accept=".mp4,.flv"
                                :auto-upload="false"
                                :file-list="fileList"
                                :before-upload="beforeUpload"
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
      uploadForm: new FormData(),
      fileList: []
    };
  },
  methods: {
    beforeUpload(file){
        this.uploadForm.append('file[]', file);
        return false;
    },
    onSubmit() {
        this.uploadForm.append("title", this.form.title);
        this.uploadForm.append("description", this.form.description);

        this.$refs.uploader.submit();
        axios({
            data: this.uploadForm,
            url: "/upload",
            method: "post"
        })
        .then(function(response) {
            console.log(response);
        })
        .catch(function(error) {
            console.log(error);
        });
    }
  }
};
</script>