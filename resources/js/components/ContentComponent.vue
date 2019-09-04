<template>
    
<div class="dash_info_container-inner">
                    <h1 class="dash_title">Dashboard</h1>
                    
                    <div class="dash_grid">
                        
                        <div class="dash_card dash_Welcome">
                            <i class="remixicon-home-smile-line dash_card_icon"></i>
                            <p class="dash_card_title">Welcome Diego Villalobos!</p>
                            <p class="dash_text_content_card">This is your dashboard, here you can see relevance data of your ecommerce.</p>
                        </div>       
                        
                        
                        <div class="dash_card dash_table_container">
                            <p class="dash_card_title">Recent Users</p>
                            <div class="dash_table">
                                <div class="dash_table_row dash_table_row_header">
                                    <div class="dash_table_column">
                                        <span>Name</span>
                                    </div>
                                    <div class="dash_table_column">
                                        <span>Email</span>
                                    </div>
                                </div>
                                <div class="dash_table_row">
                                    <div class="dash_table_column">
                                        <span>Jhon Doe</span>
                                    </div>
                                    <div class="dash_table_column">
                                        <span>jdoe@gmail.com</span>
                                    </div>        
                                </div>
                                <div class="dash_table_row">
                                    <div class="dash_table_column">
                                        <span>Jhon Doe</span>
                                    </div>
                                    <div class="dash_table_column">
                                        <span>d_villalobos@outlook.com</span>
                                    </div> 
                                </div>
                            </div>
                            
                        </div>


                        <div class="dash_card dash_table_container">
                                <p class="dash_card_title">Recent products</p>
                                <div class="dash_table">
                                    <div class="dash_table_row dash_table_row_header">
                                        <div class="dash_table_column">
                                            <span>Product</span>
                                        </div>
                                        <div class="dash_table_column short_column">
                                            <span>Price</span>
                                        </div>
                                        <div class="dash_table_column short_column">
                                            <span>Quantity</span>
                                        </div>
                                        <div class="dash_table_column short_column">
                                            <span>Likes</span>
                                        </div>
                                    </div>
                                    <div class="dash_table_row" v-for="product in productos.slice(0,3)">
                                        <div class="dash_table_column">
                                            <span><a class="dash_link_to_product_detail" href="#">{{product.name}}</a></span>
                                        </div>
                                        <div class="dash_table_column short_column">
                                            <span>{{product.price}}</span>
                                        </div>
                                        <div class="dash_table_column short_column">
                                            <span>{{product.stock}}</span>
                                        </div>
                                        <div class="dash_table_column short_column">
                                            <span>{{product.likes_count}}</span>
                                        </div>
                                    </div>
                                </div>
                                <router-link :to="{name: 'dash-list'}" id="btn_more_detail_products" class="btn primary-btn dash_btn">More details</router-link>
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
        }
    },
    methods:{
        getAllProducts: function(){
            axios.get('http://ecommerce.test/api/products')
            .then( respuesta => {
                this.productos = respuesta.data;
                console.log(respuesta);
            }).catch (
                (error) => console.log(error)
            );
        },
    } 
}
</script>