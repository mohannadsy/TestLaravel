<template>
  <form>
    <div class="row">
      <main-information
        @save-main="saveMain"
        :form="form"
        :storeInformation="storeInformation"
      ></main-information>
    </div>
    <div class="row a mt-2">
      <div class="col-5">
         <title-button v-if="form.type ==  this.$t('aggregativeType')" @click="activeTab = 'CumulativeAcountType'" :type="'button'"
          >{{ $t("CumulativeAcountType") }}
        </title-button>
        <div v-else>
           <title-button  @click="activeTab = 'BasicInformation'" :type="'button'"
          >{{ $t("warehousebBasicInformation") }}
        </title-button>
        <!-- <title-button  @click="activeTab = 'attachments'" :type="'button'"
          >{{ $t("attachments") }}
        </title-button> -->
        </div>
      </div>
    </div>
    <cumulative-acount-type
     v-show="form.type ==  this.$t('aggregativeType')"
     >
    </cumulative-acount-type>
    <basic-information
    v-show="activeTab === 'BasicInformation' & form.type ==  this.$t('normalType')"
      :form="form"
      @save-basic="saveBasic"
      :storeInformation="storeInformation"
    ></basic-information>
    <!-- <attachments v-if="activeTab === 'attachments' & form.type ==  this.$t('normalType')"></attachments> -->
    <div class="row justify-content-end mb-2">
      <div class="col-md-4">
        <element-button :type="'button'" @click="storeStore"
          >{{ $t("userSave") }}
        </element-button>
        <element-button :type="'button'" @click="newStore"
          >{{ $t("UserNew") }}
        </element-button>
        <element-button :type="'button'" @click="updateStore"
          >{{ $t("userUpdate") }}
        </element-button>
        <element-button :type="'button'" @click="deleteStore"
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
import { Inertia } from "@inertiajs/inertia";
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
    storeInformation: Object,
    storeId: Number,
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
    },
    storeStore() {
      this.form.post(route("store.store"));
    },
    updateStore() {
      this.form.post(route("store.update", this.storeId));
    },
    newStore() {
      this.form = useForm({
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
      });
    },
    deleteStore() {
      Inertia.get(route("store.delete", this.storeId), this.form);
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
