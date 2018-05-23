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

                <tr v-for="(video, index) in videos">

                    <td>{{ video.id }}</td>
                    <td>{{ video.multimedia_content_part.title }}</td>
                    <td>{{ video.multimedia_content_part.content_part.content_creation_date }}</td>
                    <td>{{ video.multimedia_content_part.content_part.place.name }}</td>
                    <td><span v-for="(person) in video.multimedia_content_part.content_part.persons">{{ person.name }},</span></td>

                    <td>
                        <a class="delete is-medium" @click="deleteVideo(video.id)"></a>
                    </td>
                    <td>
                        <a class="edit is-medium" @click="editVideo(video.id)">Edit</a>
                    </td>

                </tr>

            </tbody>

        </table>

        <add-to-videos @completed="addVideo"></add-to-videos>
    
    </div>

</template>

<script>

    import AddToVideos from './AddToVideos';

    export default {

        components:{ AddToVideos },
    
        data() {
            return {

                videos: []

            }
    
        },

        created() {

            axios.get( 'videos' ).then( ( {data} ) => this.videos = data )

        },

        methods: {

            addVideo(video) {

                this.videos.push(video);

            },

            deleteVideo(videoId) {

                axios

                    .delete( 'videos/' + videoId )

                    .then( ( {data} ) => {

                        this.videos = this.videos.filter( 

                            (element) => {

                                return element.id != data

                            })
                        });

            },

            updateVideo(videoId) {

                let video = this.videos.filter( 

                    (video) => { 

                        return video.id === videoId 

                    })[0];

                axios

                    .put( 'videos/' + videoId, { video } )

                    .then( response => {

                        console.log(response);

                    });

            }
        },
    
    }

</script>
