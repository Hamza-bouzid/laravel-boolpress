<template>
    <div>
        <Categories />
        <h1>Ultimi Post</h1>
        <Posts />
    </div>
</template>

<script>
import Posts from "../components/Posts.vue";
import Categories from "../components/Categories.vue";
export default {
    name: "Home",

    components: {
        Posts,
        Categories,
    },
};
</script>

<style lang="scss" scoped>
h1 {
    font-size: 60px;
    text-align: center;
    margin-top: 50px;
    text-transform: uppercase;
}
</style>
