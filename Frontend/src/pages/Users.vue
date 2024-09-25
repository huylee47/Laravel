<template>
  <div class="container">
    <Sidebar />
    <main class="main-content">
      <header>
        <h1><i class="fas fa-user"></i> Tài Khoản</h1>
      </header>
      <!-- Hiển thị component dựa trên route con -->
      <router-view />
    </main>
  </div>
</template>

<script>
import Sidebar from '../components/Sidebar.vue';
import AccountDataTable from '../components/UserDataTable.vue';

export default {
  components: {
    AccountDataTable,
    Sidebar,
  },
};
</script>

<style scoped>
@import '../assets/css/styles.module.css';
@import '../assets/css/container.module.css';
</style>
