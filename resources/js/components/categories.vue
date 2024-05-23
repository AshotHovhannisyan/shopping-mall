<template>
    <div>
        <h1>Categories</h1>
        <ul v-if="categories.length > 0">
            <li >
                <router-link :to="`/`">All Categories</router-link>
            </li>
            <li v-for="category in categories" :key="category.id">
                <router-link :to="`/category/${category.id}`">{{ category.title }}</router-link>
            </li>
        </ul>
        <p v-else>No products available.</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                categories: []
            };
        },
        mounted() {
            fetch('/api/categories')
                .then(response => response.json())
                .then(data => {
                    this.categories = data;
                });
        }
    };
</script>

<style scoped>
    .container > div:first-child {
        border: 1px solid #cccccc;
        border-radius: 5px;
        width: 16%;
    }

    .container > div:first-child ul {
        list-style-type: none;
        padding-inline-start: 8px;
    }

    .container > div:first-child ul li {
        margin: 8px 0;
    }

    .container > div:first-child ul li a {
        padding: 8px;
        text-decoration: none;
    }

    .container > div:first-child ul li a:hover,
    .container > div:first-child ul li a.active {
        color: #718096;
        text-decoration: underline;
    }

</style>
