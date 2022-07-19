<template>
  <div class="container post-container">
    <!-- Elenco posts -->
    <div>
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
                :disabled="pagination.current === 1"><<</button>

        <button
                v-for="i in pagination.last"
                :key="i"
                @click="getApi(i)"
                :disabled="pagination.current === i">{{ i }}</button>

        <button @click="getApi(pagination.current + 1)"
                :disabled="pagination.current === pagination.last">>></button>
    </div>

    <!--Sidebar con Categorie e tags -->
    <SideBarComp />

  </div>
</template>

<script>
import PostItem from '../partials/PostItem.vue'
import LoaderComp from '../partials/LoaderComp.vue'
import SideBarComp from '../partials/SideBarComp.vue'
import {apiUrl} from '../../data/config'

export default {
    name: 'BlogComp',

    components: {
        PostItem,
        LoaderComp,
        SideBarComp
    },

    data(){
        return{
            apiUrl,
            posts: [],
            pagination:{
                current: null,
                last: null
            },
            categories: [],
            tags: []
        }
    },

    mounted(){
        this.getApi(1);
    },

    methods:{
        getApi(page){
            axios.get(this.apiUrl + "?page=" + page)
            .then(res=>{

                this.posts = res.data.posts.data;
                this.pagination = {
                    current: res.data.posts.current_page,
                    last: res.data.posts.last_page,
                }
                this.categories = res.data.categories;
                this.tags = res.data.tags;
            })


        }
    }
}
</script>

<style lang='scss' scoped>
.post-container{
    display: flex;
    h1{

        padding-bottom: 20px;

    }

    button{
        padding: 5px;

    }
}
</style>
