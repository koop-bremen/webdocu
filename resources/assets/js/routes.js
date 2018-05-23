import VueRouter from 'vue-router';

let routes = [

	{

		path: '/',

		component: require('./components/Home')

	},

	{

		path: '/places',

		component: require('./components/Places')

	},

	{

		path: '/tags',

		component: require('./components/Tags')

	},

	{

		path: '/persons',

		component: require('./components/Persons')

	},

	{

		path: '/authors',

		component: require('./components/Authors')

	},

	{

		path: '/audios',

		component: require('./components/Audios')

	},

	{

		path: '/videos',

		component: require('./components/Videos')

	},

	{

		path: '/images',

		component: require('./components/Images')

	},

	{

		path: '/texts',

		component: require('./components/Texts')

	}

];

export default new VueRouter({

	routes,

	linkActiveClass: 'is-active'

});