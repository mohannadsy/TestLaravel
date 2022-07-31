<template>
  <base-dialog
    v-if="inputIsInvalid"
    title="Invalid Input"
    @close="confirmError"
  >
    <template #default>
      <p>Unfortunately, at least one input value is Invalid</p>
      <p>Please.. Check all inputs</p>
    </template>
    <template #actions>
      <base-button @click="confirmError">Okay</base-button>
    </template>
  </base-dialog>
  <div class="row">
   <form @submit.prevent="storeBranch">
    <div class="col border-right">

      <main-infromation
        @save-main="saveMain"
        :branchInformaion="branchInformaion"
        :form="form"
        :errors="errors"
      >
        ></main-infromation
      >

      <!-- <h1 v-for="message in messages" :key="message.id">{{ message }}</h1> -->
      <div class="row a mt-2">
        <div class="col-5">
          <title-button @click="activeTab = 'BasicInformation'"
            >معلومات أساسية</title-button
          >
        </div>
      </div>
      <basic-information
        :branchInformaion="branchInformaion"
        :form="form"
        @save-basic="saveBasic"
        v-if="activeTab === 'BasicInformation'"
      />
    </div>

    <div class="row justify-content-end mb-2">
      <div class="col-md-4">
        <element-button :type="submit" @click="storeBranch">حفظ</element-button>
        <element-button :type="button" @click="newBranch">جديد</element-button>
        <element-button :type="button" @click="updateBranch"
          >تعديل</element-button
        >
        <element-button :type="button" @click="deleteBranch"
          >حذف</element-button
        >
      </div>

    </div>
   </form>
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
import BaseDialog from "../../Shared/BaseDialog.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
export default {
//   setup() {
//     const form = useForm({
//       code:'',
//       name: '',
//       branch_id: '',
//       is_active: '',
//       responsibility: '',
//       address: '',
//       website:'',
//       email: '',
//       phone:'',
//       mobile: '',
//       //_token: this.$page.props.csrf_token,
//     });
//     return { form };
//   },
//   props: ["branchInformaion", "nodeId"],
  props: {
    branchInformaion: Object,
    nodeId: String,
     errors: Object,
  },
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
    BaseDialog,
  },
  data() {
    return {
      activeTab: "BasicInformation",
     form : useForm({
      code:null,
      name: null,
      branch_id: null,
      is_active: true,
      responsibility: null,
      address: null,
      website:null,
      email: null,
      phone:null,
      mobile: null,
      })
    //   _token: this.$page.props.csrf_token,

////////////////////////////////////
        // postData: reactive({
        //   code: "",
        //   name: "",
        //   branch_id: "",
        //   is_active: true,
        //   responsibility: "",
        //   address: "",
        //   website: "",
        //   email: "",
        //   phone: "",
        //   mobile: "",
        //   _token: this.$page.props.csrf_token,
        // }),
    };
  },
  methods: {
    saveMain(data) {
      (this.form.code = data.code),
        (this.form.name = data.name),
        (this.form.branch_id = data.branch_id);
      this.form.is_active = data.is_active;
    },
    saveBasic(data) {
      (this.form.responsibility = data.responsibility),
        (this.form.address = data.address),
        (this.form.website = data.website),
        (this.form.email = data.email),
        (this.form.phone = data.phone),
        (this.form.mobile = data.mobile);
    },
    saveExtra(data) {},
    storeBranch() {
      //console.log(this.postData.errors)
      //this.$store.dispatch("branches/registerBranch", this.postData);
      //console.log(this.errors)
      Inertia.post(route("branch.store"), this.form);
  console.log(this.form)
    //   axios.post(route("branch.store", this.postData)).then(response => alert('Wahoo!'))
      //console.log(this.postData)
    },
    newBranch() {
      this.form = {};
      console.log('new')
      this.form.is_active = true;
    },
    updateBranch() {
      Inertia.post(route("branch.update", this.nodeId), this.form);
    },
    deleteBranch() {
      Inertia.get(route("branch.delete", this.nodeId), this.form);
    },
    confirmError() {},
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
