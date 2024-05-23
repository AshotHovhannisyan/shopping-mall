<template>
    <div>
        <h2>Add New Product</h2>
        <form @submit.prevent="addProduct">
            <div>
                <label for="title">Title:</label>
                <input id="title" type="text" v-model="newProduct.title" required>
            </div>
            <div>
                <label for="description">Description:</label>
                <input id="description" type="text" v-model="newProduct.description">
            </div>
            <div>
                <label for="sku">SKU:</label>
                <input id="sku" type="text" v-model="newProduct.sku" minlength="8" maxlength="8" required>
            </div>
            <div>
                <label for="price">Price:</label>
                <input id="price" type="number" v-model="newProduct.price" min="1" required>
            </div>
            <div>
                <label id="category" for="category">Category:</label>
                <select v-model="newProduct.category_id" required>
                    <option v-for="category in categories" :key="category.id" :value="category.id">
                        {{ category.title }}
                    </option>
                </select>
            </div>
            <button type="submit">Add Product</button>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                newProduct: {
                    title: '',
                    description: '',
                    sku: '',
                    price: 0,
                    category_id: null
                },
                categories: []
            };
        },
        mounted() {
            this.fetchCategories();
        },
        methods: {
            fetchCategories() {
                fetch('/api/categories')
                    .then(response => response.json())
                    .then(data => {
                        this.categories = data;
                    });
            },
            addProduct() {
                fetch('/api/products', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': this.csrfToken
                    },
                    body: JSON.stringify(this.newProduct)
                })
                    .then(response => response.json())
                    .then(data => {
                        this.$emit('product-added');
                        this.newProduct = { title: '', description: '', sku: '', price: 0, category_id: null };
                    });
            }
        }
    };
</script>
<style scoped>

    form{
        width: 50%;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input, select {
        width: calc(100% - 20px);
        padding: 8px;
        margin-bottom: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    select{
        width: 100%;
    }

    button {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #218838;
    }
</style>
