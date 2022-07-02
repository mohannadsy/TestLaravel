<template>
  <div class="row">
    <div class="col border-right">
      <main-infromation @save-main="saveMain"></main-infromation>
      <div class="row a mt-2">
        <div class="col-5">
          <title-button @click="activeTab = 'BasicInformation'"
            >معلومات أساسية</title-button
          >
        </div>
      </div>
      <basic-information  @save-basic="saveBasic" v-if="activeTab === 'BasicInformation'" />
    </div>

    <div class="row justify-content-end mb-2">
      <div class="col-md-4">
        <element-button @click="submit">حفظ</element-button>
        <element-button>جديد</element-button>
        <element-button>تعديل</element-button>
        <element-button>حذف</element-button>
      </div>
    </div>
  </div>
</template>

<script>
import MainInfromation from "./MainInfromation.vue";
import BasicInformation from "./BasicInformation.vue";
import PageTitle from "../../Shared/PageTitle.vue";
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
import CheckboxSwitch from "../../Shared/CheckboxSwitch.vue";
import ElementButton from "../../Shared/ElementButton.vue";
import TitleButton from "../../Shared/TitleButton.vue";
import MainInfromation1 from "./MainInfromation.vue";
import { reactive } from 'vue'

export default {
  components: {
    BasicInformation,
    PageTitle,
    ElemetLabel,
    ElementInput,
    CheckboxSwitch,
    ElementButton,
    TitleButton,
    MainInfromation,
    MainInfromation1,
  },
  data() {
    return {
      activeTab: "BasicInformation",
       postData:reactive({
        code:'',
        name:'',
        branch_id:'',
        responsibility: '',
        address: '',
        website: '',
        email: '',
        phone: '',
        mobile: '',
        _token: this.$page.props.csrf_token,
       })
    };
  },
  methods: {
    saveMain(data){
        this.postData.code=data.code,
        this.postData.name=data.name,
        this.postData.branch_id=data.branch_id
    },
    saveBasic(data){
        this.postData.responsibility=data.responsibility,
        this.postData.address=data.address,
        this.postData.website=data.website,
         this.postData.email=data.email,
        this.postData.phone=data.phone,
        this.postData.mobile=data.mobile
    },
    saveExtra(data){

    },
    submit(){
        // Inertia.post(route('user.store'), this.postData);
        this.$store.dispatch('branches/registerBranch',this.postData);
    }
  },
};
</script>

<style scoped>
button {
  margin: 2px;
}
div.a {
  -webkit-text-decoration-line: overline;
  text-decoration-line: overline;
  border-top: 3px solid black;
}
</style>
