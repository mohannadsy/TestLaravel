<!-- <template>
    <home></home>
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div
                        class="d-flex justify-content-between align-items-center mb-3"
                    >
                        <h2 class="text-right">بطاقة مستخدم</h2>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">رمز المستخدم</label
                            ><input type="text" class="form-control" value="" />
                        </div>
                        <div class="col-md-6">
                            <label class="labels">اسم المستخدم</label
                            ><input type="text" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label class="labels">الفرع </label
                            ><input type="text" class="form-control" value="" />
                        </div>
                        <div class="col-md-12">
                            <label class="labels">البريد الالكتروني</label
                            ><input type="text" class="form-control" value="" />
                        </div>
                        <div class="col-md-12">
                            <label class="labels">كلمة المرور</label
                            ><input type="text" class="form-control" value="" />
                        </div>
                        <div class="col-md-12">
                            <label class="labels">الصفة</label
                            ><input type="text" class="form-control" value="" />
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">الاسم الأول</label
                                ><input
                                    type="text"
                                    class="form-control"
                                    value=""
                                />
                            </div>
                            <div class="col-md-6">
                                <label class="labels">الاسم الأخير</label
                                ><input
                                    type="text"
                                    class="form-control"
                                    value=""
                                />
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">اسم الأب</label
                                ><input
                                    type="text"
                                    class="form-control"
                                    value=""
                                />
                            </div>
                            <div class="col-md-6">
                                <label class="labels">اسم الأم</label
                                ><input
                                    type="text"
                                    class="form-control"
                                    value=""
                                />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">الرقم الوطني</label
                            ><input type="text" class="form-control" value="" />
                        </div>
                        <div class="col-md-12">
                            <label class="labels">هاتف</label
                            ><input type="text" class="form-control" value="" />
                        </div>
                        <div class="col-md-12">
                            <label class="labels">جوال</label
                            ><input type="text" class="form-control" value="" />
                        </div>
                        <div class="col-md-12">
                            <label class="labels">ملاحظات</label
                            ><textarea
                                type="text"
                                class="form-control"
                                value=""
                            ></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <button class="btn btn-primary">حفظ</button>
                    <button class="btn btn-primary">جديد</button>
                    <button class="btn btn-primary">تعديل</button>
                    <button class="btn btn-primary">حذف</button>
                </div>
            </div>
        </div>
    </div>
</template> -->

<template>
    <home></home>
    <div class="container-fluide rounded bg-white mb-1">
        <div class="row justify-content-end">
            <div class="col-md-9 border-right">
                <div class="row px-3 mt-1 pb-2">
                    <page-title>بطاقة مستخدم</page-title>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group row mt-2">
                            <elemet-label class="col-form-label col-md-3"
                                >رمز المستخدم</elemet-label
                            >
                            <div class="col-8">
                                <element-input
                                    type="text"
                                    class="form-control"
                                    value=""
                                />
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <elemet-label class="col-form-label col-md-3"
                            style="padding-left: 6px"
                                >اسم المستخدم</elemet-label
                            >
                            <div class="col-8">
                                <element-input
                                    type="text"
                                    class="form-control"
                                    value=""
                                />
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <elemet-label
                                class="col-form-label col-md-3"
                                style="padding-left: 6px"
                                >البريد الالكتروني</elemet-label
                            >
                            <div class="col-8">
                                <element-input
                                    type="text"
                                    class="form-control"
                                    value=""
                                />
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <elemet-label class="col-form-label col-md-3"
                                >كلمة المرور</elemet-label
                            >
                            <div class="col-8">
                                <element-input
                                    type="text"
                                    class="form-control"
                                    value=""
                                />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group row mt-2">
                            <elemet-label class="col-form-label col-2"
                                >الفرع
                            </elemet-label>
                            <div class="col-8">
                                <element-input
                                    type="text"
                                    class="form-control"
                                    value=""
                                />
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <elemet-label class="col-form-label col-2"
                                >الصفة</elemet-label
                            >
                            <div class="col-8">
                                <v-select :value="rvalue" :options="role" />
                            </div>
                        </div>
                        <div class="form-group row mt-2">
                            <div class="col-md-2 justify-content-right">
                                <checkbox-switch></checkbox-switch>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 ">
                    <div class="col-5">
                        <title-button @click="activeTab = 'BasicInformation'">معلومات أساسية</title-button>
                        <title-button @click="activeTab = 'Permissions'">صلاحيات</title-button>
                        <title-button @click="activeTab = 'ExtraOptions'">خيارات إضافية</title-button>

                    </div>
                </div>
                <basic-information v-if="activeTab === 'BasicInformation'" />
                <permissions  v-if="activeTab === 'Permissions'" />
                <extra-options  v-if="activeTab === 'ExtraOptions'" />



                
                <div class="row justify-content-end mb-2">
                    <div class="col-md-4 ">
                        <element-button >حفظ</element-button>
                        <element-button >جديد</element-button>
                        <element-button>تعديل</element-button>
                        <element-button >حذف</element-button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import Home from "../Home.vue";
import BasicInformation from "./BasicInformation.vue";
import Permissions from "./Permissions.vue";
import ExtraOptions from './ExtraOptions.vue'
import PageTitle from "../../Shared/PageTitle.vue";
import ElemetLabel from "../../Shared/ElemetLabel.vue";
import ElementInput from "../../Shared/ElementInput.vue";
import VSelect from "../../Shared/VSelect.vue";
import CheckboxSwitch from "../../Shared/CheckboxSwitch.vue";
import ElementButton from "../../Shared/ElementButton.vue";
import TitleButton from '../../Shared/TitleButton.vue'
export default {
    components: {
    Home,
    BasicInformation,
    Permissions,
    ExtraOptions,
    PageTitle,
    ElemetLabel,
    ElementInput,
    VSelect,
    CheckboxSwitch,
    ElementButton,
    TitleButton
},
    data() {
        return {
            activeTab:'Permissions',
            rvalue: "",
            role: ["مدير عام", "محاسب", "كاشير"],
        };
    },
};
</script>
<style scoped>
button{
  margin: 2px;
}
</style>