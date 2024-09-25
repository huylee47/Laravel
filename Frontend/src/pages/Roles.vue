<template>
    <div class="container">
        <Sidebar />
        <main class="main-content">
            <header>
                <h1><i class="fas fa-shield-alt"></i> Phân quyền</h1>
            </header>
            <div class="roles">
                <h1>Quản lý phân quyền</h1>
            </div>
        </main>
    </div>
</template>

<script>
import Sidebar from '../components/Sidebar.vue';

export default {
    components: {
        Sidebar,
    }
};
</script>
<style scoped>
@import '../assets/css/styles.module.css';
@import '../assets/css/container.module.css';
</style>