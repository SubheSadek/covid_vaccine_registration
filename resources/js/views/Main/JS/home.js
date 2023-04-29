import { reactive, ref } from "vue";
import { info, callApi } from "../../../Helpers/apiService.js";

export function useHome() {
    const formValue = reactive({
        nid: null,
    });
    const isLoading = ref(false);
    const regInfo = ref("");

    const searchRegistration = async () => {
        regInfo.value = null;
        if (!formValue.nid) {
            info("Please enter your nid");
            return;
        }

        const res = await callApi("POST", "/show-registration", formValue);
        if (res.data.success) {
            regInfo.value = res.data.json_data;
        }
    };

    const onTextClear = () => {
        regInfo.value = null;
    };

    return {
        formValue,
        isLoading,
        regInfo,
        searchRegistration,
        onTextClear,
    };
}
