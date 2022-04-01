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

<style lang="scss" scoped></style>
