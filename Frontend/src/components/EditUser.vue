<template>
    <h1>Sửa đổi nhân viên</h1>
    <form @submit.prevent="createAccount" class="form-container">
        <div class="input">
            <input type="file" @change="onFileChange" id="photo" required>
            <input type="text" v-model="username" id="username" required placeholder="USERNAME">
            <input type="text" v-model="password" id="password" required placeholder="PASSWORD">
            <input type="text" v-model="cccd" id="cccd" required placeholder="CCCD">
            <input type="email" v-model="email" id="email" required placeholder="EMAIL">
            <input type="file" @change="onFileChange" id="photo" required>
            <input type="text" v-model="role" id="role" required placeholder="VAI TRÒ">
            <select v-model="status" id="status" required>
                <option value="active">Hoạt động</option>
                <option value="inactive">Không hoạt động</option>
            </select>
        </div>
        <button type="submit">LƯU</button>
        <router-link to="/users">
            <button type="button">TRỞ VỀ</button>
        </router-link>
    </form>
</template>
<script>

</script>
<style scoped>
@import '../assets/css/styles.module.css';
@import '../assets/css/container.module.css';
@import '../assets/css/input.module.css';
</style>