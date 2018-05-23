<template>
	
	<div class="place columns">
		
		<form @submit.prevent="onSubmit" @keydown="form.errors.clear()" method="get" accept-charset="utf-8">

			<div class="field name column">
			
				<vue-google-autocomplete
					ref="name"
				    id="map"
				    classname="form-control"
				    placeholder="Stadt"
				    v-on:placechanged="getAddressData"
				    types="(cities)"
				    :country="['de', 'mk', 'xk', 'rs', 'fr']"
				>

				</vue-google-autocomplete>

				<span class="help is-danger" 

					v-if="form.errors.has('name')" 

					v-text="form.errors.get('name')">
						
				</span>
	
			</div>

			<div class="field longitude column">
				
				<input class="input" type="number" step="0.000000000000001" placeholder="Längengrad" v-model="form.longitude">

				<span class="help is-danger" 

					v-if="form.errors.has('longitude')" 

					v-text="form.errors.get('longitude')">
						
				</span>


			</div>

			<div class="field latitude column">
				
				<input class="input" type="number" step="0.000000000000001" placeholder="Breitengrad" v-model="form.latitude">

				<span class="help is-danger" 

					v-if="form.errors.has('latitude')" 

					v-text="form.errors.get('latitude')">
						
				</span>

			</div>

			<div class="field control column">
	    
	    		<button class="button is-link" :disabled="form.errors.any()">Add</button>
	  		
	  		</div>

		</form>

	</div>

</template>

<script>

	import VueGoogleAutocomplete from 'vue-google-autocomplete';

	export default {

		components: { VueGoogleAutocomplete },

		data() {

			return {

				form: new Form({

					name: '',
					longitude: 0,
					latitude: 0

				})
			}
		},

		mounted() {
            // To demonstrate functionality of exposed component functions
            // Here we make focus on the user input
            this.$refs.name.focus();
        },

		methods: {

			onSubmit() {

				this.form
					
					.post( '/places' )

					.then(

						(place) => {

							this.$emit('completed', place);

							this.$refs.name.clear();

						});

			},
			getAddressData: function (addressData) {

				console.log(addressData);
             
                this.form.name = addressData.locality;

                this.form.longitude = addressData.longitude;

                this.form.latitude = addressData.latitude;
            
            }
		}

	}

</script>