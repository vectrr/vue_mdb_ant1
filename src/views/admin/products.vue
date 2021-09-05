<template >
<div class="mTop">
    <a-affix :offset-top="top">
         <div style="width: 256px">
        <a-button type="primary" style="margin-bottom: 16px"  @click="toggleCollapsed">
        <a-icon :type="collapsed ? 'menu-unfold' : 'menu-fold'" />
        </a-button>
        <a-menu
        :default-selected-keys="['1']"
       
        mode="inline"
        theme="dark"
        :inline-collapsed="collapsed"
        >
        <a-menu-item key="1">
            <a-icon type="pie-chart" />
            <span>Option 1</span>
        </a-menu-item>
        <a-menu-item key="2">
            <a-icon type="desktop" />
            <span>Option 2</span>
        </a-menu-item>
        <a-menu-item key="3">
            <a-icon type="inbox" />
            <span>Option 3</span>
        </a-menu-item>
    
        </a-menu>
    </div>
    
 </a-affix>
    <!-- <a-drawer
      title="Basic Drawer"
      :placement="placement"
      :closable="false"
      :visible="visible"
      @close="onClose"
    >
      <p>Some contents...</p>
      <p>Some contents...</p>
      <p>Some contents...</p>
    </a-drawer> -->
<mdb-container>
<div>


</div>

  <mdb-card style="width:99%;max-width:1400px" >
    <mdb-card-body>
  <mdb-card >
    <mdb-card-body>
     
      <form @submit="handleSubmit">
        <p class="h4 text-center py-4">Products</p>
        <div class="grey-text">
        
          <mdb-input label="Your email" icon="envelope" group type="email" validate error="wrong" success="right" @input="hEmail"/>
     
          <mdb-input label="Your password" icon="lock" group type="password" validate @input="hPass"/>
        </div>
        <div class="text-center py-4 mt-3">
          <mdb-btn color="cyan" type="submit">Register</mdb-btn>
        </div>
      </form>

      
    </mdb-card-body>
  </mdb-card>
      
    </mdb-card-body>
  </mdb-card>

    </mdb-container>
  <!-- Card -->
</div>
</template>
<script>
  import { mdbInput, mdbBtn, mdbCard, mdbCardBody,
      mdbContainer,  } from 'mdbvue';
  const axios = require('axios');
  

  function hasErrors(fieldsError) {
  return Object.keys(fieldsError).some(field => fieldsError[field]);
}
  export default {
    name: 'Basic',
    components: {
      mdbInput,
      mdbBtn,
      mdbCard,
      mdbCardBody,
      mdbContainer,
     
    },
    
  data() {
    return {
        hasErrors,
        form: this.$form.createForm(this, { name: 'horizontal_login' }),
        pass:"empty",
        email:"empty",
        collapsed: true,
         top: 70,
         
      visible: false,
      placement: 'left',
    };
  },
  mounted() {
   if(!this.$cookies.isKey("admin")){
        this.$router.push('/Admin');
   }

    this.$nextTick(() => {
      // To disabled submit button at the beginning.
      this.form.validateFields();
    });
  },
  methods: {
       showDrawer() {
      this.visible = true;
    },
    onClose() {
      this.visible = false;
    },
   toggleCollapsed() {
      this.collapsed = !this.collapsed;
    },
    // Only show error after a field is touched.
    userNameError() {
      const { getFieldError, isFieldTouched } = this.form;
      return isFieldTouched('userName') && getFieldError('userName');
    },
    // Only show error after a field is touched.
    passwordError() {
      const { getFieldError, isFieldTouched } = this.form;
      return isFieldTouched('password') && getFieldError('password');
    },
    handleSubmit(e) {
      e.preventDefault();
      const form_data = new FormData();
       form_data.append('email',this.email);
       form_data.append('pass',this.pass);
      console.log(this.pass);
 const article = { 
    email:this.email ,
    pass:this.pass
 };
      

        axios({
          method: 'POST',
          // url: 'http://localhost/nw/vap/regApi.php?apicall=signup'
          url: 'http://localhost/w/15minutes/api.php?apicall=admin_l',
          data: article,
          config: { headers: {'Content-Type': 'multipart/form-data' }}
      })
      .then((response) => {
        console.log("response: "+response);
        console.log("response1: "+ JSON.stringify(response.data));
        // console.log("response2: "+response.data);
        if(response.data.val==22 & !response.data.error){
          this.$cookies.set("admin",response.data.name,"22min");
          this.$cookies.set("id",response.data.id,"22min");
          // this.$cookies.remove("id" ) 
        }


      })
      .catch(function (response) {
          //handle error
          console.log("error"+response)
      });


    },
    hEmail (val) {
     this.email=val
    // console.log(val);
    },
    hPass (val) {
      this.pass=val
    // console.log(val);
    }
  },
  
  }
</script>


<style>
    .card {
        max-width: 400px;
        width:80%;
        margin-left:auto;
        margin-right:auto;
    }
    .mTop{
        /* margin-top: 73px; */
        background: linear-gradient(337deg, rgb(0 12 23) 15%, rgb(167, 202, 164) 4%, rgb(0 12 23) 90%, rgba(0, 0, 0, 0.87) 4%);
        margin-top: -23%;
        padding-top: 30%;
    }
    .mRow {
        max-width: 875px;
    }
    ul.ant-menu-inline-collapsed {
    width: 8px;

    }
        
    li.ant-menu-item{
        padding: 1px;
    }
</style>