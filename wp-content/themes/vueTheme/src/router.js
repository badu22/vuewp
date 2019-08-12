import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import Single from './views/Single.vue'
import Page from './views/Page.vue'
import Categories from './views/Categories.vue'

Vue.use(Router)

export default new Router({
	mode: 'history',
	base: process.env.BASE_URL,
	routes: [
		{
			path: '/',
			name: 'home',
			component: Home
		},
		{
			path: '/about',
			name: 'about',
			// route level code-splitting
			// this generates a separate chunk (about.[hash].js) for this route
			// which is lazy-loaded when the route is visited.
			// component: () => import(/* webpackChunkName: "about" */ './views/About.vue')
		},
		{
			path: '/:parentsection?/:section',
			name: 'categories',
			component: Categories,
			props: true
		},
		{
			path: '/:parentsection?/:section/:id(\\d+)/:slug',
			name: 'single',
			component: Single,
			props: true
		},
		{
			path: '/:id(\\d+)/:slug',
			name: 'page',
			component: Page,
			props: true
		},
		// {
		// 	path: '/:parentsection/:section/:slug',
		// 	name: 'single',
		// 	component: Single,
		// 	props: true
		// },

	]
})
