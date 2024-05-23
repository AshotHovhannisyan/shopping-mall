<template>
    <div>
        <h1>{{ product.title }}</h1>
        <p>{{ product.description }}</p>
        <p>SKU: {{ product.sku }}</p>
        <p>Price: {{ product.price }}</p>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                product: {}
            };
        },
        mounted() {
            const productId = this.$route.params.id;
            fetch(`/api/products/${productId}`)
                .then(response => response.json())
                .then(data => {
                    this.product = data;
                });
        }
    };
</script>
