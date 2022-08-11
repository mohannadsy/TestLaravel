<template>
    <div class="row px-3 pb-2">
        <page-title><fa icon="warehouse" /> {{$t('warehouseCard')}}</page-title>     
    </div>
    <form>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group row mt-2">
                    <elemet-label class="col-form-label col-md-4">{{$t('warehouseCode')}}</elemet-label>
                    <div class="col-8">
                        <element-input />
                    </div>
                </div>
                 <div class="form-group row mt-2">
                    <elemet-label class="col-form-label col-md-4">{{$t('warehouseName')}}</elemet-label>
                    <div class="col-8">
                        <element-input />
                    </div>
                </div>
                 <div class="form-group row mt-2">
                    <elemet-label class="col-form-label col-md-4">{{$t('latinName')}}</elemet-label>
                    <div class="col-8">
                        <element-input />
                    </div>
                </div>
                
            </div>
            <div class="col-md-4">

                 <div  class="toggle_container">
                    <ToggleButton
                    />
                </div>

                 <div class="form-group row mt-2"> 
                    <elemet-label class="col-form-label col-md-4">{{$t('warehouseType')}}</elemet-label>
                    <div class="col-8">
                        <v-select />
                    </div>
                </div>
                

            </div>
        </div>
    </form>
    

</template>

<script>
import ElemetLabel from '../../Shared/ElemetLabel.vue';
import ElementInput from '../../Shared/ElementInput.vue';
import PageTitle from '../../Shared/PageTitle.vue';
import VSelect from '../../Shared/VSelect.vue';
import ToggleButton from '../../Shared/ToggleButton.vue';

export default {
    components:{
        ElemetLabel,
        ElementInput,
        PageTitle,
        VSelect,
        ToggleButton
    }
    
}
</script>

<style scoped>



</style>