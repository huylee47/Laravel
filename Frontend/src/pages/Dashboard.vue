<template>
  <div class="container">
    <Sidebar />
    <main class="main-content">
      <header>
        <h1><i class="fas fa-home"></i> Tổng quan</h1>
      </header>
      <section class="cards">
        <div class="card">
          <h3>Số lượng người dùng</h3>
          <p>{{ userCount }}</p>
        </div>
        <div class="card">
          <h3>Số lượng sản phẩm</h3>
          <p>{{ productCount }}</p>
        </div>
        <div class="card">
          <h3>Số lượng tin tức</h3>
          <p>{{ newsCount }}</p>
        </div>
      </section>
    </main>
  </div>
</template>

<script>
import Sidebar from '../components/Sidebar.vue';

export default {
  components: {
    Sidebar,
  },
  data() {
    return {
      userCount: 150,
      productCount: 80,
      newsCount: 25,
    };
  },
};
</script>
<style scoped>
@import '../assets/css/styles.module.css';
@import '../assets/css/container.module.css';
</style>