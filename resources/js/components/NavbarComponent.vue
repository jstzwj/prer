<template>
    <v-toolbar dark dense fixed clipped-left app>
        <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
        <v-icon class="mx-3">ac_unit</v-icon>
        <v-toolbar-title class="mr-5 align-center">
            <span class="title">Prer</span>
        </v-toolbar-title>
        <v-spacer></v-spacer>
        <v-layout row align-center style="max-width: 350px">
            <v-text-field :append-icon-cb="() => {}" placeholder="Search..." single-line append-icon="search" color="white"
                hide-details></v-text-field>
        </v-layout>
        <v-layout row align-center style="max-width: 50px">
            <v-menu offset-y>
                <v-btn fab small slot="activator">
                    <v-icon>person</v-icon>
                </v-btn>
                <v-list>
                    <v-list-tile v-for="(item, index) in user_items" :key="index" @click="">
                        <v-list-tile-avatar>
                            <v-icon>@{{ item.icon }}</v-icon>
                        </v-list-tile-avatar>
                        <v-list-tile-title>@{{ item.title }}</v-list-tile-title>
                    </v-list-tile>
                </v-list>
            </v-menu>
        </v-layout>
        <v-layout row align-center style="max-width: 100px">
            <v-dialog v-model="dialog" max-width="500px">
                <v-btn slot="activator" color="primary" dark>Login</v-btn>
                <v-card>
                    <v-card-title>
                        <span class="headline">User Profile</span>
                    </v-card-title>
                    <v-card-text>
                        <v-container grid-list-md>
                            <v-layout wrap>
                                <v-flex xs12>
                                    <v-text-field label="Email" required></v-text-field>
                                </v-flex>
                                <v-flex xs12>
                                    <v-text-field label="Password" type="password" required></v-text-field>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" flat @click.native="dialog = false">Login</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-layout>
    </v-toolbar>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data: () => ({
            user_items: [
                { icon: 'settings', title: 'Setting' },
                { icon: 'help', title: 'Help' },
                { icon: 'exit_to_app', title: 'Log out' },
                { icon: 'feedback', title: 'Feed back' }
            ]
        })
    }
</script>