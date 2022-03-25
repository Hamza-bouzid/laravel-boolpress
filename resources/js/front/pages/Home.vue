<template>
    <div>
        <h1>Latest Posts</h1>
        <Posts />
    </div>
</template>

<script>
import Posts from "../components/Posts.vue";
export default {
    name: "Home",

    components: {
        Posts,
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
