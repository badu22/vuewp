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
				api1: process.env.VUE_APP_URL_SERVICES + `categories?slug=${this.section}`,
				api2: process.env.VUE_APP_URL_SERVICES + `posts?categories=`,
				qposts: '/posts',
				qcategory: '/categories/'
			}
		},
		props: [
			'section',
			'parentsection'
		],
		mounted() {
			// console.log(this.section, this.parentsection);
			axios.get(this.api1)
				.then(response => {
				// JSON responses are automatically parsed.
				this.cid = response.data[0].id;
				this.cname = response.data[0].name;
				// console.log(this.cid);
				// console.log(this.api2 + this.cid);

				axios.get(this.api2 + this.cid)
					.then(response => {
					// JSON responses are automatically parsed.
					this.posts = response.data;
					// console.log(this.posts);
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

		// watch:{
		// 	$route (to, from){
		// 		// console.log(to, from);
		// 	}
		// }
	}
</script>


