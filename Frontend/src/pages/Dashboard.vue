<template>
  <div class="container">
    <Sidebar />
    <main class="main-content">
      <header>
        <h1><i class="fas fa-home"></i> Tổng quan</h1>
      </header>
      <DashboardDataTable />
      <NewsDataTable />
    </main>
  </div>
</template>

<script>
import Sidebar from '../components/Sidebar.vue';
import DashboardDataTable from '../components/DashboardDataTable.vue';
import NewsDataTable from '../components/NewsDataTable.vue';
export default {
  components: {
    Sidebar,
    DashboardDataTable,
    NewsDataTable,
  },

};
</script>
<style scoped>
@import '../assets/css/styles.module.css';
@import '../assets/css/container.module.css';
</style>