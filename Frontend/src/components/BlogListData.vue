<template>
    <main class="table" id="blogs_table">
        <section class="table__header">
            <h1>QUẢN LÝ TIN TỨC</h1>
            <router-link to="/blogs/add">
                <button>THÊM MỚI</button>
            </router-link>
            <!-- <div class="input-group">
                <input type="search" placeholder="Tìm kiếm...">
                <img src="../assets/img/search.png" alt="">
            </div> -->
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> TIÊU ĐỀ </th>
                        <th> NỘI DUNG </th>
                        <th> TÁC GIẢ </th>
                        <th> THAO TÁC</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="loading">
                        <td colspan="6">Đang tải...</td>
                    </tr>
                    <tr v-for="blog in blogs" :key="blog.id" v-else>
                        <td>{{ blog.id }}</td>
                        <td>{{ blog.title }}</td>
                        <td>{{ blog.content }}</td>
                        <td>{{ blog.author }}</td>
                        <td>
                            <router-link :to="`/blogs/edit/${blog.id}`">
                                <button>SỬA</button>
                            </router-link>
                            <button @click="confirmDelete(blog.id)">XÓA</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</template>

<script>
import { fetchBlogs, deleteBlog as deleteBlogService } from '../services/blogService.js';

export default {
    name: 'BlogDataTable',
    data() {
        return {
            blogs: [],
            loading: false,
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
            } catch (error) {
                console.error('Không thể tải sản phẩm:', error);

                alert('Không thể tải dữ liệu sản phẩm.');
            } finally {
                this.loading = false;
            }
        },
        async removeBlog(id) {
            try {
                await deleteBlogService(id);
                this.loadBlogs();
            } catch (error) {
                console.error('Không thể xóa sản phẩm:', error);

                alert('Không thể xóa dữ liệu sản phẩm.');
            }
        },
        confirmDelete(id) {
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này ?')) {
                this.removeBlog(id);
            }
        },
    },
};
</script>