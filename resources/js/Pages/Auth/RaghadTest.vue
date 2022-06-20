<template>
<label >hello</label>

<jet-authentication-card>
    <div class="card-body">
        <div class="mb-3">
            <page-title>تسجيل الدخول</page-title>
        </div>

    </div>
    

  
</jet-authentication-card>
    
</template>



<script>
import { defineComponent } from "vue";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import PageTitle from "../../Shared/PageTitle.vue";


export default defineComponent({
    components: {
    Head,
    JetAuthenticationCard,
    PageTitle,
    }
});

</script>
<style>

</style>