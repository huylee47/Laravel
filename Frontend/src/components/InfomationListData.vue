<template>
    <main class="form" id="information_form">
        <section class="" style="padding-bottom: 20px;">
            <h1>QUẢN LÝ THÔNG TIN</h1>
        </section>
        <section class="">
            <div v-if="loading">Đang tải...</div>
            <div class="input" v-for="information in infomations" :key="information.id">
                <label class="form_body">ID</label>
                <input type="text" v-model="information.id" required placeholder="ID">
                <label class="form_body">USERNAME</label>
                <input type="text" v-model="information.username" required placeholder="USERNAME">
                <label class="form_body">MẬT KHẨU</label>
                <input type="text" v-model="information.password" required placeholder="MẬT KHẨU">
                <label class="form_body">VAI TRÒ</label>
                <input type="text" v-model="information.role" required placeholder="VAI TRÒ">
            </div>
            <router-link to="/change-password">
                <button type="button" style="background-color: green;">ĐẶT LẠI MẬT KHẨU</button>
            </router-link>
            <router-link to="/dashboard">
                <button type="button">TRỞ VỀ</button>
            </router-link>
        </section>
    </main>
</template>


<script>
import { fetchProfile } from '../services/authService.js';

export default {
    name: 'InfomationsData',
    data() {
        return {
            infomations: [],
            loading: false,
        };
    },
    mounted() {
        this.loadInfomations();
    },
    methods: {
        async loadInfomations() {
            this.loading = true;
            try {
                const data = await fetchProfile();
                this.infomations = [data];
            } catch (error) {
                alert('Không có quyền truy cập hoặc xảy ra lỗi khi tải dữ liệu sản phẩm !');
                this.$router.push('/infomations');
            } finally {
                this.loading = false;
            }
        }
    },
};
</script>
