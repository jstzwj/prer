<template>
    <main-layout>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col col-lg-12">
                    <player-component>
                    </player-component>
                </div>
            </div>
            <div class="row">
                <div class="col col-lg-2">
                1 of 3
                </div>
                <div class="col-md-auto">
                Variable width content
                </div>
                <div class="col col-lg-2">
                3 of 3
                </div>
            </div>
        </div>
        
    </main-layout>
</template>

<script>
import MainLayout from "../layouts/MainLayout.vue";
import PlayerComponent from "../components/PlayerComponent.vue";
export default {
  components: {
    "player-component": PlayerComponent
  }
};
</script>
