<template>
  <form>
    <div class="row">
      <main-information
        @save-main="saveMain"
        :form="form"
        :errors="errors"
      ></main-information>
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
    <basic-information></basic-information>
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
  props: {
    errors: Object,
  },
  data() {
    return {
      activeTab: "BasicInformation",
      form: useForm({
        code: "",
        name: "",
        latin_name: "",
        type: "",
        store_id: "",
        account_id: "",
        address: "",
        store_keeper: "",
        storage_amount: "",
        website: "",
        notes: "",
        is_active: true,
        photo: "",
        security_degree: "",
        branch_id: "",
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
