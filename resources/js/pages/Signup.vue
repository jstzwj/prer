<template>
    <main-layout>
        <signup-component>
        </signup-component>
    </main-layout>
</template>

<script>
import MainLayout from '../layouts/MainLayout.vue'
import SignupComponent from '../components/SignupComponent.vue'
export default {
    components: {
        'signup-component': SignupComponent
    }
}

</script>
