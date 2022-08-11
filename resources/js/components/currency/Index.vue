<template>
    <form>
        <div class="row">
            <main-information></main-information>
        </div>
        <div class="row a mt-2">
             <div class="col-5 ">
                <title-button @click="activeTab = 'BasicInformation'"
                >{{$t('warehousebBasicInformation')}} </title-button>
                <title-button @click="activeTab = 'attachments'"
                >{{$t('attachments')}} </title-button>
            </div>
        </div>
        <basic-information></basic-information>
        <attachments></attachments>

        <div class="row justify-content-end mb-2">
          <div class="col-md-4">
            <element-button >{{ $t("userSave") }}
            </element-button>
            <element-button :type="'button'">{{ $t("UserNew") }}
            </element-button>
            <element-button>{{ $t("userUpdate") }} </element-button>
            <element-button :type="'button'">{{ $t("userDelete") }}
            </element-button>
          </div>
        </div>

    </form>  
</template>



<script>
import MainInformation from './MainInformation.vue'
import BasicInformation from './BasicInformation.vue'
import CumulativeAcountType from './CumulativeAcountType.vue'
import Attachments from './Attachments.vue'
import TitleButton from '../../Shared/TitleButton.vue'
import ElementButton from '../../Shared/ElementButton.vue'
export default {
    components:{
        MainInformation,
        BasicInformation,
        CumulativeAcountType,
        Attachments,
        TitleButton,
        ElementButton,
    },
    data(){
        return{
            activeTab:"BasicInformation",
        };

    },
   

    
}
</script>

<style scoped>
div.a {
  border-top-style: solid;
}
button {
  margin: 2px;
}

</style>