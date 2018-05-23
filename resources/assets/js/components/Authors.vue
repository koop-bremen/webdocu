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

                <tr v-for="(author, index) in authors">

                    <td>{{ author.id }}</td>
                    <td>
                        
                        <input type="text" name="authorName" @blur="updateAuthor(author.id)" v-model="authors[index].name" v-text="author.name">

                    </td>
                    <td><a class="delete is-medium" @click="deleteAuthor(author.id)"></a>
</td>

                </tr>

            </tbody>

        </table>

        <add-to-authors @completed="addAuthor"></add-to-authors>
    
    </div>

</template>

<script>

    import AddToAuthors from './AddToAuthors';

    export default {

        components:{ AddToAuthors },
    
        data() {
            return {

                authors: []

            }
    
        },

        created() {

            axios.get( 'authors' ).then( ( {data} ) => this.authors = data )

        },

        methods: {

            addAuthor(author) {

                this.authors.push(author);

            },

            deleteAuthor(authorId) {

                axios

                    .delete( 'authors/' + authorId )

                    .then( ( {data} ) => {

                        this.authors = this.authors.filter( 

                            (element) => {

                                return element.id != data

                            })
                        });

            },

            updateAuthor(authorId) {

                let author = this.authors.filter( 

                    (author) => { 

                        return author.id === authorId 

                    })[0];

                axios

                    .put( 'authors/' + authorId, { author } )

                    .then( response => {

                        console.log(response);

                    });

            }
        },
    
    }

</script>
