<template>
    <main-layout>
        <signin-component>
        </signin-component>
    </main-layout>
</template>

<script>
import MainLayout from '../layouts/MainLayout.vue'
import SigninComponent from '../components/SigninComponent.vue'
export default {
    components: {
        'signin-component': SigninComponent
    }
}

</script>
