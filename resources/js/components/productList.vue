<template>
    <div>
        <h1>Products in Category</h1>
        <div class="all-product" v-if="products.length > 0">
            <div v-for="product in products" :key="product.id">
                <p><span style="font-weight: bold;">SKU:</span> {{ product.sku }}</p>
                <span style="font-weight: bold;">Title:</span>
                <router-link :to="`/product/${product.id}`">{{ product.title }}</router-link>
                <p><span style="font-weight: bold;">Desc:</span> {{ product.description }}</p>
                <p><span style="font-weight: bold;">Price:</span> {{ product.price }}</p>
            </div>
        </div>
        <p v-else>No products available.</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: []
            };
        },
        mounted() {
            this.categoryId = this.$route.params.id;
            this.fetchProductsByCategory();
        },
        watch: {
            '$route.params.id'(newId) {
                this.categoryId = newId;
                this.fetchProductsByCategory();
            }
        },
        methods: {
            fetchProductsByCategory() {
                fetch(`/api/categories/${this.categoryId}/products`)
                    .then(response => response.json())
                    .then(data => {
                        this.products = data;
                    }).catch(error => console.error('Error fetching products:', error));
            }

        }
    };
</script>
<style scoped>
    .all-product {
        display: flex;
    }

    .all-product > div {
        min-width: 128px;
        border-radius: 5px;
        border: 1px solid #cccccc;
        margin: 5px;
        padding: 5px;
    }
</style>
