<template>
  <div class="container post-container">
    <h1>Elenco dei post</h1>
        <div>
            <PostItem
                v-for="post in posts"
                :key="post.id"
                :post= 'post'
            />
        </div>
  </div>
</template>

<script>
import PostItem from '../partials/PostItem.vue'

export default {
    name: 'BlogComp',

    components: {
        PostItem
    },

    data(){
        return{
            apiUrl: '/api/posts',
            posts: null
        }
    },

    mounted(){
        this.getApi();
    },

    methods:{
        getApi(){
            axios.get(this.apiUrl)
            .then(res=>{

                this.posts = res.data;

            })
        }
    }
}
</script>

<style lang='scss' scoped>
.post-container{
    h1{
        padding-bottom: 20px;
    }
}
</style>
