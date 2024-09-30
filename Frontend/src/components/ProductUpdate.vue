<template>
  <h1>Sửa đổi sản phẩm</h1>
  <form @submit.prevent="updateProduct" class="form-container">
    <div class="input">
      <input type="text" v-model="name" id="name" required placeholder="TÊN SẢN PHẨM">
      <input type="number" v-model="price" id="price" required placeholder="GIÁ SẢN PHẨM">
    </div>
    <button type="submit">LƯU</button>
    <router-link to="/products">
      <button type="button">TRỞ VỀ</button>
    </router-link>
  </form>
</template>

<script>
import { fetchProductById, updateProduct } from '../services/productService.js';

export default {
  name: 'EditProduct',
  data() {
    return {
      name: '',
      price: '',
      productId: this.$route.params.id,
    };
  },
  mounted() {
    this.loadProduct();
  },
  methods: {
    async loadProduct() {
      try {
        const product = await fetchProductById(this.productId);
        console.log(product);
        this.name = product.name || '';
        this.price = product.price || '';
      } catch (error) {
        console.error('Không thể tải sản phẩm:', error);
        alert('Không thể tải sản phẩm. Vui lòng thử lại sau.');
      }
    },
    async updateProduct() {
      const productData = {
        name: this.name,
        price: this.price,
      };

      try {
        await updateProduct(this.productId, productData);
        alert('Cập nhật sản phẩm thành công!');
        this.$router.push('/products');
      } catch (error) {
        console.error('Không thể cập nhật sản phẩm:', error);
        alert('Cập nhật sản phẩm thất bại. Vui lòng thử lại.');
      }
    },
  },
};
</script>
