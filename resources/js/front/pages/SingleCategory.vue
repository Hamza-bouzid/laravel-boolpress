<template>
    <div>
        <h1>{{ category.name }} : {{ category.posts.length }}</h1>
        <div class="posts">
            <div class="post" v-for="post in category.posts" :key="post.slug">
                <!--
                <div class="post-date_shadow">
                    <div class="post-date">
                        <span>{{ getDate(post.created_at) }}</span>
                    </div>
                </div>
                -->

                <div class="post-img">
                    <img v-if="post.image" :src="`/storage/${post.image}`" />
                </div>
                <div class="post-text">
                    <div class="post-title">
                        <h3>{{ post.title }}</h3>
                    </div>
                    <div class="post-tags">
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        <span v-for="tag in post.tags" :key="tag.slug">
                            {{ tag.name }}
                        </span>
                    </div>
                    <div class="post-read">
                        <router-link
                            :to="{
                                name: 'post',
                                params: { slug: post.slug },
                            }"
                            >Leggi Post</router-link
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "SingleCategory",

    data() {
        return {
            category: {},
        };
    },

    created() {
        axios
            .get(`/api/categories/${this.$route.params.slug}`)
            .then((response) => {
                this.category = response.data;
                console.log(this.category);
            })
            .catch((error) => {
                this.$router.push({ name: "page-404" });
            });
    },
};
</script>

<style></style>
