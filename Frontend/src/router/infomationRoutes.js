import Infomations from '../pages/Infomations.vue';
import InfomationListData from '../components/InfomationListData.vue';

const infomationRoutes = [
    {
        path: '/infomations',
        component: Infomations,
        meta: { requiresAuth: true },
        children: [
            {
                path: '',
                name: 'InfomationListData',
                component: InfomationListData,
            }
        ],
    },
];

export default infomationRoutes;
