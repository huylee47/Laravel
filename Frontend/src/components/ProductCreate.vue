<template>
  <h1>Thêm mới sản phẩm</h1>
  <form @submit.prevent="createAccount" class="form-container">
    <div class="input">
      <input type="text" v-model="username" id="username" required placeholder="USERNAME">
      <input type="password" v-model="password" id="password" required placeholder="PASSWORD">
    </div>
    <button type="submit">LƯU</button>
    <router-link to="/products">
      <button type="button">TRỞ VỀ</button>
    </router-link>
  </form>
</template>

<script>
import { createUser } from '../services/userService.js';

export default {
  name: 'AddUser',
  data() {
    return {
      username: '',
      password: '',
    };
  },
  methods: {
    async createAccount() {
      const userData = {
        username: this.username,
        password: this.password,
      };

      try {
        await createUser(userData);
        this.$router.push('/users');
      } catch (error) {
        console.error('Failed to create account:', error);
      }
    },
  },
};
</script>