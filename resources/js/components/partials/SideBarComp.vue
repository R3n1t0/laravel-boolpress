<template>
  <div>
    <div class="list">
        <h3>Categorie</h3>
        <ul>
            <li></li>
        </ul>
    </div>
    <div class="list">
        <h3>Tag</h3>
        <ul>
            <li></li>
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
}
</style>
