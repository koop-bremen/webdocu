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

                <tr v-for="(person, index) in persons">

                    <td>{{ person.id }}</td>
                    <td>
                        
                        <input type="text" name="personName" @blur="updatePerson(person.id)" v-model="persons[index].name" v-text="person.name">

                    </td>
                    <td><a class="delete is-medium" @click="deletePerson(person.id)"></a>
</td>

                </tr>

            </tbody>

        </table>

        <add-to-persons @completed="addPerson"></add-to-persons>
    
    </div>

</template>

<script>

    import AddToPersons from './AddToPersons';

    export default {

        components:{ AddToPersons },
    
        data() {
            return {

                persons: []

            }
    
        },

        created() {

            axios.get( 'persons' ).then( ( {data} ) => this.persons = data )

        },

        methods: {

            addPerson(person) {

                this.persons.push(person);

            },

            deletePerson(personId) {

                axios

                    .delete( 'persons/' + personId )

                    .then( ( {data} ) => {

                        this.persons = this.persons.filter( 

                            (element) => {

                                return element.id != data

                            })
                        });

            },

            updatePerson(personId) {

                let person = this.persons.filter( 

                    (person) => { 

                        return person.id === personId 

                    })[0];

                axios

                    .put( 'persons/' + personId, { person } )

                    .then( response => {

                        console.log(response);

                    });

            }
        },
    
    }

</script>
