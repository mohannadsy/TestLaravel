import { Inertia } from "@inertiajs/inertia";
import axios from "axios";
export default {
    storeStore(context, data) {
        const storeData = {
            code: data.code,
            name: data.name,
            latin_name: data.latin_name,
            type: data.type,
            store_id: data.store_id,
            account_id: data.account_id,
            address: data.address,
            store_keeper: data.store_keeper,
            storage_amount: data.storage_amount,
            website: data.website,
            notes: data.notes,
            is_active: data.is_active,
            photo: data.photo,
            security_degree: data.security_degree
        };
        Inertia.post(route('store.store'), storeData);
        context.commit('newStore', {
            ...storeData
        });
    },
    async showStore({ commit }, id) {
        const response = await axios.get(route("store.show", id)).then(stores => commit('showStore'), stores);
    }
};