<template>
  <div class="container">
    <Sidebar />
    <main class="main-content">
      <header>
        <h1><i class="fas fa-shopping-cart"></i> Tổng quan sản phẩm</h1>
      </header>
      <!-- Hiển thị component dựa trên route con -->
      <router-view />
    </main>
  </div>
</template>

<script>
import Sidebar from '../components/Sidebar.vue';
import ProductsDataTable from '../components/ProductListData.vue';

export default {
  components: {
    ProductsDataTable,
    Sidebar,
  },
};
</script>

<style scoped>
@import '../assets/css/style.module.css';
</style>
