<template>
  	<div class="hero-body">
		<div class="container">
			<div v-if="post.title">
				<h1>222222222</h1>
				<h1 class="title">{{ post.title.rendered }}</h1>
				<div v-html="post.content.rendered" class="content"></div>
				<router-link to="/" class="button is-link">Go to Home</router-link>
			</div>
			<div v-else>loading</div>
		</div>
  	</div>
</template>
<script>
	import axios from "axios";
	export default {
		name: 'page',
		data(){
			return {
				post: [],
				// api: 'http://boris-badurina.from.hr/marko/wp-json/markers/v1/post2/'
				api: process.env.VUE_APP_URL_SERVICES + 'pages/?slug='
			}
		},
		props: [
			'slug'
		],
		created () {
			console.log('1111111111111111111111111');
		},
		mounted() {

			console.log(process.env);


			return new Promise((resolve, reject) => {
				console.log(this.api + this.slug);
				axios.get(this.api + this.slug)
					.then(response => {
					// JSON responses are automatically parsed.
					this.post = response.data[0];
					console.log(response.data);
					resolve();
				})
				.catch(e => {
					this.errors.push(e);
					reject();
				});
			});
		}

	}
</script>


