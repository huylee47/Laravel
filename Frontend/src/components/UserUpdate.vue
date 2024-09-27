<template>
    <h1>Sửa đổi nhân viên</h1>
    <form @submit.prevent="updateAccount" class="form-container">
        <div class="input">
            <input type="text" v-model="username" id="username" required placeholder="TÀI KHOẢN">
            <input type="password" v-model="password" id="password" required placeholder="MẬT KHẨU">
        </div>
        <button type="submit">LƯU</button>
        <router-link to="/users">
            <button type="button">TRỞ VỀ</button>
        </router-link>
    </form>
</template>

<script>
import { fetchUserById, updateUser } from '../services/userService.js';

export default {
    name: 'EditUser',
    data() {
        return {
            username: '',
            password: '',
            userId: this.$route.params.id,
        };
    },
    mounted() {
        this.loadUser();
    },
    methods: {
        async loadUser() {
            try {
                const user = await fetchUserById(this.userId);
                console.log(user);
                this.username = user.username || '';
                this.password = user.password || '';
            } catch (error) {
                console.error('Failed to load user:', error);
            }
        },
        async updateAccount() {
            const userData = {
                username: this.username,
                password: this.password,
            };

            try {
                await updateUser(this.userId, userData);
                this.$router.push('/users');
            } catch (error) {
                console.error('Failed to update account:', error);
            }
        },
    },
};
</script>
