<template>
    <div class="register-login-container out">
                <div class="register-login-container inner">
                        <form class="register-login-form" @submit.prevent="login">
                            <h1 class="register-login-title">Sign in</h1>
                            <div class="row">
                                <p class="input-name">Email</p>
                                <div class="inner-row">
                                    <input type="email" class="text-input" placeholder="example@email.com" v-model="email">
                                    <i class="remixicon-checkbox-circle-fill"></i>
                                    <i class="remixicon-close-circle-fill"></i>
                                </div>
                            </div>
                            <div class="row">
                                <p class="input-name">Password</p>
                                <div class="inner-row">
                                    <input type="password" class="text-input" v-model="password">
                                    <i class="remixicon-checkbox-circle-fill"></i>
                                    <i class="remixicon-close-circle-fill"></i>
                                </div>
                            </div>
                            <div class="row">
                                <button class="btn_registro" @click="login()">Sign in</button>
                                <a href="#" class="link-form">Forgot password?</a>
                            </div>
                        </form>
                    </div>
        </div>
</template>

<script>
export default {
    data(){
        return{
            email: '',
            password: '',
            urlLogin: 'http://ecommerce.test/api/login',
        }
    },
    methods:{
        login: function(){
            axios.post('http://ecommerce.test/api/login', 
            {email: this.email, password: this.password},
            {headers: {'X-Request-With': 'XMLHttpRequest'}})
            .then( respuesta => {
                const token = respuesta.data.token;
                const base64Url = token.split('.')[1];
                const base64 = base64Url.replace('-', '+').replace('_', '/');
                console.log(JSON.parse(window.atob(base64)));
                localStorage.setItem('token', token);
                axios.post('http://ecommerce.test/login', {email: this.email, password: this.password})
                .then(
                    response =>{
                        this.$router.push('/home');
                    });
                
            }).catch (
                (error) => console.log(error)
            );
        }
    }
}
</script>