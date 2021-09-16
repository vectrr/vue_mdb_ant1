<template>
<div>
  <mdb-navbar  v-bind:class = "isMobile()?'mNavc':'dNavc'"   color="info" position="top" dark transparent scrolling>
    <mdb-navbar-brand to="/"  href="../assets/img/hm.png">
           <img src="./assets/img/logo.png" alt=" logo" style="max-width:33px">
    15Minutes 
    </mdb-navbar-brand>

    <mdb-navbar-toggler>
      <mdb-navbar-nav>  
        <mdb-nav-item  to="/" active>Home</mdb-nav-item>
        <mdb-nav-item to="/motocycles">Motocycles</mdb-nav-item>
        <mdb-nav-item href="#">About us</mdb-nav-item>
        <mdb-nav-item  to="/admin">Admin</mdb-nav-item>
      </mdb-navbar-nav>
    </mdb-navbar-toggler>
  </mdb-navbar>
   <main :style="{ marginTop: $store.state.docs ? '0px' : '0px' }">
      <transition name="fade" mode="out-in">
        <router-view></router-view>
      </transition>
    </main>
    <mdb-footer v-if="$store.state.docs" color="stylish-color">
      <p class="footer-copyright mb-0 py-3 text-center">
        &copy; {{ new Date().getFullYear() }} Copyright:
        <a
          href="/"
          >15 Minutes</a
        >
      </p>
    </mdb-footer>
    </div>
</template>
<script>
  import { mdbNavbar, mdbNavbarBrand, mdbNavbarToggler, mdbNavbarNav, mdbNavItem,  } from 'mdbvue';
  
import { isMobile } from 'mobile-device-detect';
  // alert(this.mib);
  export default {
    name: 'Home',
      props: ['isMobilez'],
       data() {
          return {
            mib:isMobile,
            // email:this.postEmail,
            msg:""
          }
        },
    components: {
      mdbNavbar,
      mdbNavbarBrand,
      mdbNavbarToggler,
      mdbNavbarNav,
      mdbNavItem,
      
      
     
    },
    methods: {
      isMobile1() {
        if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
          return true
        } else {
          return false
        }
      },
      isMobile() {
        return isMobile
      }
    }
  }
</script>
<style>
    .nav {
        background-color: #ffffff;
    }
    .mNavc{
      /* background-color: #000 !important; */
      background: linear-gradient(177deg, rgb(0, 1, 2), #02092300);
    }
    .dNavc{
      background-color: transparent;
    }
    .info-color {
    background-color: #000 !important;
}
</style>