@extends('layouts.app')

@section('title', 'Prer')

@section('header')
@parent
@endsection

@section('main')
<el-row :gutter="10">
    <el-col :xs="8" :sm="8" :md="8" :lg="8" :xl="8">
        <div>123</div>
    </el-col>
    <el-col :xs="16" :sm="16" :md="16" :lg="16" :xl="16">
        <div>12</div>
    </el-col>
    <el-col :xs="24" :sm="24" :md="24" :lg="24" :xl="24">
        <div>1</div>
    </el-col>
</el-row>
@endsection

@section('footer')
@parent
@endsection

@section('js_script')
@endsection