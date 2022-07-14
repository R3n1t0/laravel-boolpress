<template>
    <header>

        <ul>
            <li>
                <a href="#">Home</a>
                <a href="#">Blog</a>
                <a href="#">Chi Siamo</a>
                <a href="#">Contatti</a>
            </li>
        </ul>

    </header>
</template>

<script>
export default {
    name: 'HeaderComp'
}
</script>

<style lang='scss' scoped>
header{
    width: 100%;
    height: 80px;
    padding: 30px;
    background-color: rgb(110, 116, 116);

    ul{
        list-style: none;
        text-align: center;

        li{
            display: inline-block;
            a{
                color: black;
                text-decoration: none;
                margin: 0 10px;
                &:hover{
                    text-decoration: underline;
                }
            }

        }
    }
}

</style>
