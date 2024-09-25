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
                    <!-- <button @click="editAuth(auth.id)">Edit</button> -->
                    <router-link to="/users/edit"><button>SỬA</button></router-link>
                    <button @click="deleteAuth(auth.id)">XÓA</button>
                </td>
            </tr>
        </tbody>
    </table>
</template>
<script>
import { fetchAuths, editAuth, deleteAuth } from '../api/users';

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
        editAuth,
        deleteAuth,
    },
};
</script>
<style scoped>
@import '../assets/css/styles.module.css';
@import '../assets/css/container.module.css';
</style>