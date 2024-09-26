<template>
  <h1>Sửa đổi sản phẩm</h1>
  <form @submit.prevent="updateProduct" class="form-container">
    <div class="input">
      <input type="text" v-model="name" id="name" required placeholder="TÊN SẢN PHẨM">
      <input type="number" v-model="price" id="price" required placeholder="GIÁ">
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
      name: '',
      price: '',
      productId: this.$route.params.id, // Get the ID from the route params
    };
  },
  mounted() {
    this.loadProduct(); // Load product data when the component is mounted
  },
  methods: {
    async loadProduct() {
      try {
        const product = await fetchProductById(this.productId); // Fetch current product data by ID
        this.name = product.name; // Pre-fill name
        this.price = product.price; // Pre-fill price
      } catch (error) {
        console.error('Failed to load product:', error);
        // You can handle the error here, like showing an alert or a message
      }
    },
    async updateProduct() {
      const productData = {
        name: this.name,
        price: this.price,
      };

      try {
        await updateProduct(this.productId, productData); // Call the API to update the product
        this.$router.push('/products'); // Redirect to products list after successful update
      } catch (error) {
        console.error('Failed to update product:', error);
        // Handle the error appropriately (e.g., notify the user)
      }
    },
  },
};
</script>

<style scoped>
@import '../assets/css/style.module.css';
</style>