<template>
  <div class="item-container">
    <h3>{{post.title}}</h3>
    <p>{{post.content}}</p>
  </div>
</template>

<script>
export default {
    name: 'PostItem',

    props: {
        post: Object
    }

}
</script>

<style lang='scss' scoped>
.item-container{

    padding-bottom: 20px;
}
</style>
