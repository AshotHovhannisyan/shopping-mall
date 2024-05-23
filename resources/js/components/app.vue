<template>
    <header>
        <nav>
            <ul>
                <li>
                    <router-link class="nav-link" to="/">Home</router-link>
                </li>
                <li>
                    <router-link class="nav-link" to="/addProduct">Create Product</router-link>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <allCategories></allCategories>
        <router-view></router-view>
    </div>

</template>

<script>
    import allCategories from '../components/categories.vue';

    export default {
        components: {
            allCategories
        },
        name: "app.vue"
    }
</script>

<style scoped>
    .container {
        width: 64%;
        max-width: 1920px;
        margin: 10px auto;
        display: flex;

    }

    .container > div {
        margin: 25px;
        padding: 25px;
        width: 80%;
    }

    nav {
        background-color: #333;

    }

    nav ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
        display: flex; /* Change to flexbox to create a horizontal menu */
        justify-content: center;
    }

    nav li {
        display: inline;
    }

    nav li a {
        display: block;
        padding: 15px;
        text-decoration: none;
        color: #fff;
        background-color: #333;
    }

    nav li a:hover,
    nav li a.active{
        background-color: #555;
    }
</style>
