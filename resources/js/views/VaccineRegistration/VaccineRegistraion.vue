<template>
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            
            <div class="d-flex flex-column flex-lg-row-fluid">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid py-10">
                    <!--begin::Wrapper-->
                    <div class="w-lg-1000px p-10 p-lg-15 mx-auto _box_shadow" style="border-radius: 6px;">
                        <!--begin::Form-->
                        <Form ref="formRef" :model="formValue" :rules="ruleValidate" class="form w-100">

                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">Covid Vaccine Registration Form</h1>
                            </div>
                            
                            <Row :gutter="16">
                                <Col span="12">
                                    <div class="fv-row mb-10">
                                        <FormItem class="form-label fs-6 fw-bolder text-dark" label="Name" prop="name">
                                            <Input 
                                                show-word-limit maxlength="255"
                                                v-model.trim="formValue.name" 
                                                type="text" placeholder="Name"
                                                autocomplete="off" size="large">
                                            </Input>
                                        </FormItem>
                                    </div>
                                </Col>

                                <Col span="12">
                                    <div class="fv-row mb-10">
                                        <FormItem class="form-label fs-6 fw-bolder text-dark" label="Email" prop="email">
                                            <Input 
                                                show-word-limit maxlength="255"
                                                v-model.trim="formValue.email" 
                                                type="text" placeholder="Email"
                                                autocomplete="off" size="large">
                                            </Input>
                                        </FormItem>
                                    </div>
                                </Col>

                                <Col span="12">
                                    <div class="fv-row mb-10">
                                        <FormItem class="form-label fs-6 fw-bolder text-dark" label="Phone (+8801700000000)" prop="phone">
                                            <Input 
                                                show-word-limit maxlength="14"
                                                v-model.trim="formValue.phone" 
                                                type="text" placeholder="+8801700000000"
                                                autocomplete="off"  size="large">
                                            </Input>
                                        </FormItem>
                                    </div>
                                </Col>

                                <Col span="12">
                                    <div class="fv-row mb-10">
                                        <FormItem class="form-label fs-6 fw-bolder text-dark" label="NID" prop="nid">
                                            <Input 
                                                show-word-limit maxlength="17"
                                                v-model.trim="formValue.nid" 
                                                type="text" placeholder="NID"
                                                autocomplete="off" size="large">
                                            </Input>
                                        </FormItem>
                                    </div>
                                </Col>

                                <Col span="12">
                                    <div class="fv-row mb-10">
                                        <FormItem class="form-label fs-6 fw-bolder text-dark" label="Birth Date" prop="birth_date">
                                            
                                                <DatePicker
                                                    @on-change="e => formValue.birth_date = e"
                                                    :model-value="formValue.birth_date"
                                                    format="yyyy-MM-dd" clearable type="date"
                                                    placeholder="Select birth date"
                                                    style="width: 100%" size="large"
                                                />

                                        </FormItem>
                                    </div>
                                </Col>

                                <Col span="12">
                                    <div class="fv-row mb-10">
                                        <FormItem class="form-label fs-6 fw-bolder text-dark" label="Vaccine Center" prop="vaccine_center_id">
                                            
                                            <SelectSearchOption
                                                v-model:formValue="formValue.vaccine_center_id"
                                                :initialData="centers"
                                                :title="`Search by center name`"
                                                :url="`vaccine-center-list`"
                                            />
                                               
                                        </FormItem>
                                    </div>
                                </Col>

                                <Col span="24">
                                    <div class="fv-row mb-10">
                                        <FormItem class="form-label fs-6 fw-bolder text-dark" label="Address" prop="address">
                                            <Input 
                                            v-model.trim="formValue.address" :rows="4" type="textarea"
                                            placeholder="e.g. House 10, Road 1/A, Block A&#10;Mohammadpur, Dhaka - 1207"
                                            autocomplete="off">
                                            </Input>
                                        </FormItem>
                                    </div>
                                </Col>

                            </Row>

                            <div class="text-center">

                                <Button :loading="isLoading" shape="circle" style="height: 51px;" :disabled="isLoading"
                                    @click="handleSubmit()" size="large" type="primary" long>
                                    {{ isLoading ? 'Please wait ...' : 'Register' }}
                                </Button>

                            </div>

                        </Form>

                    </div>

                </div>
            </div>

        </div> 

    </div>
</template>

<script setup>
import SelectSearchOption from '../../Helpers/GlobalComponents/SelectSearchOption.vue';
import {
    Row,
    Col,
    Form,
    FormItem,
    Input,
    Button,
    DatePicker
} from "view-ui-plus";
import { useVaccineRegistration } from "./Js/vaccine_registration";

const {
    formValue,
    ruleValidate,
    centers,
    isLoading,
    handleSubmit,
    handleReset,
    formRef
} = useVaccineRegistration();

</script>

