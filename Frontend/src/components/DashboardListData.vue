<template>
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
</template>
<script>
export default {
  data() {
    return {
      userCount: 150,
      productCount: 80,
      newsCount: 25,
    };
  },
}
</script>
<style scoped>
@import '../assets/css/style.module.css';
</style>