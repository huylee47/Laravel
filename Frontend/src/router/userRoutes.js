import Users from '../pages/Users.vue';
import UserListData from '../components/UserListData.vue';
import UserCreate from '../components/UserCreate.vue';
import UUserUpdate from '../components/UserUpdate.vue';

const userRoutes = [
    {
        path: '/users',
        component: Users,
        meta: { requiresAuth: true },
        children: [
            {
                path: '',
                name: 'UserListData',
                component: UserListData,
            },
            {
                path: 'add',
                name: 'UserCreate',
                component: UserCreate,
            },
            {
                path: 'edit/:id',
                name: 'UserUpdate',
                component: UUserUpdate,
            },
        ],
    },
];

export default userRoutes;
