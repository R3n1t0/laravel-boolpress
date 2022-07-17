<template>

    <div class="container">
        <h3>{{post.title}}</h3>
        <p>{{post.content}}</p>
    </div>

</template>

<script>
import {apiUrl} from '../../data/config'

export default {

    name: 'PostDetail',

    data(){
        return{

            post: {
                title: '',
                content: ''
            },
            apiUrl
        }
    },

    mounted(){
        this.getApi()
    },

    methods:{
        getApi(){

            axios.get(this.apiUrl + '/' + this.$route.params.slug)
            .then(res=>{

                this.post = res.data;
            })
        }
    }


}
</script>

<style lang="scss" scoped>

</style>
