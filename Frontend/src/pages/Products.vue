<template>
  <div class="container">
    <Sidebar />
    <main class="main-content">
      <header>
        <h1><i class="fas fa-shopping-cart"></i> Tổng quan sản phẩm</h1>
      </header>
      <div class="products">
        <h1>Quản lý sản phẩm</h1>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Price</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="product in products" :key="product.id">
              <td>{{ product.id }}</td>
              <td>{{ product.name }}</td>
              <td>{{ product.price }}</td>
              <td>
                <button @click="editProduct(product.id)">Edit</button>
                <button @click="deleteProduct(product.id)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</template>

<script>
import Sidebar from '../components/Sidebar.vue';

export default {
  data() {
    return {
      products: [
        { id: 1, name: 'Product A', price: '$10' },
        { id: 2, name: 'Product B', price: '$20' },
      ],
    };
  },
  components: {
    Sidebar,
  },
};
</script>
<style scoped>
@import '../assets/css/styles.module.css';
@import '../assets/css/container.module.css';
</style>