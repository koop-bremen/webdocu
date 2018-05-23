<template>

    <div>

        <table class="table table-striped">

            <thead>

                <tr>

                    <th>#</th>      
                    <th>Name</th>
                    <th>Längengrad</th>        
                    <th>Breitengrad</th>
                    <th></th>

                </tr>

            </thead>

            <tbody>

                <tr v-for="(place, index) in places">

                    <td>{{ place.id }}</td>
                    <td>
                        
                        <input type="text" name="placeName" @blur="updatePlace(place.id)" v-model="places[index].name" v-text="place.name">

                    </td>
                    <td>

                        <input type="number" name="longitude" @blur="updatePlace(place.id)" step="0.000000000000001" v-model="places[index].longitude" v-text="place.longitude">

                    </td>
                    <td>
                        
                        <input type="number" name="latitude" step="0.000000000000001" @blur="updatePlace(place.id)" v-model="places[index].latitude" v-text="place.latitude">

                    </td>
                    <td><a class="delete is-medium" @click="deletePlace(place.id)"></a>
</td>

                </tr>

            </tbody>

        </table>

        <add-to-places @completed="addPlace"></add-to-places>

    </div>

</template>

<script>

    import AddToPlaces from './AddToPlaces';

    export default {

        components: { AddToPlaces },

        data: () => { 

            return {

                places: []

            }
        },

        created() {

            axios.get( 'places' ).then( ( {data} ) => this.places = data )

        },

        methods: {

            addPlace(place) {

                this.places.push(place);

            },

            deletePlace(placeId) {

                axios

                    .delete( 'places/' + placeId )

                    .then( ( {data} ) => {

                        this.places = this.places.filter( 

                            (element) => {

                                return element.id != data

                            })
                        });

            },

            updatePlace(placeId) {

                let place = this.places.filter( 

                    (place) => { 

                        return place.id === placeId 

                    })[0];

                axios

                    .put( 'places/' + placeId, { place } )

                    .then( response => {

                        console.log(response);

                    });

            }
        },

    }

</script>

<style type="text/css" media="screen">
    
    input[type=text]{
        
        background-color: white;
        border: 0;

    }

    input[type=number]{
        
        background-color: white;
        border: 0;
        -moz-appearance:textfield;

    }

    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
        -webkit-appearance: none;
        appearance: none;
        margin: 0; 
    }

    input:focus {
        background: lightgrey;
    }

</style>