import { createRouter, createWebHistory } from 'vue-router';
import { isAuthenticated } from '../utils/auth';
import authRoutes from './authRoutes';
import userRoutes from './userRoutes';
import roleRoutes from './roleRoutes';
import newsRoutes from './newsRoutes';
import productRoutes from './productRoutes';
import dashboardRoutes from './dashboardRoutes';

const routes = [
    { path: '/', redirect: '/dashboard'},
    ...authRoutes,
    ...dashboardRoutes,
    ...userRoutes,
    ...roleRoutes,
    ...newsRoutes,
    ...productRoutes,
];


const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !isAuthenticated()) {
        next('/login');
    } else {
        next();
    }
});

export default router;