import { createRouter, createWebHistory } from 'vue-router';
import { isAuthenticated } from '../services/authService';
import authRoutes from './authRoutes';
import userRoutes from './userRoutes';
import blogRoutes from './blogRoutes';
import productRoutes from './productRoutes';
import dashboardRoutes from './dashboardRoutes';
import infomationRoutes from './infomationRoutes';
import settingRoutes from './settingRoutes';

const routes = [
    { path: '/', redirect: '/login' },
    ...authRoutes,
    ...dashboardRoutes,
    ...userRoutes,
    ...blogRoutes,
    ...productRoutes,
    ...infomationRoutes,
    ...settingRoutes,
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