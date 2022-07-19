<template>

    <div class="container">
        <h3>Titolo: {{post.title}}</h3>

        <h4>Categorie: {{post.category.name}} </h4>

        <div class="tags">
            <span
            v-for="tag in post.tags"
            :key="tag.id">
            Tags: {{tag.name}}
            </span>
        </div>

        <p>Contenuto: {{post.content}}</p>
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
                content: '',
                category: '',
                tags:[]
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
h4{
    margin: 30px 0px;
}

.tags{
    margin-bottom: 20px;
}

</style>
