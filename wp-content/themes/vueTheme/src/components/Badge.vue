<template>
	<div class="badge" :id="name">
		<img :src=img width=500/>
		<h2>{{ name }}</h2>
	</div>
</template>
		
<script>
	export default {
		name: 'Badge',
		props: {
			name: String,
			img: String
		}
	}
</script>
		
<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
		
</style>