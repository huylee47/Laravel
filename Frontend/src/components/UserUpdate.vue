<template>
    <h1>Sửa đổi nhân viên</h1>
    <form @submit.prevent="updateAccount" class="form-container">
        <div class="input">
            <input type="text" v-model="username" id="username" required placeholder="TÀI KHOẢN">
            <input type="password" v-model="password" id="password" required placeholder="MẬT KHẨU">
            <input type="text" v-model="role" id="role" required placeholder="VAI TRÒ">
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
            role: '',
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
                this.role = user.role.toString() || '';
            } catch (error) {
                console.error('Failed to load user:', error);
            }
        },
        async updateAccount() {
            const userData = {
                username: this.username,
                password: this.password,
                role: this.role,
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
