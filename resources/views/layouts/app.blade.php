<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
    </style>


    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
</head>

<body>
    <v-app id="inspire">
        @section('sidebar')
        <v-navigation-drawer v-model="drawer" fixed clipped app>
            <v-list dense>
                <v-list-tile v-for="item in nav_items" :key="item.text" @click="">
                    <v-list-tile-action>
                        <v-icon>@{{ item.icon }}</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-content>
                        <v-list-tile-title>
                            @{{ item.text }}
                        </v-list-tile-title>
                    </v-list-tile-content>
                </v-list-tile>
                <v-list>
                    <v-list-group no-action>
                        <v-list-tile slot="activator">
                            <v-list-tile-content>
                                <v-list-tile-title>SUBSCRIPTIONS</v-list-tile-title>
                            </v-list-tile-content>
                        </v-list-tile>

                        <v-list-tile v-for="item in subscripion_items" :key="item.text" avatar @click="">
                            <v-list-tile-avatar>
                                <img :src="`https://randomuser.me/api/portraits/men/${item.picture}.jpg`" alt="">
                            </v-list-tile-avatar>
                            <v-list-tile-title v-text="item.text"></v-list-tile-title>
                        </v-list-tile>
                    </v-list-group>
                </v-list>
                <v-list-tile class="mt-3" @click="">
                    <v-list-tile-action>
                        <v-icon color="grey darken-1">add_circle_outline</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title class="grey--text text--darken-1">Browse Channels</v-list-tile-title>
                </v-list-tile>
                <v-list-tile @click="">
                    <v-list-tile-action>
                        <v-icon color="grey darken-1">settings</v-icon>
                    </v-list-tile-action>
                    <v-list-tile-title class="grey--text text--darken-1">Manage Subscriptions</v-list-tile-title>
                </v-list-tile>
            </v-list>
        </v-navigation-drawer>
        @show
        @section('navbar')
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
        @show
        <v-content>
            @yield('content')
        </v-content>
    </v-app>

    @yield('vue_script')
</body>

</html>