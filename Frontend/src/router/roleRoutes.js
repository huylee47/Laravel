import Roles from '../pages/Roles.vue';

const roleRoutes = [
    {
        path: '/roles',
        component: Roles,
        meta: { requiresAuth: true },
    },
];

export default roleRoutes;
