import Products from '../pages/Products.vue';
import ProductsDataTable from '../components/ProductsDataTable.vue'; // Thêm import cho ProductsDataTable
import AddProduct from '../components/AddProduct.vue'; // Thêm import cho AddProduct
import EditProduct from '../components/EditProduct.vue'; // Thêm import cho EditProduct

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
