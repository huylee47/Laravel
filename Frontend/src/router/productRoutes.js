import Products from '../pages/Products.vue';
import ProductListData from '../components/ProductListData.vue';
import ProductCreate from '../components/ProductCreate.vue';
import ProductUpdate from '../components/ProductUpdate.vue';

const productRoutes = [
    {
        path: '/products',
        component: Products,
        meta: { requiresAuth: true },
        children: [
            {
                path: '',
                name: 'ProductListData',
                component: ProductListData,
            },
            {
                path: 'add',
                name: 'ProductCreate',
                component: ProductCreate,
            },
            {
                path: 'edit/:id',
                name: 'ProductUpdate',
                component: ProductUpdate,
            },
        ],
    },
];

export default productRoutes;
