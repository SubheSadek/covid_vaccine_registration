import { Notice } from "view-ui-plus";

export const callApi = async (method, url, dataObj, params = {}) => {
    try {
        let res = await axios({
            headers: {
                Accept: "application/json",
                "Content-Type": "application/json",
            },
            method: method,
            url: url,
            data: dataObj,
            params: params,
        });
        if (res.data.message) {
            success(res.data.message);
        }
        return res;
    } catch (e) {
        let res = e.response;
        if (res.status == 404 || res.status == 401 || res.status == 400) {
            if (res.data.message) warning(res.data.message);
        } else if (res.status == 422 || res.status == 400) {
            for (let key in res.data.errors) {
                info(res.data.errors[key][0]);
            }
        } else {
            swr();
        }
        return res;
    }
};
export const info = (msg, i = "Hey !") => {
    Notice.info({
        title: i,
        desc: msg,
    });
};
export const success = (msg, i = "Great!") => {
    Notice.success({
        title: i,
        desc: msg,
    });
};
export const warning = (msg, i = "Hey!") => {
    Notice.warning({
        title: i,
        desc: msg,
    });
};
export const error = (msg, i = "Oops!") => {
    Notice.error({
        title: i,
        desc: msg,
    });
};
export const swr = () => {
    Notice.error({
        title: "Oops",
        desc: "Something went wrong, please try again later. 😨😨😨",
    });
};
