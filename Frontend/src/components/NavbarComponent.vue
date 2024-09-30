<template>
  <nav>
    <i class='bx bx-menu toggle-sidebar'></i>
    <form action="#">
      <!-- <div class="form-group">
        <input type="text" placeholder="Tìm kiếm...">
        <i class='bx bx-search icon'></i>
      </div> -->
    </form>
    <!-- <a href="#" class="nav-link">
      <i class='bx bxs-bell icon'></i>
      <span class="badge">5</span>
    </a>
    <a href="#" class="nav-link">
      <i class='bx bxs-message-square-dots icon'></i>
      <span class="badge">8</span>
    </a> -->
    <span class="divider"></span>
    <div class="profile">
      <img src="../assets/img/avt.jpg" alt="">
      <ul class="profile-link">
        <li><router-link to="/infomations"><i class='bx bxs-user-circle icon'></i> Profile</router-link></li>
        <li><router-link to="/settings"><i class='bx bxs-cog'></i> Settings</router-link></li>
        <li><router-link to="/logout"><i class='bx bxs-log-out-circle'></i> Logout</router-link></li>
      </ul>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Navbar",
};
</script>