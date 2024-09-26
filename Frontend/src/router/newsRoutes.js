import News from '../pages/News.vue';
import newsDataTable from '../components/NewsDataTable.vue';

const newsRoutes = [
    {
        path: '/news',
        component: News,
        meta: { requiresAuth: true },
        children: [
            {
                path: '',
                name: 'newsDataTable',
                component: newsDataTable,
            }
        ],
    },
];

export default newsRoutes;
