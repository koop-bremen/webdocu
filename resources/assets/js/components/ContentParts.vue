<template>
	
	<div class="content-part columns">
		
		<form @submit.prevent="onSubmit" @keydown="form.errors.clear()" method="get" accept-charset="utf-8">

			<div class="field name column">

				<select v-model="form.place">
					<option v-for="place in places" v-bind:value="option.value">
						{{ option.text }}
					</option>
				</select>

				<input class="input" type="date" v-model="form.contentCreationDate">

				<span class="help is-danger" 

					v-if="form.errors.has('contentCreationDate')" 

					v-text="form.errors.get('contentCreationDate')">
						
				</span>

				<input class="input" type="text" placeholder="copyrightNotice" v-model="form.copyrightNotice">

				<span class="help is-danger" 

					v-if="form.errors.has('copyrightNotice')" 

					v-text="form.errors.get('copyrightNotice')">
						
				</span>
	
			</div>


			<div class="field control column">
	    
	    		<button class="button is-link" :disabled="form.errors.any()">Add</button>
	  		
	  		</div>

		</form>

	</div>

</template>

<script>

	export default {

		data() {

			return {

				places: [],

				form: new Form({

					name: '',
					place: '',
					copyrightNotice: ''

				})
			}
		},

		methods: {

			onSubmit() {

				this.form
					
					.post( '/authors' )

					.then(

						(name) => {

							this.$emit('completed', name);

							this.form.name = '';

						});

			}
		}

	}

</script>