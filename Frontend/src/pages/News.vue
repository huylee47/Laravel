<template>
    <div class="container">
        <Sidebar />
        <main class="main-content">
            <header>
                <h1><i class="fas fa-newspaper"></i> Tổng quan</h1>
            </header>
            <div class="news">
                <h1>Quản lý tin tức</h1>
            </div>
        </main>
    </div>
</template>

<script>
import Sidebar from '../components/Sidebar.vue';

export default {
    components: {
        Sidebar,
    },
};
</script>
<style scoped>
@import '../assets/css/style.module.css';
</style>