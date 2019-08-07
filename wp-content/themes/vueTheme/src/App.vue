<template>
	<section id="app" class="hero is-info is-medium">
		<div class="hero-head">
			<nav class="navbar">
				<div class="container">
					<div class="navbar-brand">
						<a class="navbar-item">
							<img src="./assets/vuewp-logo.png" alt="Logo">
						</a>
						<span :class="{'is-active':toggleNav}" @click="toggleNavFn" class="navbar-burger burger" data-target="navbarMenuHeroB">
							<span></span>
							<span></span>
							<span></span>
						</span>
					</div>
					<div :class="{'is-active':toggleNav}" id="navbarMenuHeroB" class="navbar-menu">
						<div class="navbar-end">
							<div v-for="menuItem in getManuState" :key="menuItem.ID">
								<router-link :to="menuItem.url" class="navbar-item" v-html="menuItem.title"></router-link>
							</div>
							<!-- <router-link to="/" class="navbar-item">Home</router-link> is-active
							<router-link to="/be-like-water" class="navbar-item">Be like water</router-link> -->
							<!-- <a class="navbar-item">
								Documentation
							</a>
							<span class="navbar-item">
								<a class="button is-info is-inverted">
									<span class="icon">
									<i class="fab fa-github"></i>
									</span>
									<span>Download</span>
								</a>
							</span> -->
						</div>
					</div>
				</div>
			</nav>
		</div>

		<!-- <transition
			name="fade"
			mode="out-in"
		> -->
			<router-view/>
		<!-- </transition> -->

	</section>
</template>


<script>
	import { mapGetters, mapActions } from 'vuex';
	export default {
		name: 'app',
		data () {
			return {
				toggleNav: false,
				mainMenuItems: []
			};
		},

		created () {
			this.getMenu();

			this.mainMenuItems = this.getManuState;

		},

		computed: {
			...mapGetters(['getManuState'])
		},

		methods: {
			...mapActions(['getMenu']),

			toggleNavFn () {
				this.toggleNav = !this.toggleNav;
			}
		},

		watch:{
			$route (){
				this.toggleNav = false;
			}
		}
	};

</script>

