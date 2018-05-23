<template>

    <div>

        <table class="table table-striped">

            <thead>

                <tr>

                    <th>#</th>
                    <th>Titel</th>
                    <th>Erstellungsdatum</th>
                    <th>Ort</th>
                    <th>Personen</th>
                    <th></th>
                    <th></th>

                </tr>

            </thead>

            <tbody>

                <tr v-for="(audio, index) in audios">

                    <td>{{ audio.id }}</td>
                    <td>{{ audio.multimedia_content_part.title }}</td>
                    <td>{{ audio.multimedia_content_part.content_part.content_creation_date }}</td>
                    <td>{{ audio.multimedia_content_part.content_part.place.name }}</td>
                    <td><span v-for="(person) in audio.multimedia_content_part.content_part.persons">{{ person.name }},</span></td>

                    <td>
                        <a class="delete is-medium" @click="deleteAudio(audio.id)"></a>
                    </td>
                    <td>
                        <a class="edit is-medium" @click="editAudio(audio.id)">Edit</a>
                    </td>

                </tr>

            </tbody>

        </table>

        <add-to-audios @completed="addAudio"></add-to-audios>
    
    </div>

</template>

<script>

    import AddToAudios from './AddToAudios';

    export default {

        components:{ AddToAudios },
    
        data() {
            return {

                audios: []

            }
    
        },

        created() {

            axios.get( 'audios' ).then( ( {data} ) => this.audios = data )

        },

        methods: {

            addAudio(audio) {

                this.audios.push(audio);

            },

            deleteAudio(audioId) {

                axios

                    .delete( 'audios/' + audioId )

                    .then( ( {data} ) => {

                        this.audios = this.audios.filter( 

                            (element) => {

                                return element.id != data

                            })
                        });

            },

            updateAudio(audioId) {

                let audio = this.audios.filter( 

                    (audio) => { 

                        return audio.id === audioId 

                    })[0];

                axios

                    .put( 'audios/' + audioId, { audio } )

                    .then( response => {

                        console.log(response);

                    });

            }
        },
    
    }

</script>
