<template>
  <main class="table" id="products_table">
    <section class="table__header">
      <h1>QUẢN LÝ SẢN PHẨM</h1>
      <router-link to="/products/add">
        <button>THÊM MỚI</button>
      </router-link>
      <div class="input-group">
        <input type="search" placeholder="Tìm kiếm...">
        <img src="../assets/img/search.png" alt="">
      </div>
    </section>
    <section class="table__body">
      <table>
        <thead>
          <tr>
            <th> ID </th>
            <th> TÊN </th>
            <th> GIÁ </th>
            <th> THAO TÁC</th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="loading">
            <td colspan="6">Đang tải...</td>
          </tr>
          <tr v-for="user in products" :key="user.id" v-else>
            <td>{{ user.id }}</td>
            <td>{{ user.name }}</td>
            <td>{{ user.price }}</td>
            <td>
              <router-link :to="`/products/edit/${user.id}`">
                <button>SỬA</button>
              </router-link>
              <button @click="confirmDelete(user.id)">XÓA</button>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>
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
        console.error('Không thể tải sản phẩm:', error);

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
        console.error('Không thể xóa sản phẩm:', error);

        alert('Không thể xóa dữ liệu sản phẩm.');
      }
    },
    confirmDelete(id) {
      if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này ?')) {
        this.removeProduct(id);
      }
    },
  },
};
</script>