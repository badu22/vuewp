import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

export default new Vuex.Store({
	state: {
		mainMenu: '',
		currentSection: ''
	},
	getters: {
		getManuState: state => {
            return state.mainMenu;
        }
	},
	mutations: {
		setMenu (state, data) {
			state.mainMenu = data;
		}
	},
	actions: {
		getMenu ({ commit }) {

			// let navigation = axios.get(process.env.VUE_APP_URL_SERVICES + 'menu')
			axios.get(process.env.VUE_APP_URL_SERVICES + 'menu')
				.then(response => {
					let data = response.data;
					let navdata = [];

					data.map( (menuItem) => {
						let item = {};
						item.ID = menuItem.ID;
						item.title = menuItem.title;
						item.url = menuItem.url.replace(process.env.VUE_APP_URL_APP,'/');
						navdata.push(item);
					});

					commit('setMenu', navdata);
					// console.log(response.data);
				})
				.catch(error => {
					this.errors.push(error);
				});

			// let navigation = apiStaging.get('navigation/anchors/menu_master').then(response => {



			// }).catch(error => {
			// 	console.log(error);
			// });

			// return navigation;

		}
	}
})
