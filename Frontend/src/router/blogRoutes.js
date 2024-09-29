import Blogs from '../pages/Blogs.vue';
import BlogListData from '../components/BlogListData.vue';
import BlogCreate from '../components/BlogCreate.vue';
import BlogUpdate from '../components/BlogUpdate.vue';

const blogRoutes = [
    {
        path: '/blogs',
        component: Blogs,
        meta: { requiresAuth: true },
        children: [
            {
                path: '',
                name: 'BlogListData',
                component: BlogListData,
            },
            {
                path: 'add',
                name: 'BlogCreate',
                component: BlogCreate,
            },
            {
                path: 'edit/:id',
                name: 'BlogUpdate',
                component: BlogUpdate,
            },
        ],
    },
];

export default blogRoutes;
