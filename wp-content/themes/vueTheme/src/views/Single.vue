<template>
	<div class="hero-body">
		<div class="feauredImage" v-if="media.full">
			<picture>
				<source media="(min-width: 1025px)" :srcset="media.full">
				<img :src="media.large" alt="Flowers">
			</picture>
			<div class="absoluteContainerWrapper">
				<div class="container">
					<div v-if="post.title">
						<h1 class="title">{{ post.title.rendered }}</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div v-if="post.title">
				<h1 class="title" v-if="!media.full">{{ post.title.rendered }}</h1>
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
		name: 'single',
		data(){
			return {
				post: [],
				media: {
					full: '',
					large: ''
				},
				// api: process.env.VUE_APP_URL_SERVICES + 'posts/?slug='
				apiPostCall: process.env.VUE_APP_URL_SERVICES + 'posts/?slug=' + this.slug + '&_embed'
			}
		},
		props: [
			'slug',
			'catSlug'
		],
		mounted() {

			console.log(process.env);

			console.log(this.apiPostCall);
			axios.get(this.apiPostCall)
				.then(response => {
				// JSON responses are automatically parsed.
				this.post = response.data[0];
				if ( this.post._embedded['wp:featuredmedia'] !== undefined ) {
					this.media.full = this.post._embedded['wp:featuredmedia']['0'].media_details.sizes.article_featured.source_url;
					this.media.large = this.post._embedded['wp:featuredmedia']['0'].media_details.sizes.large.source_url;
				}
				console.log(response.data[0]);
			})
			.catch(e => {
				this.errors.push(e);
			});
		}

	}
</script>


