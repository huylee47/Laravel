<template>
  <h1>Sửa đổi Blog</h1>
  <form @submit.prevent="updateBlog" class="form-container">
    <div class="input">
      <input type="text" v-model="title" id="title_input" required placeholder="TIÊU ĐỀ">
      <input type="text" v-model="content" id="content_input" required placeholder="NỘI DUNG">
      <input type="text" v-model="author" id="author" required placeholder="TÁC GIẢ">
    </div>
    <button type="submit">LƯU</button>
    <router-link to="/blogs">
      <button type="button">TRỞ VỀ</button>
    </router-link>
  </form>
</template>

<script>
import { fetchBlogById, updateBlog } from '../services/blogService.js';

export default {
  name: 'EditBlog',
  data() {
    return {
      title: '',
      content: '',
      author: '',
      blogId: this.$route.params.id,
    };
  },
  mounted() {
    this.loadBlog();
  },
  methods: {
    async loadBlog() {
      try {
        const blog = await fetchBlogById(this.blogId);
        console.log(blog);
        this.title = blog.title || '';
        this.content = blog.content || '';
        this.author = blog.author || '';
      } catch (error) {
        console.error('Failed to load blog:', error);
        alert('Không thể tải sản phẩm. Vui lòng thử lại sau.');
      }
    },
    async updateBlog() {
      const blogData = {
        title: this.title,
        content: this.content,
        author: this.author,
      };

      try {
        await updateBlog(this.blogId, blogData);
        alert('Cập nhật blog thành công!');
        this.$router.push('/blogs');
      } catch (error) {
        console.error('Failed to update product:', error);
        alert('Cập nhật blog thất bại. Vui lòng thử lại.');
      }
    },
  },
};
</script>