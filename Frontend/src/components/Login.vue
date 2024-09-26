<template>
  <div class="login">
    <h2>Login</h2>
    <form @submit.prevent="login">
      <div>
        <label for="username">Username:</label>
        <input type="text" v-model="username" required />
      </div>
      <div>
        <label for="password">Password:</label>
        <input type="password" v-model="password" required />
      </div>
      <button type="submit">Login</button>
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

<style scoped>
.login {
  max-width: 300px;
  margin: auto;
  padding: 1em;
  border: 1px solid #ccc;
  border-radius: 5px;
}
</style>
