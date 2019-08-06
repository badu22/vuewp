<template>
	<div>

		<!-- <h1>Categorie > {{ cname }}</h1> -->
		<!-- <div v-if="loading">Loading</div>
		<div v-else> -->
		<div v-for="(post, index) in posts" :key="post.ID" :class="{'is-link':everySecond(index)}" class="hero-body">
			<div class="container">
				<p class="title">{{ post.title.rendered }}</p>
				<div class="content" v-html="post.content.rendered"></div>
				<div><a :href="base+post.slug" class="button is-link">Show more</a></div>
			</div>
		</div>

	</div>
</template>
<script>
	import axios from "axios";
	export default {
		name: 'category',
		data(){
			return {
				loading: true,
				cid: null,
				cname: null,
				posts: [],
				base: process.env.BASE_URL,
				api1: process.env.VUE_APP_URL_SERVICES + `categories?slug=${this.slug}`,
				api2: process.env.VUE_APP_URL_SERVICES + `posts?categories=`,
				//api: `http://boris-badurina.from.hr/marko/wp-json/wp/v2/posts?filter[category_name]=${this.slug}`,
			/*
				solution  2 poziva
				1 = http://boris-badurina.from.hr/marko/wp-json/wp/v2/categories?slug=formula
				2 = http://www.boris-badurina.from.hr/marko/wp-json/wp/v2/posts?categories=5

				http://www.boris-badurina.from.hr/marko/wp-json/wp/v2/posts?categories=4
				http://www.boris-badurina.from.hr/marko/wp-json/wp/v2/posts?categories_name=sport
				/posts?filter[category_name]=MyCategory
				Posts: sitename.com/wp-json/wp/v2/posts?slug=post-slug
				Pages: sitename.com/wp-json/wp/v2/pages?slug=page-slug
				Custom post type: sitename.com/wp-json/wp/v2/POST_TYPE?slug=post-slug
			*/
				qposts: '/posts',
				qcategory: '/categories/'
			}
		},
		props: [
			'slug'
		],
		mounted() {

			axios.get(this.api1)
				.then(response => {
				// JSON responses are automatically parsed.
				this.cid = response.data[0].id;
				this.cname = response.data[0].name;
				console.log(this.cid);
				console.log(this.api2 + this.cid);

				axios.get(this.api2 + this.cid)
					.then(response => {
					// JSON responses are automatically parsed.
					this.posts = response.data;
					console.log(this.posts);
				})
				.catch(e => {
					this.errors.push(e);
				});

			})
			.catch(e => {
				this.errors.push(e);
			});


		},

		methods: {
			everySecond (n) {
				if (n % 2 == 0) {
					return true;
				}
			}
		}
	}
</script>


