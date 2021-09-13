<template>
  <div class="mTop">
    <div style="width: 256px">
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
            <span>Motocycles</span>
        </a-menu-item>
        <a-menu-item key="2">
            <a-icon type="desktop" />
            <span>Spare parts</span>
        </a-menu-item>
        <a-menu-item key="3">
            <a-icon type="inbox" />
            <span>Upload</span>
        </a-menu-item>
    
        </a-menu>
    </div>
 </a-affix>
   </div>
  <mdb-card style="width:99%;max-width:1400px;margin-top:30%;" >
    <mdb-card-body>
          <mdb-datatable-2 striped bordered small hover responsive fixedHeader
      arrows maxHeight="400px" v-model="data" />
    <form novalidate style="
    margin-left: auto;
    margin-right: auto;
    justify-content: space-around;" class="md-layout" @submit.prevent="validateUser">
      <md-card class="md-layout-item md-size-50 md-small-size-100">
        <md-card-header>
          <div class="md-title">Products</div>
        </md-card-header>

        <md-card-content>
          <div class="md-layout md-gutter">
              <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('gender')">
                <label for="gender">Category</label>
                <md-select name="gender" id="gender" v-model="form.gender" md-dense :disabled="sending">
                  <md-option></md-option>
                  <md-option value="M">Motocycle</md-option>
                  <md-option value="F">Spareparts</md-option>
                </md-select>
                <span class="md-error">Product type is required</span>
              </md-field>
            </div>

            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('firstName')">
                <label for="first-name">Name</label>
                <md-input name="first-name" id="first-name" autocomplete="given-name" v-model="form.firstName" :disabled="sending" />
                <span class="md-error" v-if="!$v.form.firstName.required">The first name is required</span>
                <span class="md-error" v-else-if="!$v.form.firstName.minlength">Invalid name</span>
              </md-field>
            </div>

       
          </div>

          <div class="md-layout md-gutter">
          
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('lastName')">
                <label for="last-name">Description</label>
                <md-input name="last-name" id="last-name" autocomplete="family-name" v-model="form.lastName" :disabled="sending" />
                <span class="md-error" v-if="!$v.form.lastName.required">The last name is required</span>
                <span class="md-error" v-else-if="!$v.form.lastName.minlength">Invalid last name</span>
              </md-field>
            </div>
            <div class="md-layout-item md-small-size-100">
              <md-field :class="getValidationClass('age')">
                <label for="age">Price</label>
                <md-input type="number" id="age" name="age" autocomplete="age" v-model="form.age" :disabled="sending" />
                <span class="md-error" v-if="!$v.form.age.required">The Price is required</span>
                <span class="md-error" v-else-if="!$v.form.age.maxlength">Invalid Price</span>
              </md-field>
            </div>
          </div>

          <md-field :class="getValidationClass('email')">
            <label for="email">Email</label>
            
            <UploadImages  @changed="handleImages"/>
            
            <span class="md-error" v-if="!$v.form.email.required">An Image is required</span>
            <span class="md-error" v-else-if="!$v.form.email.email">Invalid email</span>
          </md-field>
        </md-card-content>

        <md-progress-bar md-mode="indeterminate" v-if="sending" />

        <md-card-actions>
          <md-button type="submit" class="md-primary" :disabled="sending">Create user</md-button>
        </md-card-actions>
      </md-card>

      <md-snackbar :md-active.sync="userSaved">The Product {{ lastUser }} was saved with success!</md-snackbar>
     
    </form>
    
    </mdb-card-body>
  </mdb-card>
  </div>
</template>

<script>
  import {  mdbCard, mdbCardBody,mdbDatatable2  } from 'mdbvue';
  
 import UploadImages from "vue-upload-drop-images"
  import { validationMixin } from 'vuelidate';
  import {
    required,
    email,
    minLength,
    maxLength
  } from 'vuelidate/lib/validators'

