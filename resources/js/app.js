window.Vue = require('vue');
window.axios = require('axios');
import VuePaginate from 'vue-paginate'
Vue.use(VuePaginate)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('dash-menu', require('./components/DashMenu.vue').default);
Vue.component('content-component', require('./components/ContentComponent.vue').default);
Vue.component('dash-list', require('./components/listadoComponent.vue').default);
Vue.component('add-product', require('./components/AddProduct.vue').default);
Vue.component('edit-product', require('./components/EditProduct.vue').default);
Vue.component('login-component', require('./components/loginComponent.vue').default);

import router from './routes'

const app = new Vue({
    router,
    mounted() {
        this.getAllProducts();
    },
    el: '#app',
    data() {
        return {
            productos: [],
            /*Datos de inico de sesion*/
            username: [],
            email: [],
            password: [],
            /*////////*/
            urlProductos: 'http://ecommerce.test/api/products',
            urlLogin: 'http://ecommerce.test/api/login',
        }
    },
    methods: {
        getAllProducts: function(){
            axios.get('http://ecommerce.test/api/products')
            .then( respuesta => {
                this.productos = respuesta.data;
                console.log(respuesta);
            }).catch (
                (error) => console.log(error)
            );
        },

    },

});
