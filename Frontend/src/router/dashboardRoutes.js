import Dashboard from '../pages/Dashboard.vue';
import DashboardListData from '../components/DashboardListData.vue';
import News from '../pages/News.vue';
import NewListData from '../components/NewListData.vue';

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
                    default: DashboardListData,
                    news: NewListData,
                }
            }
        ],
    },
];

export default dashboardRoutes;
