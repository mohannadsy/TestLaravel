<template>
    <form @submit.prevent="submitForm">
        <div class="row">
            <div  class="col border-right">


                <!-- <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2 class="text-right">بطاقة فرع</h2>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">رمز الفرع</label><input type="text" class="form-control" v-model.trim="code"></div>
                        <div class="col-md-6"><label class="labels">اسم الفرع</label><input type="text" class="form-control" v-model.trim="name"></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">الفرع الرئيسي</label><input type="text" class="form-control" v-model.trim="branch_id"></div>
                        <div class="col-md-12"><label class="labels">المسؤولية</label><input type="text" class="form-control" v-model.trim="responsibility"></div>
                        <div class="col-md-12"><label class="labels">العنوان</label><input type="text" class="form-control" v-model.trim="address"></div>
                        <div class="col-md-12"><label class="labels">موقع الانترنت</label><input type="text" class="form-control" v-model.trim="website"></div>
                        <div class="col-md-12"><label class="labels">البريد الالكتروني</label><input type="text" class="form-control" v-model.trim="email"></div>
                        <div class="col-md-12"><label class="labels">هاتف</label><input type="text" class="form-control" v-model.trim="phone"></div>
                        <div class="col-md-12"><label class="labels">جوال</label><input type="text" class="form-control" v-model.trim="mobile"></div>
                    </div>
                </div> -->



                <main-infromation></main-infromation>
                <div class="row a mt-2 ">
                    <div class="col-5">
                        <title-button @click="activeTab = 'BasicInformation'">معلومات أساسية</title-button>
                    </div>
                </div>
                <basic-information   v-if="activeTab === 'BasicInformation'" />

            </div>

                <div class="row justify-content-end mb-2">
                    <div class="col-md-4 ">
                        <element-button >حفظ</element-button>
                        <element-button >جديد</element-button>
                        <element-button>تعديل</element-button>
                        <element-button >حذف</element-button>
                    </div>
                </div>
        </div>
    </form>
</template>

<script>
import MainInfromation from "./MainInfromation.vue";
import BasicInformation from "./BasicInformation.vue";
import PageTitle from "../../Shared/PageTitle.vue";
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
import CheckboxSwitch from "../../Shared/CheckboxSwitch.vue";
import ElementButton from "../../Shared/ElementButton.vue";
import TitleButton from '../../Shared/TitleButton.vue';
import MainInfromation1 from "./MainInfromation.vue";


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
    MainInfromation1
},
    emits:['save-data'],
    data() {
        return {
            activeTab:'BasicInformation',

        }
    },
    methods:{
        submitForm(){
            const formData = {
                code: this.code,
                name:this.name,
                branch_id:this.branch_id,
                // responsibility:this.responsibility,
                // address:this.address,
                // website:this.website,
                // email:this.email,
                // phone:this.phone,
                // mobile:this.mobile
            };
            this.$emit('save-data',formData);
            console.log(formData);
        }
    }
}
</script>

<style scoped>
button{
  margin: 2px;
}
div.a {
   -webkit-text-decoration-line: overline;
   text-decoration-line: overline;
   border-top: 3px solid black;
}
</style>
