<template>
    <h1>Sửa đổi nhân viên</h1>
    <form @submit.prevent="updateAccount" class="form-container">
        <div class="input">
            <input type="text" v-model="username" id="username" required placeholder="USERNAME">
            <input type="password" v-model="password" id="password" required placeholder="PASSWORD">
        </div>
        <button type="submit">LƯU</button>
        <router-link to="/users">
            <button type="button">TRỞ VỀ</button>
        </router-link>
    </form>
</template>

<script>
import { fetchUserById, updateUser } from '../services/userService.js'; // Import your API functions

export default {
    name: 'EditUser',
    data() {
        return {
            username: '',
            password: '',
            userId: this.$route.params.id, // Get the ID from the route params
        };
    },
    mounted() {
        this.loadUser(); // Load user data when the component is mounted
    },
    methods: {
        async loadUser() {
            try {
                const user = await fetchUserById(this.userId); // Fetch current user data by ID
                this.username = user.username; // Pre-fill username
                this.password = user.password; // Pre-fill password
            } catch (error) {
                console.error('Failed to load user:', error);
                // You can handle the error here, like showing an alert or a message
            }
        },
        async updateAccount() {
            const userData = {
                username: this.username,
                password: this.password,
            };

            try {
                await updateUser(this.userId, userData); // Call the API to update the user
                this.$router.push('/users'); // Redirect to users list after successful update
            } catch (error) {
                console.error('Failed to update account:', error);
                // Handle the error appropriately (e.g., notify the user)
            }
        },
    },
};
</script>

<style scoped>
@import '../assets/css/style.module.css';
</style>
