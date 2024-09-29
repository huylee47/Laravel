<template>
    <!-- Phần đăng tải -->
    <form @submit.prevent="createBlog">
        <header class="header">
            <div class="header-left">
                <div class="search-bar">
                    <img src="../assets/img/avt.jpg" alt="User Avatar">
                    <input type="text" v-model="title" placeholder="TIÊU ĐỀ" style="width: auto;">
                    <input type="text" v-model="content" placeholder="Khoa ơi, bạn đang nghĩ gì thế?">
                    <input type="text" v-model="author" placeholder="TÁC GIẢ" style="width: auto;">
                </div>
            </div>
            <div class="header-right">
                <button class="upload-btn" style="submit">ĐĂNG TẢI</button>
            </div>
        </header>
    </form>
    <!-- Phần bài đăng -->
    <section v-if="loading" class="post-section">
        <p>Đang tải...</p>
    </section>
    <section v-for="blog in blogs" :key="blog.id" class="post-section" v-else>
        <div class="post-header">
            <!-- <img :src="blog.avatar" alt="User Avatar"> -->
            <img src="../assets/img/avt.jpg" alt="User Avatar">
            <p class="post-name">{{ blog.author }}</p>
        </div>
        <div class="post-content">
            <h5 class="post-text">{{ blog.title }}</h5>
            <p class="post-text">{{ blog.content }}</p>
            <!-- <img :src="blog.image" alt="Post Image" class="post-image" v-if="blog.image"> -->
            <img src="../assets/img/feed.jpeg" alt="Post Image" class="post-image">
        </div>
    </section>

</template>

<script>
import { createBlog, fetchBlogs } from '../services/blogService.js';

export default {
    name: 'AddBlog',
    data() {
        return {
            blogs: [],
            loading: false,
            title: '',
            content: '',
            author: '',
        };
    },
    mounted() {
        this.loadBlogs();
    },
    methods: {
        async loadBlogs() {
            this.loading = true;
            try {
                this.blogs = await fetchBlogs();
                // Đảo ngược thứ tự danh sách blogs
                this.blogs.reverse();
            } catch (error) {
                console.error('Không thể tải sản phẩm:', error);
                alert('Không thể tải dữ liệu sản phẩm.');
            } finally {
                this.loading = false;
            }
        },
        async createBlog() {
            const blogData = {
                title: this.title,
                content: this.content,
                author: this.author,
            };

            try {
                await createBlog(blogData);
                alert('Blog đã được đăng tải thành công!');
                this.title = '';
                this.content = '';
                this.author = '';
                this.loadBlogs();
            } catch (error) {
                console.error('Không tạo được blog:', error);
                alert('Đã có lỗi xảy ra. Vui lòng thử lại.');
            }
        }
    },
};
</script>