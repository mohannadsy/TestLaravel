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
    <div class="col border-right">
      <main-infromation
        @save-main="saveMain"
        :branchInformaion="branchInformaion"
        :postData="postData"
       :errors="errors">

      ></main-infromation>
      <h1 v-for="message in messages" :key="message.id">{{error}}</h1>
      <div class="row a mt-2">
        <div class="col-5">
          <title-button @click="activeTab = 'BasicInformation'"
            >معلومات أساسية</title-button
          >
        </div>
      </div>
      <basic-information
        :branchInformaion="branchInformaion"
        :postData="postData"
        @save-basic="saveBasic"
        v-if="activeTab === 'BasicInformation'"
      />
    </div>

    <div class="row justify-content-end mb-2">
      <div class="col-md-4">
        <element-button @click="submit">حفظ</element-button>
        <element-button :type="button" @click="newBranch">جديد</element-button>
        <element-button :type="button" @click="updateBranch"
          >تعديل</element-button
        >
        <element-button :type="button" @click="deleteBranch"
          >حذف</element-button
        >
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
import BaseDialog from "../../Shared/BaseDialog.vue";
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
export default {
  //props: ["branchInformaion", "nodeId"],
  props: {
    branchInformaion:Object,
    nodeId:String,
    messages: Array,
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
      postData: reactive({
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
      }),
    };
  },
  methods: {
    saveMain(data) {
      (this.postData.code = data.code),
        (this.postData.name = data.name),
        (this.postData.branch_id = data.branch_id);
      this.postData.is_active = data.is_active;
    },
    saveBasic(data) {
      (this.postData.responsibility = data.responsibility),
        (this.postData.address = data.address),
        (this.postData.website = data.website),
        (this.postData.email = data.email),
        (this.postData.phone = data.phone),
        (this.postData.mobile = data.mobile);
    },
    saveExtra(data) {},
    submit() {
        console.log(typeof(this.messages))
      //this.$store.dispatch("branches/registerBranch", this.postData);
       Inertia.post(route("branch.store"), this.postData);
    },
    newBranch() {
      this.postData = {};
      this.postData.is_active = true;
    },
    updateBranch() {
      Inertia.post(route("branch.update", this.nodeId), this.postData);
    },
    deleteBranch() {
      Inertia.get(route("branch.delete", this.nodeId), this.postData);
    },
    confirmError(){

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
