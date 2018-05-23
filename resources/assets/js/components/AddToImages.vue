<template>
    
    <div class="content-part columns">
        
        <form @submit.prevent="onSubmit" @keydown="form.errors.clear()" method="get" accept-charset="utf-8">

            <div class="field place column">

                <div class="control">
        
                    <label class="label">Ort</label>

                    <div class="select is-fullwidth">
                
                        <select v-model="form.place">
                            <option v-for="place in places" v-bind:value="place.id">
                                {{ place.name }}
                            </option>
                        </select>

                    </div>

                </div>

            </div>

            <div class="field person column">

                <div class="control">
                    
                    <div class="select is-multiple is-fullwidth">

                        <label class="label">Zugeordnete Person(en)</label>

                        <select multiple size="4" v-model="form.persons">
                            <option v-for="person in persons" v-bind:value="person.id">
                                {{ person.name }}
                            </option>
                        </select>

                    </div>

                </div>

            </div>

            <div class="field content-creation-date column">

                <label class="label">Datum des Inhalts</label>


                <datepicker placeholder="European Format ('d-m-Y')" :config="{ dateFormat: 'd-m-Y', static: true }" v-model="form.contentCreationDate" input-class="is-fullwidth" wrapper-class="is-fullwidth"></datepicker>

                <span class="help is-danger" 

                    v-if="form.errors.has('contentCreationDate')" 

                    v-text="form.errors.get('contentCreationDate')">
                        
                </span>

            </div>

            <div class="field author column">

                <div class="control">
                    
                    <div class="select is-multiple is-fullwidth">

                        <label class="label">Autor_innen</label>

                        <select multiple size="4" v-model="form.authors">
                            <option v-for="author in authors" v-bind:value="author.id">
                                {{ author.name }}
                            </option>
                        </select>

                    </div>

                </div>

            </div>

            <div class="field tags column">

                <div class="control">
                    
                    <div class="select is-multiple is-fullwidth">

                        <label class="label">Schlagworte</label>

                        <select multiple size="4" v-model="form.tags">
                            <option v-for="tag in tags" v-bind:value="tag.id">
                                {{ tag.name }}
                            </option>
                        </select>

                    </div>

                </div>

            </div>

            <div class="field copyright-notice column">

                <label class="label">Copyright-Text</label>

                <input class="input is-fullwidth" type="text" placeholder="copyrightNotice" v-model="form.copyrightNotice" >

                <span class="help is-danger" 

                    v-if="form.errors.has('copyrightNotice')" 

                    v-text="form.errors.get('copyrightNotice')">
                        
                </span>

            </div>

            <div class="field title column">

                <label class="label">Titel</label>

                <input class="input is-fullwidth" type="text" placeholder="title" v-model="form.title">

                <span class="help is-danger" 

                    v-if="form.errors.has('title')" 

                    v-text="form.errors.get('title')">
                        
                </span>

            </div>

            <div class="field description column">

                <label class="label">Beschreibung</label>
                
                <div class="control">
                
                    <textarea class="textarea is-fullwidth" placeholder="description" v-model="form.description"></textarea>

                    <span class="help is-danger" 

                        v-if="form.errors.has('description')" 

                        v-text="form.errors.get('description')">
                            
                    </span>

                </div>

            </div>

            <div class="file-has-name">
              
                <label class="file-label">
                
                    <input class="file-input is-fullwidth" v-on:change="onFileChange" type="file" name="resume">
                
                        <span class="file-cta">
                            
                            <span class="file-icon">
                                <svg class="svg-inline--fa fa-upload fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="upload" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><!-- <i class="fas fa-upload"></i> -->
                            </span>

                            <span class="file-label">
                                Datei auswählen...
                            </span>
                
                        </span>

                    <span class="file-name">
                        {{ form.filename }}
                    </span>
              
                </label>
            
            </div>



            <div class="field control column">
        
                <button class="button is-link" :disabled="form.errors.any()">Add</button>
            
            </div>

        </form>

    </div>

</template>

<script>
    import Datepicker from 'vue-bulma-datepicker'

    export default {

        components: {
            Datepicker
        },
    
        data() {
            return {

                places: [],
                persons: [],
                authors: [],
                tags: [],

                form: new Form({

                    place: '',
                    contentCreationDate: '',
                    copyrightNotice: '',
                    authors: [],
                    persons: [],
                    tags: [],
                    title: '',
                    description: '',
                    file: '',
                    filename: ''

                })


            }
    
        },

        created() {

            axios.get( 'places' ).then( ( {data} ) => this.places = data )
            axios.get( 'persons' ).then( ( {data} ) => this.persons = data )
            axios.get( 'authors' ).then( ( {data} ) => this.authors = data )
            axios.get( 'tags' ).then( ( {data} ) => this.tags = data )

        },

        methods: {

            onSubmit() {

                this.form
                    
                    .post( '/images' )

                    .then(

                        (image) => {

                            this.$emit('completed', image);

                            //this.$refs.name.clear();

                        });

            },

            onFileChange(e) {
                
                let files = e.target.files || e.dataTransfer.files;
                
                if (!files.length)
                    return;

                this.createImage( files[0] );
            
            },

            createImage(file) {

                let reader = new FileReader();
                
                let vm = this;
                
                reader.onload = (e) => {
                    vm.form.file = e.target.result;
                };

                this.form.filename = file.name;

                reader.readAsDataURL(file);
            }
        },
    
    }

</script>
