<template>
  <div>
    <Sidebar />
    <section id="content">
      <Navbar />
      <Dashboard />
    </section>
  </div>
</template>

<script>
import Sidebar from '../components/SidebarComponent.vue';
import Navbar from '../components/NavbarComponent.vue';
import Dashboard from '../components/DashboardComponent.vue';
import effect from '@/assets/script.js';

export default {
  name: "App",
  components: { Sidebar, Navbar, Dashboard },
  mounted() {
    effect();
  }
}
</script>
