<template>
  <div class="sidebar">
    <h2>Trang Quản Lý</h2>
    <ul>
      <li><router-link to="/dashboard">Tổng quan</router-link></li>
      <li><router-link to="/users">Quản lý tài khoản</router-link></li>
      <li><router-link to="/roles">Quản lý phân quyền</router-link></li>
      <li><router-link to="/news">Quản lý tin tức</router-link></li>
      <li><router-link to="/products">Quản lý sản phẩm</router-link></li>
      <li><router-link to="">Đăng xuất</router-link></li>
    </ul>
  </div>
</template>

<script>
export default {
  name: 'Sidebar',
};
</script>
<style scoped>
@import '../assets/css/sidebar.module.css';
</style>
