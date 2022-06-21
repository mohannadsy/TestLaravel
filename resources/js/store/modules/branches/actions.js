import { Inertia } from "@inertiajs/inertia";
import axios from "axios";


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
        // axios.post('branch.store', branchData);
        Inertia.post(route('branch.store'), branchData);

        console.log(branchData);
        //branchData.post(route('branch.store'));
        //this.$inertia.post('branch.store', branchData);
        context.commit('registerBranch', {
            ...branchData
        });
    },
    async loadBranches(context) {
        //const response = Inertia.get(route('branch.TreeOfMainBranch'));
        const response = fetch(Inertia.get(route('branch.TreeOfMainBranch')));
        console.log(response);
        const responseData = await response.json;
        console.log(responseData);
        if (!response.ok) {
            ///
        }
        const branches = [];
        for (const key in responseData) {
            const branch = {
                id: key,
                code: responseData[key].code,
                name: responseData[key].name,
                branch_id: responseData[key].branch_id,
                responsibility: responseData[key].responsibility,
                address: responseData[key].address,
                website: responseData[key].website,
                email: responseData[key].email,
                phone: responseData[key].phone,
                mobile: responseData[key].mobile,
                //branches: responseData[key].branches
            };
            console.log(branch);
            branches.push(branch);
        }
        context.commit('setBranches', branches);
        console.log('hi');
        console.log(branches);
        console.log('hiiiii');
    }
};