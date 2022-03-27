<template>
    <div class="Page-not-found">
        <div class="Page-not-found_content">
            <h1>Oopss!</h1>
            <h3>We can't seem to find the page you're looking for</h3>
            <span>Error code: 404</span>

            <router-link :to="{ name: 'home' }">Back to Home Page</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "PageNotFound",
};
</script>

<style lang="scss" scoped>
.Page-not-found {
    height: 100vh;
    position: relative;

    &_content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;

        h1 {
            font-size: 200px;
            font-weight: bold;
            color: #f27927;
            text-transform: uppercase;
        }

        h3 {
            font-size: 40px;
        }

        span {
            font-size: 25px;
            display: block;
        }

        h3,
        span {
            font-weight: bold;
            color: #00334b;
            margin-bottom: 20px;
        }
        a {
            background-color: #f27927;
            color: #fff;
            text-decoration: none;
            padding: 10px 25px;
        }
    }
}
</style>
