import Dashboard from '../pages/Dashboard.vue';
import DashboardComponent from '../components/DashboardComponent.vue';

const dashboardRoutes = [
    {
        path: '/dashboard',
        meta: { requiresAuth: true },
        components: {
            default: Dashboard,
        },
        children: [
            {
                path: '',
                components: {
                    default: DashboardComponent,
                }
            }
        ],
    },
];

export default dashboardRoutes;
