<template>
    <div class="posts">
        <div class="post" v-for="(post, index) in posts" :key="index">
            <div class="post-date_shadow">
                <div class="post-date">
                    <span>{{ getDate(post.created_at) }}</span>
                </div>
            </div>

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
                        >Leggi Post</router-link
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

        getDate: function (date) {
            return new Date(date).toLocaleDateString("it", {
                year: "numeric",
                month: "long",
                day: "numeric",
            });
        },
    },

    created() {
        this.getPosts();
    },
};
</script>

<style lang="scss">
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
        position: relative;

        &-text {
            height: 300px;
            padding: 20px 10px;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            position: relative;
        }

        &-date {
            background-color: #f27927;
            color: #fff;
            text-transform: uppercase;
            text-align: center;
            position: absolute;
            width: 100px;
            height: 60px;
            left: 20px;
            top: -8px;
            clip-path: polygon(100% 0, 100% 100%, 50% 72%, 0 100%, 0 0);
        }

        &-category {
            background-color: #00334b;
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

.post-date_shadow {
    filter: drop-shadow(-1px 6px 3px rgba(0, 0, 0, 0.4));
}
</style>
