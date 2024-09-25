import News from '../pages/News.vue';

const newsRoutes = [
    {
        path: '/news',
        component: News,
        meta: { requiresAuth: true },
    },
];

export default newsRoutes;
