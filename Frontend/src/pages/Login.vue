<template>
  <div class="login-page">
    <form @submit.prevent="login">
      <div>
        <label for="email">Email</label>
        <input type="email" v-model="email" required />
      </div>
      <div>
        <label for="password">Password</label>
        <input type="password" v-model="password" required />
      </div>
      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script>

export default {
  data() {
    return {
      email: '',
      password: '',
    };
  },
  methods: {
    login() {
      // Tạm thời hardcode
      if (this.email === 'admin@admin.com' && this.password === '123456') {
        localStorage.setItem('token', 'fakeToken');
        this.$router.push('/dashboard');
      } else {
        alert('Invalid credentials');
      }
    },
  },
};
</script>
<style scoped>
@import '../assets/css/login.module.css';
</style>
