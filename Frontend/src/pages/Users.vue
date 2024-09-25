<template>
  <div class="container">
    <Sidebar />
    <main class="main-content">
      <header>
        <h1><i class="fas fa-user"></i>Tài Khoản</h1>
      </header>
      <div class="auths">
        <h1>Quản lý tài khoản</h1>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>USERNAME</th>
              <th>PASSWORD</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="auth in auths" :key="auth.id">
              <td>{{ auth.id }}</td>
              <td>{{ auth.username }}</td>
              <td>{{ auth.password }}</td>
              <td>
                <button @click="editAuth(auth.id)">Edit</button>
                <button @click="deleteAuth(auth.id)">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
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
  data() {
    return {
      auths: [
        { id: 1, username: 'admin@admin.com', password: '123456' },
        { id: 2, username: 'user@user.com', password: '123456' },
      ],
    };
  },
};
</script>
<style scoped>
@import '../assets/css/styles.module.css';
@import '../assets/css/container.module.css';
</style>