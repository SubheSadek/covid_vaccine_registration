import { reactive, ref } from "vue";
import { info, callApi } from "../../../Helpers/apiService.js";
export const form = reactive({
    nid: null,
});
export const isLoading = ref(false);
export const regStatus = ref("");

export const searchRegistration = async () => {
    regStatus.value = null;
    if (!form.nid) {
        info("Please enter your nid");
        return;
    }

    const res = await callApi("POST", "/show-registration", form);
    if (res.data.success) {
        regStatus.value = res.data.json_data;
    }
};

export const onTextClear = () => {
    regStatus.value = null;
};
