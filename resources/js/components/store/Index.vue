<template>
  <form>
    <div class="row">
      <main-information @save-main="saveMain" :form="form"></main-information>
    </div>
    <div class="row a mt-2">
      <div class="col-5">
        <title-button @click="activeTab = 'BasicInformation'"
          >{{ $t("warehousebBasicInformation") }}
        </title-button>
        <title-button @click="activeTab = 'attachments'"
          >{{ $t("attachments") }}
        </title-button>
      </div>
    </div>
    <basic-information :form="form" @save-basic="saveBasic"></basic-information>
    <attachments></attachments>

    <div class="row justify-content-end mb-2">
      <div class="col-md-4">
        <element-button :type="'button'" @click="storeStore"
          >{{ $t("userSave") }}
        </element-button>
        <element-button :type="'button'">{{ $t("UserNew") }} </element-button>
        <element-button>{{ $t("userUpdate") }} </element-button>
        <element-button :type="'button'"
          >{{ $t("userDelete") }}
        </element-button>
      </div>
    </div>
  </form>
</template>



<script>
import MainInformation from "./MainInformation.vue";
import BasicInformation from "./BasicInformation.vue";
import CumulativeAcountType from "./CumulativeAcountType.vue";
import Attachments from "./Attachments.vue";
import TitleButton from "../../Shared/TitleButton.vue";
import ElementButton from "../../Shared/ElementButton.vue";
import { useForm } from "@inertiajs/inertia-vue3";
export default {
  components: {
    MainInformation,
    BasicInformation,
    CumulativeAcountType,
    Attachments,
    TitleButton,
    ElementButton,
  },
  data() {
    return {
      activeTab: "BasicInformation",
      form: useForm({
        code: "",
        name: "",
        latin_name: "",
        type: "",
        branch_id: "",
        is_active: true,
        store_id: "",
        account_id: "",
        address: "",
        website: "",
        store_keeper: "",
        storage_amount: "",
        notes: "",
        photo: "",
        security_degree: "",
        _token: this.$page.props.csrf_token,
      }),
    };
  },
  methods: {
    saveMain(data) {
      this.form.code = data.code;
      this.form.name = data.name;
      this.form.latin_name = data.latin_name;
      this.form.type = data.type;
      this.form.is_active = data.is_active;
      this.form.branch_id = data.branch_id;
    },
    saveBasic(data) {
      this.form.store_id = data.store_id;
      this.form.account_id = data.account_id;
      this.form.address = data.address;
      this.form.website = data.website;
      this.form.store_keeper = data.store_keeper;
      this.form.storage_amount = data.storage_amount;
      this.form.notes = data.notes;
      console.log(data)
    },
    storeStore() {
      //   this.$store.dispatch("stores/storeStore", this.form);
      this.form.post(route("store.store"));
    },
  },
};
</script>

<style scoped>
div.a {
  border-top-style: solid;
}
button {
  margin: 2px;
}
</style>
