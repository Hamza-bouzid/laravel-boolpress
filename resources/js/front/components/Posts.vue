<template>
    <div class="posts">
        <div class="post" v-for="(post, index) in posts" :key="index">
            <div class="post-img">
                <img v-if="post.image" :src="`/storage/${post.image}`" />
            </div>

            <div class="post-text">
                <div class="post-category">
                    <span v-if="post.category">{{ post.category.name }}</span>
                </div>
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
                        :to="{ name: 'post', params: { slug: post.slug } }"
                        >Read More</router-link
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Posts",

    data() {
        return {
            posts: [],
        };
    },

    methods: {
        getPosts: function () {
            axios
                .get("api/posts")
                .then((response) => {
                    this.posts = response.data;
                    //this.categories = response.data.categories;
                    console.log(this.posts);
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },

    created() {
        this.getPosts();
    },
};
</script>

<style lang="scss" scoped>
.posts {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    padding: 50px 0px;

    .post {
        width: 32%;
        height: 500px;
        margin-bottom: 50px;
        background-color: #fff;
        -webkit-box-shadow: 0px 0px 12px -1px rgba(0, 0, 0, 0.3);
        box-shadow: 0px 0px 12px -1px rgba(0, 0, 0, 0.3);

        &-text {
            height: 300px;
            padding: 20px 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            position: relative;
        }

        &-category {
            background-color: #ff5e14;
            color: #fff;
            text-align: center;
            font-size: 20px;
            text-transform: uppercase;
            position: absolute;
            top: -21px;
            left: 50%;
            transform: translateX(-50%);
            padding: 5px 50px;
        }

        &-title {
            height: 100px;
            text-align: center;
        }

        &-img {
            height: 200px;
        }

        &-read {
            a {
                color: #f27927;
                font-weight: bold;
                text-decoration: none;

                &:hover {
                    color: #00334b;
                }
            }
        }

        &-tags {
            span {
                background-color: #00334b;
                color: #fff;
                margin: 0 5px;
                padding: 1.5px 4px;
                border-radius: 2px;
            }
        }

        img {
            width: 100%;
            height: 100%;
        }
    }
}
</style>
