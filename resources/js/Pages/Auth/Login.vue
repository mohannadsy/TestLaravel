<template>
    <Head title="Log in" />

    <jet-authentication-card>
        <div class="card-body">
            <jet-validation-errors class="mb-3" />

            <div
                v-if="status"
                class="alert alert-success mb-3 rounded-0"
                role="alert"
            >
                {{ status }}
            </div>

            <div class="mb-3">
               <page-title>تسجيل الدخول</page-title> 
            </div>
            
            <div class="mb-5">
                <div>
                    <label class="custom-control-label fs-5">
                        الرجاء إدخال معلومات الحساب
                    </label>
                </div>
            </div>

            <form @submit.prevent="submit">
                <div class="mb-3">
                    <jet-label for="email" value="البريد الالكتروني" />
                    <jet-input
                        id="email"
                        type="email"
                        placeholder="اسم المستخدم أو البريد الالكتروني"
                        v-model="form.email"
                        required
                        autofocus
                    />
                </div>
                <!-- <div class="mb-3">
                    
                    <element-form-input
                        label="اسم المستخدم أو البريد الاكتروني"
                        id="num"
                        type="number"
                        placeholder=""
                        v-model="form.number"
                        required
                        autofocus
                    />
                </div> -->

                <div class="mb-3">
                    <jet-label for="password" value="كلمة المرور" />
                    <jet-input
                        id="password"
                        type="password"
                        v-model="form.password"
                        required
                        autocomplete="current-password"
                    />
                </div>
        

                <div class="mb-3">
                    <div class="custom-control custom-checkbox">
                        <jet-checkbox
                            id="remember_me"
                            name="remember"
                            v-model:checked="form.remember"
                        />

                        <label class="custom-control-label" for="remember_me">
                            تذكر كلمة المرور
                        </label>
                    </div>
                </div>
                <!-- <div class="mb-3">
                    <select :options="lang"></select>

                </div> -->
                <!-- <div class="mb-3">
                    <div class="custom-control custom-checkbox">
                        <checkbox id="remember_me"
                                    name="remember"
                                    v-model:checked="form.remember"
                        />
                        <label for="remember_me" class="custom-control-label" >
                            تذكر كلمة المرور
                        </label>
                    </div>
                </div> -->

                <!-- <div class="mb-3">
                    <checkbox-switched-label id="remember_me"
                                    name="remember"
                                    v-model:checked="form.remember"
                                    label="تذكر كلمة المرور"

                    />
                </div> -->

                <div class="mb-3">
                    <div
                        class="d-flex justify-content-end align-items-baseline"
                    >
                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="text-muted me-3"
                        >
                            Forgot your password?
                        </Link>

                        <jet-button
                            class="ms-4 btn-lg"
                            :class="{ 'text-white-50': form.processing }"
                            :disabled="form.processing"
                        >
                            <div
                                v-show="form.processing"
                                class="spinner-border spinner-border-sm"
                                role="status"
                            >
                                <span class="visually-hidden">Loading...</span>
                            </div>

                            تسجيل الدخول
                        </jet-button>
                    </div>
                </div>
                <div class="mb-0">
                    <div
                        class="d-flex justify-content-center align-items-baseline"
                    >
                        <label class="custom-control-label">
                            يمكنك تجربة البرنامج مجانا من خلال الضغط على <button class="bold">التجربة الآن</button>
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </jet-authentication-card>
</template>

<script>
import { defineComponent } from "vue";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import ElementFormInput from "../../Shared/ElementFormInput.vue"
import PageTitle from "../../Shared/PageTitle.vue";
import CheckBox from "../../Shared/CheckBox.vue";
import CheckboxLabeled from "../../Shared/CheckboxLabeled.vue"
import CheckboxSwitch from "../../Shared/CheckboxSwitch.vue"
import CheckboxSwitchedLabel from "../../Shared/CheckboxSwitchedLabel.vue";
import Select from "../../Shared/Select.vue"
import Select1 from "../../Shared/Select.vue"


export default defineComponent({
    components: {
    Head,
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
    Link,
    ElementFormInput,
    PageTitle,
    CheckBox,
    CheckboxLabeled,
    CheckboxSwitch,
    CheckboxSwitchedLabel,
    Select,
    Select1
},

    props: {
        canResetPassword: Boolean,
        status: String,
    },

    data() {
        return {
            form: this.$inertia.form({
                email: "",
                password: "",
                number:"",
                remember: false,
            }),
            lang :["bos","nsn","sls"]
        };
    },

    methods: {
        submit() {
            this.form
                .transform((data) => ({
                    ...data,
                    remember: this.form.remember ? "on" : "",
                }))
                .post(this.route("login"), {
                    onFinish: () => this.form.reset("password"),
                });
        },
    },
});
</script>
<style>
* {
    direction: rtl;
    margin: 0;
    font-size: 1em;
}

.bold{
    font-weight: bold;
}
</style>
