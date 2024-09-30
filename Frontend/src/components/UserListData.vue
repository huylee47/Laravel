<template>
  <main class="table" id="customers_table">
    <section class="table__header">
      <h1>QUẢN LÝ NHÂN VIÊN</h1>
      <router-link to="/users/add">
        <button>THÊM MỚI</button>
      </router-link>
      <div class="input-group">
        <input type="search" placeholder="Tìm kiếm...">
        <img src="../assets/img/search.png" alt="">
      </div>
    </section>
    <section class="table__body">
      <table>
        <thead>
          <tr>
            <th> ID </th>
            <th> TÀI KHOẢN </th>
            <th> MẬT KHẨU </th>
            <th> CHỨC VỤ </th>
            <th> THAO TÁC</th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="loading">
            <td colspan="6">Đang tải...</td>
          </tr>
          <tr v-for="user in users" :key="user.id" v-else>
            <td>{{ user.id }}</td>
            <td>{{ user.username }}</td>
            <td>{{ user.password }}</td>
            <td>{{ user.role === 0 ? 'ADMIN' : 'USER' }}</td>
            <td>
              <router-link :to="`/users/edit/${user.id}`">
                <button>SỬA</button>
              </router-link>
              <button @click="confirmDelete(user.id)">XÓA</button>
            </td>
          </tr>
        </tbody>
      </table>
    </section>
  </main>
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
        console.error('Không thể tải dữ liệu nhân viên:', error);
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
        console.error('Không thể xóa dữ liệu nhân viên:', error);
        alert('Không thể xóa dữ liệu nhân viên.');
      }
    },
    confirmDelete(id) {
      if (confirm('Bạn có chắc chắn muốn xóa người dùng này?')) {
        this.removeUser(id);
      }
    },
  },
};
</script>
<style></style>