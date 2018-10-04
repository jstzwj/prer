<template>
    <v-navigation-drawer id="navbar" v-model="drawer" fixed clipped app>
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
</template>

<script>
    export default {
        data: () => ({
            drawer: true,
            nav_items: [
                { icon: 'trending_up', text: 'Most Popular' },
                { icon: 'subscriptions', text: 'Subscriptions' },
                { icon: 'history', text: 'History' },
                { icon: 'featured_play_list', text: 'Playlists' },
                { icon: 'watch_later', text: 'Watch Later' }
            ],
            subscripion_items: [
                { picture: 28, text: 'Joseph' },
                { picture: 38, text: 'Apple' },
                { picture: 48, text: 'Xbox Ahoy' },
                { picture: 58, text: 'Nokia' },
                { picture: 78, text: 'MKBHD' }
            ]
        })
    }
</script>