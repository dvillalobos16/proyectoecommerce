<template>
<div class="dash_info_container-inner">
                    <h1 class="dash_title">Add Product</h1>
                    <div class="dash_grid"> 
                        <div class="dash_card dash_table_container">
                                <div class="dash_card_actions_table">
                                    <p class="dash_card_title">Create new product</p>    
                                </div>
                                <div class="dash_form_container">
                                    <form class="form_add_product" @submit.prevent="">
                                        <div class="form_add_row">
                                            <span class="name_of_row">Name of product</span>
                                            <input type="text" name="" id="" class="form_add_input form_add_input_text"  v-model="name">
                                        </div>
                                        <div class="form_add_row">
                                            <div class="form_add_row_inner">
                                                <span class="name_of_row">Quantity</span>
                                                <input type="number" name="" id="" class="form_add_input form_add_input_number" value="0" min="0"  v-model="stock">
                                            </div>
                                            <div class="form_add_row_inner">
                                                <span class="name_of_row">Price</span>
                                                <input step=".01" type="number" name="" id="" class="form_add_input form_add_input_num form_add_input_price" value="0.0" min="0"  v-model="price">
                                            </div>
                                        </div>
                                        <div class="form_add_row">
                                            <span class="name_of_row">Description</span>
                                            <textarea  v-model="description" name="" id="" class="form_add_input form_add_input_longText"></textarea>
                                        </div>
                                        <div class="form_add_row">
                                            <router-link :to="{name: 'dash-list'}" class="btn primary-btn form_btn form_cancel_btn">Cancel</router-link>
                                            <button @click="setProduct()" class="btn primary-btn form_btn">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                    </div>

                </div>
</template>

<script>
export default {
    data(){
        return{
            name: '',
            price: 0.00,
            stock: 0,
            description: '',
            user_id: 1,
        }
    },
    methods: {
        setProduct: function(){
            axios.post('http://ecommerce.test/api/products', {name: this.name, price: this.price, stock: this.stock, description: this.description, user_id: this.user_id})
            .then( response => this.$router.push('/home'));
        }
    }
}
</script>