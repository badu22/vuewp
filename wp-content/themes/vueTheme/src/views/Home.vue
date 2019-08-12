<template>
	<div>
		<!-- <h1>Home</h1> -->
		<div v-if="loading">Loading</div>
		<div v-else>
			<div v-for="(post, index) in edata" :key="post.ID" :class="{'is-link':everySecond(index)}" class="hero-body">
				<!-- <div class="backgroundImage">
					<picture>
						<source media="(min-width: 1025px)" :srcset="post.featuredImage">
						<img :src="post.featuredImageMobile" alt="Flowers">
					</picture>
				</div> -->
				<div class="container">
					<p class="title">{{ post.title }}</p>
					<div class="content" v-html="post.excerpt"></div>
					<div class="content"><p>
						in category <a :href="base+post.cdetails[0].shortSlug">{{ post.cdetails[0].name }}</a>
					</p></div>
					<!-- <div><a :href="base+post.slug" class="button is-link">Show more</a></div> -->
					<div><a :href="base+post.cdetails[0].shortSlug+post.id+'/'+post.slug" class="button is-link">Show more</a></div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	import axios from "axios";
	export default {
		name: 'home',
		data(){
			return {
				loading: true,
				posts: [],
				cate: [],
				edata: [],
				// api: 'http://www.boris-badurina.from.hr/marko/wp-json/markers/v1/post'
				base: process.env.BASE_URL,
				api: process.env.VUE_APP_URL_SERVICES,
				qposts: 'posts?_embed',
				qcategory: 'categories'
			}
		},
		mounted() {

			// console.log(process.env);

			axios.all([
				axios.get(this.api + this.qposts),
				axios.get(this.api + this.qcategory)
			])
			.then(axios.spread( (posts, categs) => {
				//... but this callback will be executed only when both requests are complete.
				this.posts = posts.data;
				this.cats = categs.data;

				this.posts.map( (post) => {
					let item = {};
					item.title = post.title.rendered;
					item.slug = post.slug;
					item.id = post.id;
					item.content = post.content.rendered;
					item.excerpt = post.excerpt.rendered;
					item.featuredImage = ("wp:featuredmedia" in post._embedded) === false ? null : post._embedded['wp:featuredmedia']['0'].media_details.sizes.article_featured.source_url;
					item.featuredImageMobile = ("wp:featuredmedia" in post._embedded) === false ? null : post._embedded['wp:featuredmedia']['0'].media_details.sizes.large.source_url;
					item.cid = post.categories[0];
					item.cdetails = [];
					item.pid = post.id;
					this.edata.push(item);
					// console.log(post_embedded['wp:featuredmedia'] === undefined);
					// console.log(post);
				});

				// console.log(posts);

				this.cats.map( (cat) => {
					// console.log(cat);
					let citem = {};
					citem.name = cat.name;
					citem.id = cat.id;
					citem.slug = cat.slug+'/';
					citem.shortSlug = cat.link.replace(process.env.VUE_APP_URL_APP+'category/','');
					citem.fullSlug = cat.link.replace(process.env.VUE_APP_URL_APP,'');
					citem.link = cat.link;

					this.edata.map( (item) => {
						if ( cat.id === item.cid ) {
							item.cdetails.push(citem);
						}
					});
				});
				console.log('fin', this.edata);
			})).finally(this.loading = false);


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


