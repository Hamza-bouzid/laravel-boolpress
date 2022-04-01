<template>
    <div class="categories">
        <div
            class="category"
            v-for="category in categories"
            :key="category.slug"
        >
            <router-link
                :to="{
                    name: 'single-category',
                    params: { slug: category.slug },
                }"
                ><h4>{{ category.name }}</h4></router-link
            >
        </div>
    </div>
</template>

<script>
export default {
    name: "Categories",

    data() {
        return {
            categories: [],
        };
    },

    created() {
        axios.get("/api/categories").then((response) => {
            this.categories = response.data;
            console.log(this.categories);
        });
    },
};
</script>

<style lang="scss" scoped>
.categories {
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 10px 0px;
}

.category {
    background-color: rgba(0, 0, 0);
    padding: 5px 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    h4 {
        text-transform: uppercase;
        padding: 0;
        margin: 0;
    }

    a {
        color: #fff;
        text-decoration: none;
    }
}
</style>
