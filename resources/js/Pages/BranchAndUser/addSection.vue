<template>
    <div>
    <page-title class="py-2"><span><fa class="users px-2"  icon="users" /></span> {{$t('branchesAndUsers')}}</page-title>
    <div class="row a py-2">
      <div class="col-4" style="padding-left:0">
       <element-button class="building px-2"
        @click="newBranch"
       ><span ><fa class="fa" icon="building" /></span></element-button>
       <element-button class="building px-2"><span><fa class="fa" icon="user-plus" /></span></element-button>
       <element-button class="building px-2"><span><fa class="fa"  icon="magnifying-glass"/></span></element-button>
      </div>
     
       <div class="col-7" style="padding-right:3;">
        <element-input ></element-input>
       </div>
       
    </div>
        
    </div>
   
</template>


<script>
import PageTitle from "../../Shared/PageTitle.vue";
import ElementButton from "../../Shared/ElementButton.vue";
import ElementInput from "../../Shared/ElementInput.vue";
export default {
    components:{
    PageTitle,
    ElementButton,
    ElementInput
    },
    props:{},
    methods:{
        newBranch(){
        this.form = useForm({
        code: "",
        name: "",
        branch_id: "",
        is_active: true,
        responsibility: "",
        address: "",
        website: "",
        email: "",
        phone: "",
        mobile: "",
        _token: this.$page.props.csrf_token,
      });
        },
    },
    
}
</script>


<style scoped>
.fa{
  font-size: 25px;
}
.users{
  font-size: 25px;
  margin-top: 5px;
}
.building{
  border:none;
  background-color: #f3f4f6;
}
.a{
  /* -webkit-text-decoration-line: overline;
  text-decoration-line: overline; */
  /* border-bottom: 3px solid black; */
    border-bottom-style: solid;
  --bs-gutter-x: 0;
   margin-left: 0;
}


</style>