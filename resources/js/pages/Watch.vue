<template>
    <main-layout>
        <player-component>
        </player-component>
    </main-layout>
</template>

<script>
import MainLayout from '../layouts/MainLayout.vue'
import PlayerComponent from '../components/PlayerComponent.vue'
export default {
    components: {
        'player-component': PlayerComponent
    }
}

</script>
