import Users from '../pages/Users.vue';
import UserDataTable from '../components/UserDataTable.vue';
import AddUser from '../components/AddUser.vue';
import EditUser from '../components/EditUser.vue';

const userRoutes = [
    {
        path: '/users',
        component: Users,
        meta: { requiresAuth: true },
        children: [
            {
                path: '',
                name: 'UsersDataTable',
                component: UserDataTable,
            },
            {
                path: 'add',
                name: 'AddAccount',
                component: AddUser,
            },
            {
                path: 'edit/:id',
                name: 'EditUser',
                component: EditUser,
            },
        ],
    },
];

export default userRoutes;
