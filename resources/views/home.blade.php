<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>prer</title>

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
        <v-navigation-drawer v-model="drawer" fixed clipped app>
            <v-list dense>
                <v-list-tile v-for="item in items" :key="item.text" @click="">
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

                        <v-list-tile v-for="item in items2" :key="item.text" avatar @click="">
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
        <v-toolbar dark dense fixed clipped-left app>
            <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
            <v-icon class="mx-3">fab fa-youtube</v-icon>
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
                        <v-list-tile v-for="(item, index) in avatar_items" :key="index" @click="">
                            <v-list-tile-title>@{{ item.title }}</v-list-tile-title>
                        </v-list-tile>
                    </v-list>
                </v-menu>
            </v-layout>

        </v-toolbar>
        <v-content>
            <v-container fill-height>
                <v-layout justify-center align-center>
                    <v-flex shrink>
                        <v-tooltip right>
                            <v-btn slot="activator" :href="source" icon large target="_blank">
                                <v-icon large>code</v-icon>
                            </v-btn>
                            <span>Source</span>
                        </v-tooltip>
                        <v-tooltip right>
                            <v-btn slot="activator" icon large href="https://codepen.io/johnjleider/pen/YeRKwQ" target="_blank">
                                <v-icon large>mdi-codepen</v-icon>
                            </v-btn>
                            <span>Codepen</span>
                        </v-tooltip>
                    </v-flex>
                </v-layout>
            </v-container>
        </v-content>
    </v-app>

    <script>
        new Vue({
            el: '#inspire',
            data: {
                drawer: true,
                items: [
                    { icon: 'trending_up', text: 'Most Popular' },
                    { icon: 'subscriptions', text: 'Subscriptions' },
                    { icon: 'history', text: 'History' },
                    { icon: 'featured_play_list', text: 'Playlists' },
                    { icon: 'watch_later', text: 'Watch Later' }
                ],
                items2: [
                    { picture: 28, text: 'Joseph' },
                    { picture: 38, text: 'Apple' },
                    { picture: 48, text: 'Xbox Ahoy' },
                    { picture: 58, text: 'Nokia' },
                    { picture: 78, text: 'MKBHD' }
                ],
                avatar_items: [
                    { title: 'Click Me' },
                    { title: 'Click Me' },
                    { title: 'Click Me' },
                    { title: 'Click Me 2' }
                ]
            },
            methods: {
                reverseMessage: function () {
                    this.message = this.message.split('').reverse().join('')
                }
            },
            props: {
                source: String
            }
        })
    </script>
</body>

</html>