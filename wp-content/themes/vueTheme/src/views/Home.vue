<template>
	<div>
		<!-- <h1>Home</h1> -->
		<div v-if="loading">Loading</div>
		<div v-else>
			<div v-for="(post, index) in edata" :key="post.ID" :class="{'is-link':everySecond(index)}" class="hero-body">
				<div class="container">
					<p class="title">{{ post.title }}</p>
					<div class="content" v-html="post.excerpt"></div>
					<div class="content"><p>
						in category <a :href="base+post.cdetails[0].fullSlug">{{ post.cdetails[0].name }}</a>
					</p></div>
					<!-- <div><a :href="base+post.cdetails[0].slug+post.slug" class="button is-link">Show more</a></div> -->
					<div><a :href="base+post.slug" class="button is-link">Show more</a></div>
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
				qposts: 'posts',
				qcategory: 'categories'
			}
		},
		mounted() {

			console.log(process.env);

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
					item.content = post.content.rendered;
					item.excerpt = post.excerpt.rendered;
					item.cid = post.categories[0];
					item.cdetails = [];
					item.pid = post.id;
					this.edata.push(item);
				});

				this.cats.map( (cat) => {
					console.log(cat);
					let citem = {};
					citem.name = cat.name;
					citem.id = cat.id;
					citem.slug = cat.slug+'/';
					citem.fullSlug = 'categories/' + cat.slug;
					citem.link = cat.link;

					this.edata.map( (item) => {
						// console.log('item.id', item);
						if ( cat.id === item.cid ) {
							item.cdetails.push(citem);
						}
					});
				});
				console.log('fin', this.edata);
			})).finally(this.loading = false);
			/*
			axios.get(this.api + this.qposts)
				.then(response => {
				// JSON responses are automatically parsed.
				this.posts = response.data;
				this.posts.map( (post) => {
					let item = {};
					item.title = post.title.rendered;
					item.content = post.content.rendered;
					item.excerpt = post.excerpt.rendered;
					item.cid = post.categories[0];
					item.pid = post.id;
					this.edata.push(item);
				});
			})
			.catch(e => {
				this.errors.push(e)
			});

			axios.get(this.api + this.qcategory)
				.then(response => {
				this.cats = response.data;

				this.cats.map( (cat) => {

					console.log('cat.id', cat.id);
					console.log('edata', this.edata);
					for (let i = 0; i < this.edata.length; i++) {
						console.log('iiiiiiiii', this.test[i]);
					}
					this.test.map( (item) => {
						console.log('item.id', item);
					// 	if ( cat.id === item.cid ) {
					// 		console.log('1111111', item.cid);
					// 	}
					});
				});

				console.log(this.edata);
			})
			.catch(e => {
				this.errors.push(e)
			});
*/
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


