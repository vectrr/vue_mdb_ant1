<template>
  <div >
      <mdb-mask class="d-flex justify-content-center align-items-center gradient">
        <mdb-container class="px-md-3 px-sm-0">
          <mdb-row>
            <mdb-col md="12" class="mb-4 white-text text-center animated fadeIn">
              <h3 class="display-3 font-weight-bold mb-0 pt-md-5 ">Creative Agency </h3>
              <hr class="hr-light my-4 w-75 "  />
              <h4 class="subtext-header mt-2 mb-4" >Lorem ipsum dolor sit amet, consectetur adipisicing elit deleniti consequuntur nihil.</h4>
              <mdb-btn outline="white" rounded color="white" ><mdb-icon icon="home"/> Visit us</mdb-btn>
            </mdb-col>
          </mdb-row>
        </mdb-container>
      </mdb-mask>

  </div>
</template>
<script>
  import { mdbContainer, mdbRow, mdbCol, mdbMask, mdbBtn,  } from 'mdbvue';
  export default {
    name: 'AppPage',
    components: {
      mdbContainer,
      mdbRow,
      mdbCol,
     
      
      mdbMask,
      mdbBtn,
      
      
    }
  };
</script>
<style scoped>
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