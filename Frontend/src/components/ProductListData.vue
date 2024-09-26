<template>
  <h1>Quản lý sản phẩm</h1>
  <router-link to="/products/add">
    <button>Thêm mới</button>
  </router-link>
  <table>
    <thead>
    <tr>
      <th>ID</th>
      <th>TÊN SẢN PHẨM</th>
      <th>GIÁ</th>
      <th>THAO TÁC</th>
    </tr>
    </thead>
    <tbody>
    <tr v-if="loading">
      <td colspan="4">Đang tải...</td>
    </tr>
    <tr v-for="product in products" :key="product.id" v-else>
      <td>{{ product.id }}</td>
      <td>{{ product.name }}</td>
      <td>{{ product.price }}</td>
      <td>
        <router-link :to="`/products/edit/${product.id}`">
          <button>SỬA</button>
        </router-link>
        <button @click="confirmDelete(product.id)">XÓA</button>
      </td>
    </tr>
    </tbody>
  </table>
</template>

<script>
import { fetchProducts, deleteProduct as deleteProductService } from '../services/productService.js';

export default {
  name: 'ProductDataTable',
  data() {
    return {
      products: [],
      loading: false,
    };
  },
  mounted() {
    this.loadProducts();
  },
  methods: {
    async loadProducts() {
      this.loading = true;
      try {
        this.products = await fetchProducts();
      } catch (error) {
        console.error('Failed to load products:', error);
        alert('Không thể tải dữ liệu sản phẩm.');
      } finally {
        this.loading = false;
      }
    },
    async removeProduct(id) {
      try {
        await deleteProductService(id);
        this.loadProducts();
      } catch (error) {
        console.error('Failed to delete product:', error);
        alert('Không thể xóa dữ liệu sản phẩm.');
      }
    },
    confirmDelete(id) {
      if (confirm('Are you sure you want to delete this product?')) {
        this.removeProduct(id);
      }
    },
  },
};
</script>
<style scoped>
@import '../assets/css/style.module.css';
</style>