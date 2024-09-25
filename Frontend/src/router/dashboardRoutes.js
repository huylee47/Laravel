import Dashboard from '../pages/Dashboard.vue';

const dashboardRoutes = [
    {
        path: '/dashboard',
        component: Dashboard,
        meta: { requiresAuth: true },
    },
];

export default dashboardRoutes;
