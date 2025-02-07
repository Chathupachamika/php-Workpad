import { createRouter, createWebHistory } from 'vue-router';
import AddProduct from '../components/AddProduct.vue';
import Products from './Products.vue';
import Service from './Service.vue';

const routes = [
    {
        path: "/",
        redirect: "/home" 
    },
    {
        path: "/add",
        name: "add",
        component: AddProduct
    },
    {
        path: "/product",
        name: "product",
        component: Products
    },
    {
        path: "/service",
        name: "service",
        component:Service
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;