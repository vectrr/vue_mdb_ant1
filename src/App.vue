<template>
<div>
  <mdb-navbar color="info" position="top" dark>
    <mdb-navbar-brand to="/"  href="https://mdbootstrap.com/">
      15Minutes
    </mdb-navbar-brand>
    <mdb-navbar-toggler>
      <mdb-navbar-nav>
        <mdb-nav-item  to="/" active>Home1</mdb-nav-item>
        <mdb-nav-item href="#">Features</mdb-nav-item>
        <mdb-nav-item href="#">About us</mdb-nav-item>
        <mdb-nav-item  to="/admin">Admin</mdb-nav-item>
      </mdb-navbar-nav>
      <form>
        <mdb-input type="text" class="text-white" placeholder="Search" aria-label="Search" label navInput waves waves-fixed/>
      </form>
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
  import { mdbNavbar, mdbNavbarBrand, mdbNavbarToggler, mdbNavbarNav, mdbNavItem, mdbInput } from 'mdbvue';
  export default {
    name: 'NavbarPage',
    components: {
      mdbNavbar,
      mdbNavbarBrand,
      mdbNavbarToggler,
      mdbNavbarNav,
      mdbNavItem,
      mdbInput
    }
  }
</script>
<style>
    .nav {
        background-color: #ffffff;
    }
</style>