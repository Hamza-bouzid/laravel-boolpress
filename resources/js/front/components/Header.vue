<template>
    <header>
        <h2 class="logo">
            <router-link :to="{ name: 'home' }">BlogPost</router-link>
        </h2>
        <nav>
            <li><router-link :to="{ name: 'home' }">Home</router-link></li>
            <li>
                <router-link :to="{ name: 'about-us' }">About Us</router-link>
            </li>
        </nav>
    </header>
</template>

<script>
export default {
    name: "Header",
};
</script>

<style lang="scss" scoped>
header {
    display: flex;
    justify-content: space-around;
    align-items: center;
    background-color: #2d2a2e;
    color: #fff;
    padding: 10px 0px;

    .logo {
        a {
            font-size: 40px;
            text-transform: uppercase;
        }
    }

    a {
        text-decoration: none;
        color: #fff;
        font-size: 18px;
    }

    nav {
        li {
            list-style: none;
            display: inline-block;
            padding: 10px 20px;
        }

        a {
            &:hover {
                color: #f27927;
            }
        }
    }
}
</style>
