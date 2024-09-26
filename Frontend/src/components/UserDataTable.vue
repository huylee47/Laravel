<template>
    <h1>Quản lý nhân viên</h1>
    <router-link to="/users/add">
        <button>Thêm mới</button>
    </router-link>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="auth in auths" :key="auth.id">
                <td>{{ auth.id }}</td>
                <td>{{ auth.username }}</td>
                <td>{{ auth.password }}</td>
                <td>
                    <router-link :to="`/users/edit/${auth.id}`">
                        <button>SỬA</button>
                    </router-link>
                    <button @click="confirmDelete(auth.id)">XÓA</button>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
import { fetchAuths, deleteAuth } from '../api/users';

export default {
    name: 'AccountDataTable',
    data() {
        return {
            auths: [],
        };
    },
    mounted() {
        this.loadAuths();
    },
    methods: {
        async loadAuths() {
            try {
                this.auths = await fetchAuths();
            } catch (error) {
                console.error('Failed to load auths:', error);
            }
        },
        async deleteAuth(id) {
            try {
                await deleteAuth(id);
                this.loadAuths(); // Refresh the list after deletion
            } catch (error) {
                console.error('Failed to delete auth:', error);
            }
        },
        confirmDelete(id) {
            if (confirm('Are you sure you want to delete this user?')) {
                this.deleteAuth(id);
            }
        },
    },
};
</script>

<style scoped>
@import '../assets/css/styles.module.css';
@import '../assets/css/container.module.css';
</style>
