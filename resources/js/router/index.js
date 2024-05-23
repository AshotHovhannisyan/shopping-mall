import { createRouter, createWebHistory } from 'vue-router';

import AllCategories from '../components/allProduct.vue';
import CategoryPage from '../components/productList.vue';
import ProductPage from '../components/product.vue';
import AddProduct from '../components/addProduct.vue';

const routes = [
    { path: '/', component: AllCategories },
    { path: '/category/:id', component: CategoryPage },
    { path: '/product/:id', component: ProductPage },
    { path: '/addProduct', component: AddProduct }
];

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: 'active',
    routes,
});

export default router;
