<template>
  <h1>Quản lý sản phẩm</h1>
  <router-link to="/product/add">
    <button>Thêm mới</button>
  </router-link>
  <table>
    <thead>
    <tr>
      <th>ID</th>
      <th>TÊN</th>
      <th>GIÁ</th>
      <th>ACTIONS</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="pdt in product" :key="pdt.id">
      <td>{{ pdt.id }}</td>
      <td>{{ pdt.name }}</td>
      <td>{{ pdt.price }}</td>
      <td>
        <!-- <button @click="editAuth(auth.id)">Edit</button> -->
        <router-link to="/users/edit"><button>SỬA</button></router-link>
        <button @click="deleteProduct(auth.id)">XÓA</button>
      </td>
    </tr>
    </tbody>
  </table>
</template>
<script>
import { fetchProducts, editProduct, deleteProduct } from '../api/products.js';

export default {
  name: 'ProductsDataTable',
  data() {
    return {
      product: [],
    };
  },
  mounted() {
    this.loadAuths();
  },
  methods: {
    async loadAuths() {
      try {
        this.product = await fetchProducts();
      } catch (error) {
        console.error('Failed to load auths:', error);
      }
    },
    editProduct,
    deleteProduct,
  },
};
</script>
<style scoped>
@import '../assets/css/styles.module.css';
@import '../assets/css/container.module.css';
</style>