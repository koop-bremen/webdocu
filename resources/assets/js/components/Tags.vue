<template>

    <div>

        <table class="table table-striped">

            <thead>

                <tr>

                    <th>#</th>      
                    <th>Name</th>
                    <th></th>

                </tr>

            </thead>

            <tbody>

                <tr v-for="(tag, index) in tags">

                    <td>{{ tag.id }}</td>
                    <td>
                        
                        <input type="text" name="tagName" @blur="updateTag(tag.id)" v-model="tags[index].name" v-text="tag.name">

                    </td>
                    <td><a class="delete is-medium" @click="deleteTag(tag.id)"></a>
</td>

                </tr>

            </tbody>

        </table>

        <add-to-tags @completed="addTag"></add-to-tags>
    
    </div>

</template>

<script>

    import AddToTags from './AddToTags';

    export default {

        components:{ AddToTags },
    
        data() {
            return {

                tags: []

            }
    
        },

        created() {

            axios.get( 'tags' ).then( ( {data} ) => this.tags = data )

        },

        methods: {

            addTag(tag) {

                this.tags.push(tag);

            },

            deleteTag(tagId) {

                axios

                    .delete( 'tags/' + tagId )

                    .then( ( {data} ) => {

                        this.tags = this.tags.filter( 

                            (element) => {

                                return element.id != data

                            })
                        });

            },

            updateTag(tagId) {

                let tag = this.tags.filter( 

                    (tag) => { 

                        return tag.id === tagId 

                    })[0];

                axios

                    .put( 'tags/' + tagId, { tag } )

                    .then( response => {

                        console.log(response);

                    });

            }
        },
    
    }

</script>
