<template>
    <div>

        <HeaderComp />

        <div class="container">

            <ul>
                <li
                    v-for="post in posts"
                    :key="post.id">
                    <h3>{{post.title}}</h3>
                    <p>{{post.content}}</p>
                </li>
            </ul>

        </div>

        <FooterComp />

    </div>

</template>

<script>

import HeaderComp from './components/partials/HeaderComp.vue'
import FooterComp from './components/partials/FooterComp.vue'

export default {

    name: 'App',

    components:{
        HeaderComp,
        FooterComp
    },

    data(){

        return{

            apiUrl: 'http://127.0.0.1:8000/api/posts',
            posts: null
        }
    },

    methods:{

        getApi(){

            axios.get(this.apiUrl)
            .then(res => {
                this.posts = res.data.posts;
            })
        }

    },

    mounted(){

        this.getApi();
    }

}
</script>

<style>

</style>
