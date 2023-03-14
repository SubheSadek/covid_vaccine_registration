<template>
	<span>
		<div v-if="$store.state.dataLoading" id="loading">
			<img id="loading-image" src="@/assets/images/Tag-For-Loading-Bar-Gif-Transparent-Loading-Gif-.gif"
				alt="Loading..." />
		</div>
		<div class="page_block"></div>
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true"
					data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
					data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
					data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
					<!--begin::Brand-->
					<div class="aside-logo flex-column-auto" id="kt_aside_logo">
						<!--begin::Logo-->
						<router-link to="/">
							<img alt="Logo" :src="`${baseUrl}assets/media/logos/logo-1-dark.svg`" class="h-25px logo" />
						</router-link>

						<div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
							data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
							data-kt-toggle-name="aside-minimize">

							<svg-icon name="collapse-arrow"></svg-icon>

						</div>

					</div>

					<div class="aside-menu flex-column-fluid">

						<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
							data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
							data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
							data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
							<!--begin::Menu-->
							<div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
								id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

								<sidebar :route="route" v-for="route in $router.options.routes" :key="route.path"
									:class="route.meta.status == 0 ? 'd-none' : ''"></sidebar>

							</div>
							<!--end::Menu-->
						</div>

					</div>

				</div>

				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

					<div id="kt_header" class="header align-items-stretch"
						style="border-bottom: 1px solid rgb(239, 242, 245);">

						<div class="container-fluid d-flex align-items-stretch justify-content-between">

							<div class="d-flex align-items-center d-lg-none ms-n2 me-2" title="Show aside menu">
								<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
									id="kt_aside_mobile_toggle">

									<svg-icon name="mobile-aside"></svg-icon>

								</div>
							</div>

							<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
								<a href="../../demo1/dist/index.html" class="d-lg-none">
									<img alt="Logo" :src="`${baseUrl}assets/media/logos/logo-2.svg`" class="h-30px" />
								</a>
							</div>

							<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">

								<div class="d-flex align-items-stretch" id="kt_header_nav">

									<div class="header-menu align-items-stretch" data-kt-drawer="true"
										data-kt-drawer-name="header-menu"
										data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
										data-kt-drawer-width="{default:'200px', '300px': '250px'}"
										data-kt-drawer-direction="end" data-kt-drawer-toggle="#kt_header_menu_mobile_toggle"
										data-kt-swapper="true" data-kt-swapper-mode="prepend"
										data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">

										<div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch"
											id="#kt_header_menu" data-kt-menu="true">
											<div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
												class="menu-item here show menu-lg-down-accordion me-lg-1">
												<h1
													class="d-flex text-dark fw-bolder fs-3 align-items-center my-1 text-capitalize">
													{{ $route.meta.title ? $route.meta.title : '' }}
													<span class="h-20px border-1 border-gray-200 ms-3 mx-2 me-1"></span>
												</h1>
											</div>

										</div>
										<!--end::Menu-->
									</div>
									<!--end::Menu wrapper-->
								</div>

								<div class="d-flex align-items-stretch flex-shrink-0">

									<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
										<!--begin::Menu wrapper-->
										<div class="cursor-pointer symbol symbol-30px symbol-md-40px"
											data-kt-menu-trigger="click" data-kt-menu-attach="parent"
											data-kt-menu-placement="bottom-end">
											<img :src="`${baseUrl}assets/media/avatars/300-1.jpg`" alt="user" />
										</div>
										<!--begin::User account menu-->
										<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
											data-kt-menu="true">
											<!--begin::Menu item-->
											<div class="menu-item px-3">
												<div class="menu-content d-flex align-items-center px-3">
													<!--begin::Avatar-->
													<div class="symbol symbol-50px me-5">
														<img alt="Logo" :src="`${baseUrl}assets/media/avatars/300-1.jpg`" />
													</div>
													<!--end::Avatar-->
													<!--begin::Username-->
													<div class="d-flex flex-column">
														<div class="fw-bolder d-flex align-items-center fs-5">{{
															$store.state.authUser?.name
														}}
															<span
																class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span>
														</div>
														<a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{
															$store.state.authUser?.email
														}}</a>
													</div>
													<!--end::Username-->
												</div>
											</div>

											<!-- <div class="menu-item px-5">
													<router-link to="/admin/profile"
														class="menu-link px-5">Profile</router-link>
												</div> -->

											<div class="menu-item px-5">
												<a @click="logout" href="javascript::void()" class="menu-link px-5">Sign
													Out</a>
											</div>

											<!-- <div class="separator my-2"></div> -->

										</div>

									</div>
									<!--end::User menu-->
									<!--begin::Header menu toggle-->
									<div class="d-flex align-items-center d-lg-none ms-2 me-n3" title="Show header menu">
										<div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
											id="kt_header_menu_mobile_toggle">

											<svg-icon name="mobile-toggle"></svg-icon>
											<!--end::Svg Icon-->
										</div>
									</div>
									<!--end::Header menu toggle-->
								</div>
								<!--end::Toolbar wrapper-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

						<div class="post d-flex flex-column-fluid" id="kt_post">

							<div id="kt_content_container" class="container-xxl">

								<router-view></router-view>

							</div>
							<!--end::Container-->
						</div>
						<!--end::Post-->
					</div>
					<!--end::Content-->

				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>


	</span>
</template>

<script>

import sidebar from './sideBar.vue';
export default {
	components: {
		sidebar
	},
	data() {
		return {
			// baseUrl : baseUrl,
		}
	},
	methods: {
		async logout() {
			let res = await this.callApi('get', '/web/auth/logout');
			if (res.status === 200) {
				window.location.href = "/";
			}
		},
		redirect(url) {
			this.$router.push(url);
		}
	},
	created() {

		// console.log(this.$router.options.routes)
	},
}

</script>

<style>
@media (min-width: 1400px) {

	.container,
	.container-lg,
	.container-md,
	.container-sm,
	.container-xl,
	.container-xxl {
		max-width: v-bind(containerXxlWidth) !important;
	}
}

#loading {
	position: fixed;
	display: block;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	text-align: center;
	opacity: 0.7;
	background-color: #fff;
	z-index: 99;
}

#loading-image {
	position: absolute;
	top: 50% !important;
	left: 50% !important;
	z-index: 100;
	width: 150px !important;
}

.v-enter-active,
.v-leave-active {
	transition: opacity 0.8s ease;
}

.v-enter-from,
.v-leave-to {
	opacity: 0;
}

.no_data {
	display: block;
	text-align: center;
	padding: 30px;
}

.no_data h2 {
	font-size: 20px;
	font-weight: 500;
	color: #afb4b7;
}
</style>
