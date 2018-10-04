<template>
    <v-app id="app">
        <sidebar-component></sidebar-component>
        <navbar-component></navbar-component>
        <v-content>
        </v-content>
    </v-app>    
</template>

<script>
    import sidebar-component from './components/SidebarComponent'
    import navbar-component from './components/NavbarComponent'
    export default {
        data () {
            return {},
            name: 'App',
            components: {
                sidebar-component,
                navbar-component
            }
        }
    }
</script>