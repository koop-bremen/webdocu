<template>
	
	<div class="person columns">
		
		<form @submit.prevent="onSubmit" @keydown="form.errors.clear()" method="get" accept-charset="utf-8">

			<div class="field name column">
			
				<input class="input" type="text" placeholder="name" v-model="form.name">

				<span class="help is-danger" 

					v-if="form.errors.has('name')" 

					v-text="form.errors.get('name')">
						
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

				form: new Form({

					name: ''

				})
			}
		},

		methods: {

			onSubmit() {

				this.form
					
					.post( '/persons' )

					.then(

						(name) => {

							this.$emit('completed', name);

							this.form.name = '';

						});

			}
		}

	}

</script>