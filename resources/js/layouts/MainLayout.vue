<template>
  <div class="container">
        <header>
            <navbar-component></navbar-component>
        </header>
        <main role="main">
            <slot></slot>
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