const axios = require('axios');
  export default {
      components: {
        UploadImages,
        mdbCard,
        mdbCardBody,
        mdbDatatable2 
      },
    name: 'Products',
    mixins: [validationMixin],
    data: () => ({
      top: 70,
        collapsed: true,
       data: {
          
          columns: [
            {
              label: 'Name',
              field: 'name',
              sort: true
            },
            {
              label: 'Position',
              field: 'position',
              sort: true
            },
            {
              label: 'Office',
              field: 'office',
              sort: true
            },
            {
              label: 'Age',
              field: 'age',
              sort: true
            },
            {
              label: 'Start date',
              field: 'date',
              sort: true
            },
            {
              label: 'Salary',
              field: 'salary',
              sort: false,
              format: value => '£' + value
            }
          ],
          rows: [
            {
              name: 'Tiger Nixon',
              position: 'System Architect',
              office: 'Edinburgh',
              age: '61',
              date: '2011/04/25',
              salary: '320'
            },
            {
              name: 'Garrett Winters',
              position: 'Accountant',
              office: 'Tokyo',
              age: '63',
              date: '2011/07/25',
              salary: '170'
            },
            {
              name: 'Ashton Cox',
              position: 'Junior Technical Author',
              office: 'San Francisco',
              age: '66',
              date: '2009/01/12',
              salary: '86'
            },
            {
              name: 'Cedric Kelly',
              position: 'Senior Javascript Developer',
              office: 'Edinburgh',
              age: '22',
              date: '2012/03/29',
              salary: '433'
            },
            {
              name: 'Airi Satou',
              position: 'Accountant',
              office: 'Tokyo',
              age: '33',
              date: '2008/11/28',
              salary: '162'
            },
            {
              name: 'Brielle Williamson',
              position: 'Integration Specialist',
              office: 'New York',
              age: '61',
              date: '2012/12/02',
              salary: '372'
            },
            {
              name: 'Herrod Chandler',
              position: 'Sales Assistant',
              office: 'San Francisco',
              age: '59',
              date: '2012/08/06',
              salary: '137'
            },
            {
              name: 'Rhona Davidson',
              position: 'Integration Specialist',
              office: 'Tokyo',
              age: '55',
              date: '2010/10/14',
              salary: '327'
            },
            {
              name: 'Colleen Hurst',
              position: 'Javascript Developer',
              office: 'San Francisco',
              age: '39',
              date: '2009/09/15',
              salary: '205'
            },
            {
              name: 'Sonya Frost',
              position: 'Software Engineer',
              office: 'Edinburgh',
              age: '23',
              date: '2008/12/13',
              salary: '103'
            },
            {
              name: 'Jena Gaines',
              position: 'Office Manager',
              office: 'London',
              age: '30',
              date: '2008/12/19',
              salary: '90'
            },
            {
              name: 'Quinn Flynn',
              position: 'Support Lead',
              office: 'Edinburgh',
              age: '22',
              date: '2013/03/03',
              salary: '342'
            },
            {
              name: 'Charde Marshall',
              position: 'Regional Director',
              office: 'San Francisco',
              age: '36',
              date: '2008/10/16',
              salary: '470'
            },
            {
              name: 'Haley Kennedy',
              position: 'Senior Marketing Designer',
              office: 'London',
              age: '43',
              date: '2012/12/18',
              salary: '313'
            },
            {
              name: 'Tatyana Fitzpatrick',
              position: 'Regional Director',
              office: 'London',
              age: '19',
              date: '2010/03/17',
              salary: '385'
            },
            {
              name: 'Michael Silva',
              position: 'Marketing Designer',
              office: 'London',
              age: '66',
              date: '2012/11/27',
              salary: '198'
            },
            {
              name: 'Paul Byrd',
              position: 'Chief Financial Officer (CFO)',
              office: 'New York',
              age: '64',
              date: '2010/06/09',
              salary: '725'
            },
            {
              name: 'Gloria Little',
              position: 'Systems Administrator',
              office: 'New York',
              age: '59',
              date: '2009/04/10',
              salary: '237'
            },
            {
              name: 'Bradley Greer',
              position: 'Software Engineer',
              office: 'London',
              age: '41',
              date: '2012/10/13',
              salary: '132'
            },
            {
              name: 'Dai Rios',
              position: 'Personnel Lead',
              office: 'Edinburgh',
              age: '35',
              date: '2012/09/26',
              salary: '217'
            },
            {
              name: 'Jenette Caldwell',
              position: 'Development Lead',
              office: 'New York',
              age: '30',
              date: '2011/09/03',
              salary: '345'
            },
            {
              name: 'Yuri Berry',
              position: 'Chief Marketing Officer (CMO)',
              office: 'New York',
              age: '40',
              date: '2009/06/25',
              salary: '675'
            },
            {
              name: 'Caesar Vance',
              position: 'Pre-Sales Support',
              office: 'New York',
              age: '21',
              date: '2011/12/12',
              salary: '106'
            },
            {
              name: 'Doris Wilder',
              position: 'Sales Assistant',
              office: 'Sidney',
              age: '23',
              date: '2010/09/20',
              salary: '85'
            },
            {
              name: 'Angelica Ramos',
              position: 'Chief Executive Officer (CEO)',
              office: 'London',
              age: '47',
              date: '2009/10/09',
              salary: '1'
            },
            {
              name: 'Gavin Joyce',
              position: 'Developer',
              office: 'Edinburgh',
              age: '42',
              date: '2010/12/22',
              salary: '92'
            },
            {
              name: 'Jennifer Chang',
              position: 'Regional Director',
              office: 'Singapore',
              age: '28',
              date: '2010/11/14',
              salary: '357'
            },
            {
              name: 'Brenden Wagner',
              position: 'Software Engineer',
              office: 'San Francisco',
              age: '28',
              date: '2011/06/07',
              salary: '206'
            },
            {
              name: 'Fiona Green',
              position: 'Chief Operating Officer (COO)',
              office: 'San Francisco',
              age: '48',
              date: '2010/03/11',
              salary: '850'
            },
            {
              name: 'Shou Itou',
              position: 'Regional Marketing',
              office: 'Tokyo',
              age: '20',
              date: '2011/08/14',
              salary: '163'
            },
            {
              name: 'Michelle House',
              position: 'Integration Specialist',
              office: 'Sidney',
              age: '37',
              date: '2011/06/02',
              salary: '95'
            },
            {
              name: 'Suki Burks',
              position: 'Developer',
              office: 'London',
              age: '53',
              date: '2009/10/22',
              salary: '114'
            },
            {
              name: 'Prescott Bartlett',
              position: 'Technical Author',
              office: 'London',
              age: '27',
              date: '2011/05/07',
              salary: '145'
            },
            {
              name: 'Gavin Cortez',
              position: 'Team Leader',
              office: 'San Francisco',
              age: '22',
              date: '2008/10/26',
              salary: '235'
            },
            {
              name: 'Martena Mccray',
              position: 'Post-Sales support',
              office: 'Edinburgh',
              age: '46',
              date: '2011/03/09',
              salary: '324'
            },
            {
              name: 'Unity Butler',
              position: 'Marketing Designer',
              office: 'San Francisco',
              age: '47',
              date: '2009/12/09',
              salary: '85'
            },
            {
              name: 'Howard Hatfield',
              position: 'Office Manager',
              office: 'San Francisco',
              age: '51',
              date: '2008/12/16',
              salary: '164'
            },
            {
              name: 'Hope Fuentes',
              position: 'Secretary',
              office: 'San Francisco',
              age: '41',
              date: '2010/02/12',
              salary: '109'
            },
            {
              name: 'Vivian Harrell',
              position: 'Financial Controller',
              office: 'San Francisco',
              age: '62',
              date: '2009/02/14',
              salary: '452'
            },
            {
              name: 'Timothy Mooney',
              position: 'Office Manager',
              office: 'London',
              age: '37',
              date: '2008/12/11',
              salary: '136'
            },
            {
              name: 'Jackson Bradshaw',
              position: 'Director',
              office: 'New York',
              age: '65',
              date: '2008/09/26',
              salary: '645'
            },
            {
              name: 'Olivia Liang',
              position: 'Support Engineer',
              office: 'Singapore',
              age: '64',
              date: '2011/02/03',
              salary: '234'
            },
            {
              name: 'Bruno Nash',
              position: 'Software Engineer',
              office: 'London',
              age: '38',
              date: '2011/05/03',
              salary: '163'
            },
            {
              name: 'Sakura Yamamoto',
              position: 'Support Engineer',
              office: 'Tokyo',
              age: '37',
              date: '2009/08/19',
              salary: '139'
            },
            {
              name: 'Thor Walton',
              position: 'Developer',
              office: 'New York',
              age: '61',
              date: '2013/08/11',
              salary: '98'
            },
            {
              name: 'Finn Camacho',
              position: 'Support Engineer',
              office: 'San Francisco',
              age: '47',
              date: '2009/07/07',
              salary: '87'
            },
            {
              name: 'Serge Baldwin',
              position: 'Data Coordinator',
              office: 'Singapore',
              age: '64',
              date: '2012/04/09',
              salary: '138'
            },
            {
              name: 'Zenaida Frank',
              position: 'Software Engineer',
              office: 'New York',
              age: '63',
              date: '2010/01/04',
              salary: '125'
            },
            {
              name: 'Zorita Serrano',
              position: 'Software Engineer',
              office: 'San Francisco',
              age: '56',
              date: '2012/06/01',
              salary: '115'
            },
            {
              name: 'Jennifer Acosta',
              position: 'Junior Javascript Developer',
              office: 'Edinburgh',
              age: '43',
              date: '2013/02/01',
              salary: '75'
            },
            {
              name: 'Cara Stevens',
              position: 'Sales Assistant',
              office: 'New York',
              age: '46',
              date: '2011/12/06',
              salary: '145'
            },
            {
              name: 'Hermione Butler',
              position: 'Regional Director',
              office: 'London',
              age: '47',
              date: '2011/03/21',
              salary: '356'
            },
            {
              name: 'Lael Greer',
              position: 'Systems Administrator',
              office: 'London',
              age: '21',
              date: '2009/02/27',
              salary: '103'
            },
            {
              name: 'Jonas Alexander',
              position: 'Developer',
              office: 'San Francisco',
              age: '30',
              date: '2010/07/14',
              salary: '86'
            },
            {
              name: 'Shad Decker',
              position: 'Regional Director',
              office: 'Edinburgh',
              age: '51',
              date: '2008/11/13',
              salary: '183'
            },
            {
              name: 'Michael Bruce',
              position: 'Javascript Developer',
              office: 'Singapore',
              age: '29',
              date: '2011/06/27',
              salary: '183'
            },
            {
              name: 'Donna Snider',
              position: 'Customer Support',
              office: 'New York',
              age: '27',
              date: '2011/01/25',
              salary: '112'
            }
          ]
        },
      form: {
        firstName: null,
        lastName: null,
        gender: null,
        age: null,
        email: null,
        file:null
      },
      userSaved: false,
      sending: false,
      lastUser: null
    }),
    validations: {
      form: {
        firstName: {
          required,
          minLength: minLength(3)
        },
        lastName: {
          required,
          minLength: minLength(3)
        },
        age: {
          required,
          maxLength: maxLength(10)
        },
        gender: {
          required
        },
        email: {
          // required,
          email
        }
      }
    },
    methods: {
      
   toggleCollapsed() {
      this.collapsed = !this.collapsed;
      // alert( this.collapsed );
    },
         handleImages(files){
          //  alert("foo"+files[0].name);
                console.log(files)
                this.files=files;

                /*
                  [
                    {
                        "name": "Screenshot from 2021-02-23 12-36-33.png",
                        "size": 319775,
                        "type": "image/png",
                        "lastModified": 1614080193596
                        ...
                    },
                    ...
                    ]
                 */
            },
      getValidationClass (fieldName) {
        const field = this.$v.form[fieldName]

        if (field) {
          return {
            'md-invalid': field.$invalid && field.$dirty
          }
        }
      },
      clearForm () {
        this.$v.$reset()
        this.form.firstName = null
        this.form.lastName = null
        this.form.age = null
        this.form.gender = null
        this.form.email = null
      },
      saveUser () {
        this.sending = true
        var murl=this.$store.state.mUrl;
        var form_data = new FormData();

      // form_data.append("file[]", this.files);
      for( var i = 0; i < this.files.length; i++ ){
      let file = this.files[i];
      console.log(file);
      form_data.append('files[' + i + ']', file);
    }
      form_data.append('nm',this.form.firstName);
      form_data.append('desc',this.form.lastName);
      form_data.append('type',this.form.gender);
      form_data.append('am',this.form.age);

      console.log("f1: "+form_data.get("file[]"));
      console.log("form_data: "+JSON.stringify(this.files));
       for (var pair of form_data.entries()){
        console.log(pair[0]+', '+pair[1]);
      }
axios({
          method: 'POST',
          // url: 'http://localhost/nw/vap/regApi.php?apicall=signup'
          url: murl+'api.php?apicall=a_up',
          data: form_data,
          config: { headers: {'Content-Type': 'multipart/form-data' }}
      })
      .then((response) => {
        console.log("response: "+response);
        console.log("response1: "+ JSON.stringify(response.data));
       

      })
      .catch(function (response) {
          //handle error
          console.log("error"+response)
      });
        // Instead of this timeout, here you can call your API
        window.setTimeout(() => {
          this.lastUser = `${this.form.firstName} ${this.form.lastName}`
          this.userSaved = true
          this.sending = false
          // this.clearForm()
        }, 1500)
      },
      validateUser () {
        this.$v.$touch()

        if (!this.$v.$invalid) {
          this.saveUser()
        }
      }
    }
  }
</script>

<style lang="scss" scoped>
  .md-progress-bar {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
  }
   .card {
        max-width: 400px;
        width:80%;
        margin-left:auto;
      
      margin-right:auto;
    }
    $c1: rgb(167, 202, 164);
    $c2:  #001529;
    $c3:   rgba(0, 0, 0, 0.87) ;
    $c4:  rgba(0, 0, 0, 0.87);
    .mTop{
        /* margin-top: 73px; */
        // background: linear-gradient(337deg,$c1 15%,  $c4 4%);
        background: linear-gradient($c2,$c3);
        margin-top: -23%;
        padding-top: 30%;
    }
        ul.ant-menu-inline-collapsed {
    width: 8px;

    }
        
    li.ant-menu-item{
        padding: 1px;
    }
</style>