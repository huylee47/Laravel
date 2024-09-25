import { createRouter, createWebHistory } from 'vue-router';
import { isAuthenticated } from '../utils/auth'; // Import hàm kiểm tra xác thực
import Login from '../pages/Login.vue';
import Dashboard from '../pages/Dashboard.vue';
import Users from '../pages/Users.vue';
import Roles from '../pages/Roles.vue';
import News from '../pages/News.vue';
import Products from '../pages/Products.vue';

const routes = [
    { path: '/', redirect: '/dashboard' },
    { path: '/login', component: Login },
    {
        path: '/dashboard',
        component: Dashboard,
        meta: { requiresAuth: true },
    },
    {
        path: '/users',
        component: Users,
        meta: { requiresAuth: true },
    },
    {
        path: '/roles',
        component: Roles,
        meta: { requiresAuth: true },
    },
    {
        path: '/news',
        component: News,
        meta: { requiresAuth: true },
    },
    {
        path: '/products',
        component: Products,
        meta: { requiresAuth: true },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

// Bảo vệ các route yêu cầu xác thực
router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !isAuthenticated()) {
        // Nếu route yêu cầu xác thực và người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập
        next('/login');
    } else {
        next(); // Cho phép truy cập nếu đã xác thực hoặc route không yêu cầu auth
    }
});

export default router;
