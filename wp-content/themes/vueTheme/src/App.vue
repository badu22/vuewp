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
							<router-link to="/" class="navbar-item">Home</router-link> <!-- is-active-->
							<router-link to="/be-like-water" class="navbar-item">Be like water</router-link>
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

		<router-view/>

	</section>
</template>


<script>
	export default {
		name: 'app',
		 data () {
			return {
				toggleNav: false
			};
		},

		methods: {
			toggleNavFn () {
				this.toggleNav = !this.toggleNav;
				// // Get all "navbar-burger" elements
				// const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

				// // Check if there are any navbar burgers
				// if ($navbarBurgers.length > 0) {

				// 	// Add a click event on each of them
				// 	$navbarBurgers.forEach( el => {
				// 		el.addEventListener('click', () => {

				// 			// Get the target from the "data-target" attribute
				// 			const target = el.dataset.target;
				// 			const $target = document.getElementById(target);

				// 			// Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
				// 			el.classList.toggle('is-active');
				// 			$target.classList.toggle('is-active');

				// 		});
				// 	});
				// }
			}
		}
	};

</script>

