<template>
                <div class="dash_info_container-inner">
                    <h1 class="dash_title">Products</h1>
                    <div class="dash_grid"> 
                        <div class="dash_card dash_table_container">
                                <div class="dash_card_actions_table">
                                    <p class="dash_card_title">Products {{ this.productos.length}}</p>
                                    <router-link :to="{name: 'add-product'}" id="btn_add_new_product" class="btn primary-btn dash_btn"><i class="remixicon-add-line"></i> Add new Product</router-link>
                                </div>
                                <paginate name="productos" :list="productos" :per="5">
                                    <div class="dash_table">
                                        <tr class="dash_table_row dash_table_row_header">
                                            <td class="dash_table_column short_column">
                                                <span>Id</span>
                                            </td>
                                            <td class="dash_table_column">
                                                <span>Product</span>
                                            </td>
                                            <td class="dash_table_column short_column">
                                                <span>Price</span>
                                            </td>
                                            <td class="dash_table_column short_column">
                                                <span>Quantity</span>
                                            </td>
                                            <td class="dash_table_column">
                                                <span>Description</span>
                                            </td>
                                            <td class="dash_table_column short_column">
                                                <span>Likes</span>
                                            </td>
                                            <td class="dash_table_column actions_column">
                                                <span>Actions</span>
                                            </td>
                                        </tr>
                                        <tr v-for="(producto, index) in paginated('productos')" class="dash_table_row">
                                            <td class="dash_table_column short_column">
                                                <span>{{ producto.id }}</span>
                                            </td>
                                            <td class="dash_table_column">
                                                <span>{{ producto.name }}</span>
                                            </td>
                                            <td class="dash_table_column short_column">
                                                <span>{{ producto.price }}</span>
                                            </td>
                                            <td class="dash_table_column short_column">
                                                <span>{{ producto.stock }}</span>
                                            </td>
                                            <td class="dash_table_column">
                                                <span>{{ producto.description }}</span>
                                            </td>
                                            <td class="dash_table_column short_column">
                                                <span>{{ producto.likes_count }}</span>
                                            </td>
                                            <td class="dash_table_column actions_column">
                                                <router-link :to="'/editproduct/' + producto.id" class="actions_btn action_btn_edit"><i class="remixicon-edit-2-fill"></i></router-link>
                                                <a @click="deleteProduct(index)" class="actions_btn action_btn_delete"><i class="remixicon-delete-bin-5-fill"></i></a>
                                            </td>
                                        </tr>
                                    </div>
                                </paginate>
                                <paginate-links class="pagination" for="productos"></paginate-links>
                                
                            </div>

                    </div>

                </div>


</template>

<script>
export default {
    mounted(){
        this.getAllProducts();
    },
    data(){
        return{
            productos: [],
            paginate: ['productos'],
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

        deleteProduct: function(index){
            let idrow = this.productos[index].id;
            axios.get('http://ecommerce.test/api/products/delete/' + idrow)
                .then( (respuesta) => {
                    this.productos.splice(index,1);
                    this.getAllProducts();
                }).catch (
                    (error) => console.log(error)
                );
        },
    }
}
</script>