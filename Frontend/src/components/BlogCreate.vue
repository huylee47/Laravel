<template>
  <h1>Thêm mới bảng tin</h1>
  <form @submit.prevent="createBlog" class="form-container">
    <div class="input">
      <input type="text" v-model="title" id="1" required placeholder="TIÊU ĐỀ">
      <input type="text" v-model="content" id="2" required placeholder="NỘI DUNG">
      <input type="text" v-model="author" id="3" required placeholder="TÁC GIẢ">
    </div>
    <button type="submit">LƯU</button>
    <router-link to="/blogs">
      <button type="button">TRỞ VỀ</button>
    </router-link>
  </form>
</template>
<script>
import { createBlog } from '../services/blogService.js';

export default {
  name: 'AddBlog',
  data() {
    return {
      title: '',
      content: '',
      author: '',
    };
  },
  methods: {
    async createBlog() {
      const blogData = {
        title: this.title,
        content: this.content,
        author: this.author,
      };

      try {
        await createBlog(blogData);
        this.$router.push('/blogs');
      } catch (error) {
        console.error('Không tạo được blog:', error);
      }
    },
  },
};
</script>