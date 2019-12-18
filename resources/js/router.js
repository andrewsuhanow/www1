

import VueRouter from 'vue-router';
import Page1 from'./view/Page1.vue'

export default new VueRouter({
	    routes: [
            {
                path: '/',
                component: Page1
            }
         ],
   	 mode: 'history'
	});
