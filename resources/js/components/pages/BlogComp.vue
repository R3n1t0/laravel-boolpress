<template>
  <div class="container post-container">
    <!-- Elenco posts -->
    <div>

        <div v-if="!posts">
            <LoaderComp />
        </div>
        <div v-else>
            <div>
                <h1>Elenco dei post</h1>
                <PostItem
                    v-for="post in posts"
                    :key="post.id"
                    :post= 'post'
                />

                <button @click="getApi(pagination.current - 1)"
                    :disabled="pagination.current === 1"><<</button>

                <button
                    v-for="i in pagination.last"
                    :key="`btn${i}`"
                    @click="getApi(i)"
                    :disabled="pagination.current === i">{{ i }}</button>

                <button @click="getApi(pagination.current + 1)"
                    :disabled="pagination.current === pagination.last">>></button>

            </div>

        </div>

    </div>

    <!--Sidebar con Categorie e tags -->
    <SideBarComp
        :categories="categories"
        :tags="tags"
        @searchPostByCategory = 'searchPostByCategory'
        @searchPostByTag = 'searchPostByTag'
    />

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


        },

        searchPostByCategory(slug_category){


            axios.get(this.apiUrl + '/post-category/' + slug_category)
            .then(res => {
                /* this.posts = res.data.posts */
                console.log(res.data);
            })

        },

        searchPostByTag(slug_tag){


            axios.get(this.apiUrl + '/post-tag/' + slug_tag)
            .then(res => {

                console.log(res.data);
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
