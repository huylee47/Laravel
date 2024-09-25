import Products from '../pages/Products.vue';
import ProductsDataTable from '../components/ProductsDataTable.vue';
import AddProduct from '../components/AddProduct.vue';
import EditProduct from '../components/EditProduct.vue';

const productRoutes = [
    {
        path: '/products',
        component: Products,
        meta: { requiresAuth: true },
        children: [
            {
                path: '',
                name: 'ProductsDataTable',
                component: ProductsDataTable,
            },
            {
                path: 'add',
                name: 'AddProduct',
                component: AddProduct,
            },
            {
                path: 'edit',
                name: 'EditProduct',
                component: EditProduct,
            },
        ],
    },
];

export default productRoutes;
