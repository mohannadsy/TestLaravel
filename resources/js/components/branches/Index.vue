<template>
  <!-- <base-dialog
    v-if="$page.props.flash.message"
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
  </base-dialog> -->
  <saved-modal
    v-show="$page.props.flash.message"
    :title="$page.props.flash.message"
    @close="$page.props.flash.message=null"
  ></saved-modal>
  <locale-switcher />
  <!-- <div  v-if="$page.props.flash.message">
    {{$page.props.flash.message}}
  </div> -->
  <div class="row">
    <form>
      <div class="col border-right">
        <main-infromation
          @save-main="saveMain"
          :branchInformaion="branchInformaion"
          :form="form"
          :errors="errors"
          :branches="branches"
        >
          ></main-infromation
        >
        <div class="row a mt-2">
          <div class="col-5">
            <title-button @click="activeTab = 'BasicInformation'"
              >{{ $t("basicInformation") }}
            </title-button>
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
          <element-button
            :type="'button'"
            :disabled="form.processing"
            @click="storeBranch"
            >{{ $t("branchSave") }}</element-button
          >
          <element-button :type="'button'" @click="newBranch">{{
            $t("branchNew")
          }}</element-button>
          <element-button :type="'button'" @click="updateBranch">{{
            $t("branchUpdate")
          }}</element-button>
          <element-button :type="'button'" @click="deleteBranch">{{
            $t("branchDelete")
          }}</element-button>
        </div>
      </div>
    </form>
  </div>
</template>

<script>
import localeSwitcher from "./localeSwitcher.vue";
import MainInfromation from "./MainInfromation.vue";
import BasicInformation from "./BasicInformation.vue";
import PageTitle from "../../Shared/PageTitle.vue";
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
import CheckboxSwitch from "../../Shared/CheckboxSwitch.vue";
import ElementButton from "../../Shared/ElementButton.vue";
import TitleButton from "../../Shared/TitleButton.vue";
import MainInfromation1 from "./MainInfromation.vue";
import SavedModal from "../../Shared/SavedModal.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import axios from "axios";
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
export default {
  props: {
    branchInformaion: Object,
    branches: Array,
    branchId: String,
    errors: Object,
  },
  components: {
    localeSwitcher,
    BasicInformation,
    PageTitle,
    ElemetLabel,
    ElementInput,
    CheckboxSwitch,
    ElementButton,
    TitleButton,
    MainInfromation,
    MainInfromation1,
    SavedModal,
  },

  data() {
    return {
      activeTab: "BasicInformation",
      form: useForm({
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
      (this.form.code = data.code),
        (this.form.name = data.name),
        (this.form.branch_id = data.branch_id);
      this.form.is_active = data.is_active;
      console.log('updated')
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
      this.form.post(route("branch.store"));
    },
    newBranch() {
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
      // this.$emit('newform',form);
    },
    updateBranch() {
      this.form.post(route("branch.update", this.branchId));
    },
    deleteBranch() {
      Inertia.get(route("branch.delete", this.branchId), this.form);
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
  border-top-style: solid;
}
</style>
