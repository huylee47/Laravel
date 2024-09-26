<template>
  <h1>Quản lý nhân viên</h1>
  <router-link to="/users/add">
    <button>Thêm mới</button>
  </router-link>
  <table>
    <thead>
    <tr>
      <th>ID</th>
      <th>TÀI KHOẢN</th>
      <th>MẬT KHẨU</th>
      <th>THAO TÁC</th>
    </tr>
    </thead>
    <tbody>
    <tr v-if="loading">
      <td colspan="4">Đang tải...</td>
    </tr>
    <tr v-for="user in users" :key="user.id" v-else>
      <td>{{ user.id }}</td>
      <td>{{ user.username }}</td>
      <td>{{ user.password }}</td>
      <td>
        <router-link :to="`/users/edit/${user.id}`">
          <button>SỬA</button>
        </router-link>
        <button @click="confirmDelete(user.id)">XÓA</button>
      </td>
    </tr>
    </tbody>
  </table>
</template>

<script>
import { fetchUsers, deleteUser as deleteUserService } from '../services/userService.js';

export default {
  name: 'UserDataTable',
  data() {
    return {
      users: [],
      loading: false,
    };
  },
  mounted() {
    this.loadUsers();
  },
  methods: {
    async loadUsers() {
      this.loading = true;
      try {
        this.users = await fetchUsers();
      } catch (error) {
        console.error('Failed to load users:', error);
        alert('Không thể tải dữ liệu nhân viên.');
      } finally {
        this.loading = false;
      }
    },
    async removeUser(id) {
      try {
        await deleteUserService(id);
        this.loadUsers();
      } catch (error) {
        console.error('Failed to delete user:', error);
        alert('Không thể xóa dữ liệu nhân viên.');
      }
    },
    confirmDelete(id) {
      if (confirm('Are you sure you want to delete this user?')) {
        this.removeUser(id);
      }
    },
  },
};
</script>
<style scoped>
@import '../assets/css/style.module.css';
</style>