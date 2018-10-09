<template>
  <div class="container-fluid">
        <header>
            <navbar-component></navbar-component>
        </header>
        <main role="main">
            <div class="my-2">
                <slot></slot>
            </div>
        </main>
        <footer>
            <footer-component></footer-component>
        </footer>
    </div>
</template>

<script>
import NavbarComponent from '../components/NavbarComponent.vue'
import FooterComponent from '../components/FooterComponent.vue'
export default {
    components: {
        'navbar-component':NavbarComponent,
        'footer-component':FooterComponent
    }
}

</script>
