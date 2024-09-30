<template>
    <section id="sidebar">
        <router-link to="/dashboard" class="brand"><img src="../assets/img/logo.png" alt="" style="width: 45px;"> DASHBOARD</router-link>
        <ul class="side-menu">
            <li><a href="#" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
            <li class="divider" data-text="Quản trị viên">Quản trị viên</li>
            <li>
                <a href="#"><i class='bx bxs-inbox icon'></i> Quản trị <i
                        class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><router-link to="/users">Quản lý nhân viên</router-link></li>
                    <li><router-link to="/products">Quản lý sản phẩm</router-link></li>
                </ul>
            </li>
            <li class="divider" data-text="Tính năng">Tính năng</li>
            <li><router-link to="/blogs"><i class='bx bx-table icon'></i> Quản lý tin tức</router-link></li>
        </ul>
        <!-- <div class="ads">
            <div class="wrapper">
                <a href="#" class="btn-upgrade">NÂNG CẤP</a>
                <p>Trở thành thành viên <span>PRO</span> và tận hưởng <span>Tất cả tính năng</span></p>
            </div>
        </div> -->
    </section>
</template>

<script>
export default {
    name: "Sidebar",
};
</script>