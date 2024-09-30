import Settings from '../pages/Settings.vue';
import SettingListData from '../components/SettingListData.vue';

const settingsRoutes = [
    {
        path: '/settings',
        component: Settings,
        meta: { requiresAuth: true },
        children: [
            {
                path: '',
                name: 'SettingListData',
                component: SettingListData,
            }
        ],
    },
];

export default settingsRoutes;
