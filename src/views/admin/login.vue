<template>
  <!-- Card -->
  <mdb-card class="mTop1">
    <mdb-card-body>
      <!-- <a-form layout="inline" :form="form" @submit="handleSubmit">
    <a-form-item :validate-status="userNameError() ? 'error' : ''" :help="userNameError() || ''">
      <a-input
        v-decorator="[
          'userName',
          { rules: [{ required: true, message: 'Please input your username!' }] },
        ]"
        placeholder="Username"
      >
        <a-icon slot="prefix" type="user" style="color:rgba(0,0,0,.25)" />
      </a-input>
    </a-form-item>
    <a-form-item :validate-status="passwordError() ? 'error' : ''" :help="passwordError() || ''">
      <a-input
        v-decorator="[
          'password',
          { rules: [{ required: true, message: 'Please input your Password!' }] },
        ]"
        type="password"
        placeholder="Password"
         icon="lock"
      >
        <a-icon slot="prefix" type="lock" style="color:rgba(0,0,0,.25)" />
      </a-input>
    </a-form-item>
    <a-form-item>
      <mdb-btn type="primary" html-type="submit" :disabled="hasErrors(form.getFieldsError())">
        Log in
      </mdb-btn>
    </a-form-item>
  </a-form> -->
      <form @submit="handleSubmit">
        <p class="h4 text-center py-4">Sign up</p>
        <div class="grey-text">
        
          <mdb-input label="Your email" icon="envelope" group type="email" validate error="wrong" success="right" @input="hEmail"/>
     
          <mdb-input label="Your password" icon="lock" group type="password" validate @input="hPass"/>
        </div>
        <div class="text-center py-4 mt-3">
          <mdb-btn color="cyan" type="submit">Login</mdb-btn>
        </div>
      </form>
<imd src="../../s/s1/api.php"/>
      
    </mdb-card-body>
  </mdb-card>
  <!-- Card -->
</template>
<script>
  import { mdbInput, mdbBtn, mdbCard, mdbCardBody } from 'mdbvue';
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
      mdbCardBody
    },
    
  data() {
    return {
      hasErrors,
      form: this.$form.createForm(this, { name: 'horizontal_login' }),
      pass:"empty",
      email:"empty"
    };
  },
  mounted() {
    
    this.$nextTick(() => {
      // To disabled submit button at the beginning.
      this.form.validateFields();
    });
  },
  methods: {
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
      
var murl=this.$store.state.mUrl;
// alert(murl);
        axios({
          method: 'POST',
          // url: 'http://localhost/nw/vap/regApi.php?apicall=signup'
          url: murl+'api.php?apicall=admin_l',
          data: article,
          config: { headers: {'Content-Type': 'multipart/form-data' }}
      })
      .then((response) => {
        console.log("response: "+response);
        console.log("response1: "+ JSON.stringify(response.data));
        // console.log("response2: "+response.data);
        if(response.data.val==22 & !response.data.error){
          
          // var key=this.$store.state.mKey;
          // var cName = this.$Dcrypt.encrypt("response.data.name",  "key");
          // var cId = this.$Dcrypt.encrypt(response.data.id,  key);
          var cName=response.data.name;
          var cId=response.data.id
          this.$cookies.set("admin",cName,"22min");
          this.$cookies.set("id",cId,"22min");
          this.$router.push('/Products');
          

          // this.$cookies.remove("id" ) 
        }


      })
      .catch(function (response) {
          //handle error
          console.log("error"+response)
      });

// const article = { email: "Vue POST Request Example" };
// const headers={'Content-Type': 'multipart/form-data'}
//   axios.post("http://localhost/w/15minutes/api.php?Regd_ID=admin_l", article,headers)
//     .then((response) => { 
//         console.log("response: "+response);
//         console.log("response1: "+ JSON.stringify(response));
//         console.log("response2: "+response.data.message);
//     })
//     .catch(error => {
//       this.errorMessage = error.message;
//       console.error("There was an error!", error);
//     });

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
    .mTop1{
        margin-top: 93px;
    }
    .mRow {
        max-width: 875px;
    }
</style>