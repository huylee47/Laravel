import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import path from 'path';  // Import path module to use for resolving

export default defineConfig({
  plugins: [vue()],
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './src')  // Set `@` to resolve to `./src`
    }
  }
});
