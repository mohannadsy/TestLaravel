import { Inertia } from "@inertiajs/inertia";

export default {
    registerBranch(context, data) {
        const branchData = {
            //id: new Date().toISOString,
            code: data.code,
            name: data.name,
            branch_id: data.branch_id,
            responsibility: data.responsibility,
            address: data.address,
            website: data.website,
            email: data.email,
            phone: data.phone,
            mobile: data.mobile
        };
        // const response = await fetch(route('branch.store'), {
        //     method: 'POST',
        //     body: branchData
        // })
        Inertia.post(route('branch.store'), branchData);
        console.log(branchData);
        //branchData.post(route('branch.store'));
        //this.$inertia.post('branch.store', branchData);
        context.commit('registerBranch', {
            ...branchData
        });
    }
};
