<template>
  <div>
    <div class="list">
        <h3>Categorie</h3>
        <ul>
            <li
                v-for="category in categories"
                :key='`cat${category.id}`'
                @click="$emit('searchPostByCategory', category.slug)"
            >{{category.name}}</li>
        </ul>
    </div>
    <div class="list">
        <h3>Tag</h3>
        <ul>
            <li
                v-for="tag in tags"
                :key='`cat${tag.id}`'
                @click="$emit('searchPostByTag', tag.slug)"
            >{{tag.name}}</li>
        </ul>
    </div>

  </div>
</template>

<script>
export default {
    name: 'SideBarComp',
    props: {
        categories: Array,
        tags: Array,
    }
}
</script>

<style lang="scss" scoped>
.list{
    margin-bottom: 20px;
    ul{
        list-style: none;
        li{
            cursor: pointer;
        }

    }
}
</style>
