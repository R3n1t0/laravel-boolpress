<template>
  <div class="item-container">
    <h3>{{post.title}}</h3>
    <i>{{formDate}}</i>
    <p>{{shortContent}}</p>
  </div>
</template>

<script>
export default {
    name: 'PostItem',

    props: {
        post: Object
    },

    computed:{
        shortContent(){

            return this.post.content.substr(0, 200) + "..." ;
        },

        formDate(){

            const d = new Date(this.post.updated_at);
            let day = d.getDate();
            let month = d.getMonth() + 1;
            let year = d.getFullYear();

            if(day < 10) day = '0' + day;
            if(month < 10) month = '0' + month;

            return `${day}/${month}/${year}`
        }
    }

}
</script>

<style lang='scss' scoped>
.item-container{

    padding-bottom: 20px;
}
</style>
