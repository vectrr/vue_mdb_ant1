<template>
<div>
  <mdb-navbar color="info" position="top" dark transparent scrolling>
    <mdb-navbar-brand to="/"  href="../assets/img/hm.png">
           <img src="./assets/img/logo.png" height="30" alt="mdb logo">
      15Minutes
    </mdb-navbar-brand>

    <mdb-navbar-toggler>
      <mdb-navbar-nav>
        <mdb-nav-item  to="/" active>Home</mdb-nav-item>
        <mdb-nav-item href="#">Features</mdb-nav-item>
        <mdb-nav-item href="#">About us</mdb-nav-item>
        <mdb-nav-item  to="/admin">Admin</mdb-nav-item>
      </mdb-navbar-nav>
    </mdb-navbar-toggler>
  </mdb-navbar>
   <main :style="{ marginTop: $store.state.docs ? '60px' : '0px' }">
      <transition name="fade" mode="out-in">
        <router-view></router-view>
      </transition>
    </main>
    <mdb-footer v-if="$store.state.docs" color="stylish-color">
      <p class="footer-copyright mb-0 py-3 text-center">
        &copy; {{ new Date().getFullYear() }} Copyright:
        <a
          href="https://mdbootstrap.com/docs/vue/?utm_source=DemoApp&utm_medium=MDBVue"
          >MDBootstrap.com</a
        >
      </p>
    </mdb-footer>
    </div>
</template>
<script>
  import { mdbNavbar, mdbNavbarBrand, mdbNavbarToggler, mdbNavbarNav, mdbNavItem,  } from 'mdbvue';
  export default {
    name: 'NavbarPage',
    components: {
      mdbNavbar,
      mdbNavbarBrand,
      mdbNavbarToggler,
      mdbNavbarNav,
      mdbNavItem,
     
    }
  }
</script>
<style>
    .nav {
        background-color: #ffffff;
    }
</style>