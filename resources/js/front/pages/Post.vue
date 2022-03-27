<template>
    <div class="post">
        <div class="post-category">
            <span v-if="post.category">{{ post.category.name }}</span>
        </div>
        <div class="post-image">
            <img v-if="post.image" :src="`/storage/${post.image}`" />
        </div>
        <h1>{{ post.title }}</h1>
        <div class="post.content" v-html="post.content">{{ post.content }}</div>
        <div class="post-date-tags">
            <div class="post-date">
                <span>{{ getDate(post.created_at) }}</span>
            </div>
            <div class="post-tags">
                <i class="fa fa-tags" aria-hidden="true"></i>
                <span v-for="tag in post.tags" :key="tag.slug">
                    {{ tag.name }}
                </span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Post",

    data() {
        return {
            post: {},
        };
    },
    methods: {
        getDate: function (date) {
            return new Date(date).toLocaleDateString("it", {
                year: "numeric",
                month: "long",
                day: "numeric",
            });
        },
    },

    created() {
        axios
            .get(`/api/posts/${this.$route.params.slug}`)
            .then((response) => {
                this.post = response.data;
                console.log(this.post);
            })
            .catch((error) => {
                this.$router.push({ name: "page-404" });
            });
    },
};
</script>

<style lang="scss" scoped>
.post {
    padding: 50px 0px;
    display: flex;
    flex-direction: column;

    &-image {
        align-self: center;
    }

    &-category {
        align-self: center;
        position: relative;
        top: 15px;
        span {
            background-color: #2d2a2e9d;
            color: #fff;
            text-align: center;
            font-size: 20px;
            text-transform: uppercase;
            padding: 5px 50px;
        }
    }

    &-date-tags {
        display: flex;
    }

    &-date {
        color: rgb(133, 133, 133);
        padding: 0px 10px 0px 0px;
        border-right: 1px solid rgba(0, 0, 0, 0.5);
    }

    &-tags {
        padding-left: 5px;
        span {
            background-color: #00334b;
            color: #fff;
            margin: 0 5px;
            padding: 1.5px 4px;
            border-radius: 2px;
        }
    }

    h1 {
        text-align: center;
        margin: 40px 0px;
        font-size: 60px;
    }
}
</style>
