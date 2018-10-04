@extends('layouts.app')

@section('title', 'Prer')

@section('sidebar')
@parent
@endsection

@section('navbar')
@parent
@endsection

@section('content')
<v-container fill-height grid-list-md>
    <v-layout justify-start align-start row wrap>
        <v-flex xs12 sm6 md3 xl2>
            <v-card>
                <v-img src="https://cdn.vuetifyjs.com/images/cards/house.jpg" height="200px">
                    <v-container fill-height fluid pa-2>
                        <v-layout fill-height>
                            <v-flex xs12 align-end flexbox>
                                <span class="headline white--text"></span>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-img>

                <v-card-title primary-title>
                    <div>
                        <div class="title mb-0">Valley Safari</div>
                        <div>JasonWang</div>
                    </div>
                </v-card-title>

                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn icon>
                        <v-icon>favorite</v-icon>
                    </v-btn>
                    <v-btn icon>
                        <v-icon>bookmark</v-icon>
                    </v-btn>
                    <v-btn icon>
                        <v-icon>share</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-flex>
    </v-layout>
</v-container>
@endsection

@section('js_script')
@endsection