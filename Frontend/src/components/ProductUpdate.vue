<template>
  <h1>Sửa đổi sản phẩm</h1>
  <form @submit.prevent="updateAccount" class="form-container">
    <div class="input">
      <input type="text" v-model="username" id="username" required placeholder="TÊN">
      <input type="text" v-model="price" id="price" required placeholder="GIÁ">
    </div>
    <button type="submit">LƯU</button>
    <router-link to="/products">
      <button type="button">TRỞ VỀ</button>
    </router-link>
  </form>
</template>

<script>
import { fetchProductById, updateProduct } from '../services/productService.js'; // Import your API functions

export default {
  name: 'EditProduct',
  data() {
    return {
      username: '',
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
        const user = await fetchProductById(this.productId);
        this.username = user.username;
        this.price = user.price;
      } catch (error) {
        console.error('Failed to load user:', error);
      }
    },
    async updateAccount() {
      const productData = {
        username: this.username,
        price: this.price,
      };

      try {
        await updateProduct(this.productId, productData);
        this.$router.push('/users');
      } catch (error) {
        console.error('Failed to update account:', error);
      }
    },
  },
};
</script>
