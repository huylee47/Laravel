<template>
  <div class="login">
    <h2>ĐĂNG NHẬP</h2>
    <form @submit.prevent="login">
      <div>
        <label for="username">TÀI KHOẢN:</label>
        <input type="text" v-model="username" required />
      </div>
      <div>
        <label for="password">MẬT KHẨU:</label>
        <input type="password" v-model="password" required />
      </div>
      <button type="submit">ĐĂNG NHẬP</button>
    </form>
  </div>
</template>

<script>
import axios from '../axios';

export default {
  data() {
    return {
      username: '',
      password: ''
    };
  },
  methods: {
    login() {
      axios.post('http://127.0.0.1:8000/api/Auth/login', {
        username: this.username,
        password: this.password,
        _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      }).then(response => {
        localStorage.setItem('token', response.data.token);
        this.$store.dispatch('login', response.data.user);
        this.$router.push('/dashboard');
      }).catch(error => {
        console.error('Login failed:', error);
      });
    }
  }
};
</script>
