<template>
  <div class="bg">
      <!-- <mdb-mask class="d-flex justify-content-center align-items-center " style="margin-top:-23%;padding-top: 30%;background: linear-gradient(337deg, #000102 15%, #a7caa4 4%, #000000 90%, rgb(0 0 0 / 87%) 4%);"> -->
      <!-- <mdb-mask class="d-flex justify-content-center align-items-center " style="margin-top:-23%;padding-top: 30%;background: linear-gradient(337deg, rgb(0, 1, 2) 15%, rgb(167, 202, 164) 4%, #b3cfb3 9%, rgb(137 157 137) 68%,#899e89 4%);"> -->

<!-- <head>

  <link id="pagestyle" href="../assets/css/soft-design-system.css?v=1.0.5" rel="stylesheet" />
</head> -->

  <!-- Navbar -->

    <div class="page-header" style="min-height: 85vh " >
     
         <div class="container">
        <div class="row">
          <div class="col-lg-7 text-center mx-auto" style="margin-top:77px">
           
            <h1 class="text-white pt-3 mt-n5" >15Minutes Logistics</h1>
            <p class="lead text-white mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.  </p>
            <mdb-btn outline="white" rounded color="white" ><mdb-icon icon="home"/> Explore</mdb-btn>
          </div>
        </div>
      </div>

        <!-- <mdb-container class="px-md-3 px-sm-0" style="background:linear-gradient(152deg, #dce1e3 15%, #dee2e6 4%, #a5c9a2 90%, rgb(0 0 0 / 87%) 4%);">
          <mdb-row>
            <mdb-col md="12" class="mb-4 white-text text-center animated fadeIn">
              <h3 class="display-3 font-weight-bold mb-0 pt-md-5 " style=" font-size: 3.5rem;">15Minutes Logistics</h3>
              <hr class="hr-light my-4 w-75 "  />
              <h4 class="subtext-header mt-2 mb-4" >Lorem ipsum dolor sit amet, consectetur adipisicing elit deleniti consequuntur nihil.</h4>
              <mdb-btn outline="white" rounded color="white" ><mdb-icon icon="home"/> Visit us</mdb-btn>
            </mdb-col>
          </mdb-row>
        </mdb-container>
         -->
      <div class="position-absolute w-100 z-index-1 bottom-0">
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
          <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
          </defs>
          <g class="moving-waves">
            <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
            <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
            <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
            <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />
          </g>
        </svg>
      </div>
    </div>
  
  
  



  <!-- <mdb-mask class="d-flex justify-content-center align-items-center " style="margin-top:-23%;padding-top: 30%;background: linear-gradient(151deg, rgb(0, 1, 2) 15%, rgb(167, 202, 164) 4%, rgb(0, 0, 0) 90%, rgb(0 0 0) 4%);">

      </mdb-mask> -->

  </div>
</template>
<script>
  import { mdbBtn,  } from 'mdbvue';
  export default {
    name: 'AppPage',
    components: {
      // mdbContainer,
      // mdbRow,
      // mdbCol,
     
      
      // mdbMask,
      mdbBtn,
      
      
    }
  };
</script>

<style scoped>

@import  "../assets/css/soft-design-system.css?v=1.0.5";
  .bg {
    /* The image used */
    background-image: url("../assets/img/curved-images/curved.jpg");
    /* background-image: url("../assets/img/3.jpg"); */

    /* Full height */
    height: 100%;

    /* Center and scale the image nicely */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }
    h1 {
      font-weight: bolder;
      letter-spacing: 8px;
    }
    h1, h5 {
      text-transform: uppercase;
    }

    h5 {
      letter-spacing: 3px;
          font-weight: 300;
    }

    .hr-light {
      border-top: 3px solid #fff;
      width: 80px;
    }
    .navbar {
      transition: 1s;
    }
    .navbar .md-form {
      margin: 0;
    }
    .top-nav-collapse {
      background-color: #78909c !important;
    }
    @media (max-width: 990px){
      .navbar {
        background-color: #78909c !important;
      }
    }
    .gradient {
      background: -moz-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
      background: -webkit-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
      background: -webkit-gradient(linear, 45deg, from(rgba(42, 27, 161, 0.7)), to(rgba(29, 210, 177, 0.7)));
      background: -o-linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
      background: linear-gradient(45deg, rgba(42, 27, 161, 0.7), rgba(29, 210, 177, 0.7) 100%);
    }
    h6 {
        line-height: 1.7;
    }
</style>