import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)
import dash_list from './components/ListadoComponent'
import add_product from './components/AddProduct'
import edit_product from './components/EditProduct'
import login from './components/loginComponent'
import content from './components/ContentComponent'

export default new Router({
    routes: [
        {path: '/home', name: 'content-component',component: content},
        {path: '/productlist/', name: 'dash-list', component: dash_list},
        {path: '/addproduct/', name: 'add-product', component: add_product},
        {path: '/editproduct/:id', name: 'edit-product', component: edit_product},
        {path: '/', name: '', component: login},
    ],
    mode: 'history',
    
});