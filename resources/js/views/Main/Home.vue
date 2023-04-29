<template>
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">

            <div class="d-flex flex-column flex-lg-row-fluid">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid py-10">
                    <!--begin::Wrapper-->
                    <div class="w-lg-1000px p-10 p-lg-15 mx-auto _box_shadow" style="border-radius: 6px;">
                        
                        <div class="d-flex align-items-center justify-content-center">

                            <div class="position-relative w-md-400px me-md-2" style="display:inherit">
                                <Input 
                                    clearable @on-clear="onTextClear()" 
                                    v-model="formValue.nid" type="text" prefix="ios-search" 
                                    placeholder="Give your NID no."
                                    style="margin-right: 5px"
                                    show-word-limit maxlength="17"
                                    size="large"
                                />
                                
                                <Button 
                                    @click="searchRegistration()" 
                                    size="large"
                                    :loading="isLoading" :disabled="isLoading" 
                                    type="primary">
                                    {{ isLoading ? 'Please wait . . .' : 'Submit'}}
                                </Button>

                            </div>

                        </div>

                        <div class="border-gray-100 border-bottom-dashed py-5"></div>

                        <div v-if="regInfo">
                            <div class="text-center py-5">
                                <span class="badge badge-success" style="font-size:26px">Registration Status</span>
                            </div>

                            <table>
                                <tr>
                                    <th>Scheduled Date</th>
                                    <td>{{ regInfo.scheduled_date }}</td>
                                </tr>
                                <tr>
                                    <th>Center name</th>
                                    <td>{{ regInfo.center_name }}</td>
                                </tr>
                                <tr>
                                    <th>Registration Status</th>
                                    <td><span class="badge badge-primary">{{ regInfo.registration_status }}</span></td>
                                </tr>
                            </table>
                        </div>

                        <div v-else class="_login_redirect">
                            <router-link to="/vaccine-registration">
                                Haven't register yet ? Please register.
                            </router-link>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>
</template>

<script setup>

//Composition Api
import {
    Input,
    Button
} from "view-ui-plus"
import { useHome } from './JS/home';
const {
    formValue,
    isLoading,
    regInfo,
    searchRegistration,
    onTextClear
} = useHome();

</script>


<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
  font-weight: bold;
}
</style>
