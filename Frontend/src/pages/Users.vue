<template>
  <div>
    <Sidebar />
    <section id="content">
      <Navbar />
      <router-view />
    </section>
  </div>
</template>


<script>
import Sidebar from '../components/SidebarComponent.vue';
import Navbar from '../components/NavbarComponent.vue';
import effect from '@/assets/script.js';

export default {
  name: "App",
  components: { Sidebar, Navbar },
  mounted() {
    effect();
  }
}
</script>