<template>
        <div class="dash_options_left_out">
                <div class="dash_options_left_inner">
                    <!--Menu para movil-->
                    <button class="btn_menu_movil" id="btn_menu_movil"><i class="remixicon-menu-2-line"></i></button>
                    <!--####-->
                    <a href="/home" class="link_to_shop"><i class="remixicon-arrow-left-line"></i> Go to admin</a>
                    <p class="welcome_message">Welcome!</p>
                    <p class="name_dash">Diego Villalobos</p>
                    <div class="options_left_container">
                        <ul>
                            <router-link :to="{name: 'content-component'}"  class="option_left active"><i class="remixicon-home-smile-fill"></i> Home</router-link>
                            <router-link :to="{name: 'dash-list'}"  class="option_left"><i class="remixicon-barcode-box-fill"></i> Products</router-link>
                            
                        </ul>
                    </div>
                    <button v-on:click="logout()" class="sign_out_dash"><i class="remixicon-logout-circle-line"></i>Sign out</button>
                    <form name="logout-form" id="logout-form" action="/api/logout" method="POST" style="display: none;">
                    </form>
                </div>
        </div>
</template>
<script>
export default {
    methods:{

        logout(){
            document.querySelector('#logout-form').submit();
        },
    }
}
</script>