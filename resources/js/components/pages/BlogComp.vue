<template>
  <div class="container post-container">
    <h1>Elenco dei post</h1>
        <div v-if="posts.length == 0">
            <LoaderComp />
        </div>
        <div v-if="posts.length > 0">
            <PostItem
                v-for="post in posts"
                :key="post.id"
                :post= 'post'
            />
        </div>
        <button @click="getApi(pagination.current - 1)"
                :disabled="pagination.current == 1"><<</button>

        <button
                v-for="i in pagination.last"
                :key="i"
                @click="getApi(i)"
                :disabled="pagination.current == i">{{ i }}</button>

        <button @click="getApi(pagination.current + 1)"
                :disabled="pagination.current == pagination.last">>></button>
  </div>
</template>

<script>
import PostItem from '../partials/PostItem.vue'
import LoaderComp from '../partials/LoaderComp.vue'

export default {
    name: 'BlogComp',

    components: {
        PostItem,
        LoaderComp
    },

    data(){
        return{
            apiUrl: '/api/posts',
            posts: [],
            pagination:{
                current: null,
                last: null
            }
        }
    },

    mounted(){
        this.getApi(1);
    },

    methods:{
        getApi(page){
            axios.get(this.apiUrl + "?page" + page)
            .then(res=>{

                this.posts = res.data.data;
                this.pagination = {
                    current: res.data.current_page,
                    last: res.data.last_page
                }

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

    button{
        padding: 5px;

    }
}
</style>
