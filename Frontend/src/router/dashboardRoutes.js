import Dashboard from '../pages/Dashboard.vue';
import DashboardDataTable from '../components/DashboardDataTable.vue';
import News from '../pages/News.vue';
import NewsDataTable from '../components/NewsDataTable.vue';

const dashboardRoutes = [
    {
        path: '/dashboard',
        meta: { requiresAuth: true },
        components: {
            default: Dashboard,
            news: News,
        },
        children: [
            {
                path: '',
                components: {
                    default: DashboardDataTable,
                    news: NewsDataTable,
                }
            }
        ],
    },
];

export default dashboardRoutes;
