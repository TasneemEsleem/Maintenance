          @extends('cms.parent')
          @section('title',__('cms.Dashboard'))
          @section('page-lg',__('cms.home')))
          @section('styles')
          @section('Content')
          @if (auth('admin')->check())
          <div class="row g-5 g-xl-8">
              <div class="col-xl-4">
                  <!--begin::Statistics Widget 5-->
                  <a href="#" class="card bg-info hoverable card-xl-stretch mb-xl-8">

                      <!--begin::Body-->
                      <div class="card-body">
                          <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                          <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                  <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                  <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                              </svg>
                          </span>
                          <!--end::Svg Icon-->
                          <div class="text-white fw-bold fs-2 mb-2 mt-5">{{__('cms.technical')}}</div>
                          <div class="fw-semibold text-white">{{$technical}}</div>
                      </div>
                      <!--end::Body-->
                  </a>
                  <!--end::Statistics Widget 5-->
              </div>

              <div class="col-xl-4">
                  <!--begin::Statistics Widget 5-->
                  <a href="#" class="card bg-danger hoverable card-xl-stretch mb-xl-8">

                      <!--begin::Body-->
                      <div class="card-body">
                          <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                          <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                  <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                  <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                              </svg>
                          </span>
                          <!--end::Svg Icon-->
                          <div class="text-white fw-bold fs-2 mb-2 mt-5">{{__('cms.agent')}}</div>
                          <div class="fw-semibold text-white">{{$agent}}</div>
                      </div>
                      <!--end::Body-->
                  </a>
                  <!--end::Statistics Widget 5-->
              </div>

              <div class="col-xl-4">
                  <!--begin::Statistics Widget 5-->
                  <a href="#" class="card bg-danger hoverable card-xl-stretch mb-xl-8">

                      <!--begin::Body-->
                      <div class="card-body">
                          <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                          <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                  <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                  <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                              </svg>
                          </span>
                          <!--end::Svg Icon-->
                          <div class="text-white fw-bold fs-2 mb-2 mt-5">{{__('cms.customer')}}</div>
                          <div class="fw-semibold text-white">{{$customer}}</div>
                      </div>
                      <!--end::Body-->
                  </a>
                  <!--end::Statistics Widget 5-->
              </div>


          </div>

          <div class="row g-5 g-xl-8">

              <div class="col-xl-4">
                  <!--begin::Statistics Widget 5-->
                  <a href="#" class="card bg-dark hoverabl card-xl-stretch mb-xl-8">
                      <!--begin::Body-->
                      <div class="card-body">
                          <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                          <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor"></path>
                                  <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor"></path>
                                  <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor"></path>
                              </svg>
                          </span>
                          <!--end::Svg Icon-->
                          <div class="text-white fw-bold fs-2 mb-2 mt-5">{{__('cms.brands')}}</div>
                          <div class="fw-semibold text-white">{{$brand}}</div>
                      </div>
                      <!--end::Body-->
                  </a>
                  <!--end::Statistics Widget 5-->
              </div>

              <div class="col-xl-4">
                  <!--begin::Statistics Widget 5-->
                  <a href="#" class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
                      <!--begin::Body-->
                      <div class="card-body">
                          <!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
                          <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path opacity="0.3" d="M14 12V21H10V12C10 11.4 10.4 11 11 11H13C13.6 11 14 11.4 14 12ZM7 2H5C4.4 2 4 2.4 4 3V21H8V3C8 2.4 7.6 2 7 2Z" fill="currentColor"></path>
                                  <path d="M21 20H20V16C20 15.4 19.6 15 19 15H17C16.4 15 16 15.4 16 16V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z" fill="currentColor"></path>
                              </svg>
                          </span>
                          <!--end::Svg Icon-->
                          <div class="text-white fw-bold fs-2 mb-2 mt-5">{{__('cms.category')}}</div>
                          <div class="fw-semibold text-white">{{$category}}</div>
                      </div>
                      <!--end::Body-->
                  </a>
                  <!--end::Statistics Widget 5-->
              </div>
              <div class="col-xl-4">
                  <!--begin::Statistics Widget 5-->
                  <a href="#" class="card bg-info hoverable card-xl-stretch mb-xl-8">
                      <!--begin::Body-->
                      <div class="card-body">
                          <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm008.svg-->
                          <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor"></path>
                                  <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor"></path>
                                  <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor"></path>
                              </svg>
                          </span>
                          <!--end::Svg Icon-->
                          <div class="text-white fw-bold fs-2 mb-2 mt-5">{{__('cms.model')}}</div>
                          <div class="fw-semibold text-white">{{$model}}</div>
                      </div>
                      <!--end::Body-->
                  </a>
                  <!--end::Statistics Widget 5-->
              </div>


          </div>
          <div class="row g-5 g-xl-8">
              <div class="col-xl-4">
                  <!--begin::Statistics Widget 5-->
                  <a href="#" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                      <!--begin::Body-->
                      <div class="card-body">
                          <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                          <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                      <rect x="0" y="0" width="24" height="24"></rect>
                                      <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="#000000"></path>
                                      <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"></rect>
                                      <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="#000000" opacity="0.3"></path>
                                  </g>
                              </svg>
                          </span>

                          <!--end::Svg Icon-->
                          <div class="text-white fw-bold fs-2 mb-2 mt-5">{{__('cms.spare_part')}}</div>
                          <div class="fw-semibold text-white">{{$spare_part}}</div>
                      </div>
                      <!--end::Body-->
                  </a>
                  <!--end::Statistics Widget 5-->
              </div>

              <div class="col-xl-4">
                  <!--begin::Statistics Widget 5-->
                  <a href="#" class="card bg-primary hoverable card-xl-stretch mb-5 mb-xl-8">
                      <!--begin::Body-->
                      <div class="card-body">
                          <!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
                          <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path opacity="0.3" d="M14 12V21H10V12C10 11.4 10.4 11 11 11H13C13.6 11 14 11.4 14 12ZM7 2H5C4.4 2 4 2.4 4 3V21H8V3C8 2.4 7.6 2 7 2Z" fill="currentColor"></path>
                                  <path d="M21 20H20V16C20 15.4 19.6 15 19 15H17C16.4 15 16 15.4 16 16V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z" fill="currentColor"></path>
                              </svg>
                          </span>
                          <!--end::Svg Icon-->
                          <div class="text-white fw-bold fs-2 mb-2 mt-5">{{__('cms.problems')}}</div>
                          <div class="fw-semibold text-white">{{$problem}}</div>
                      </div>
                      <!--end::Body-->
                  </a>
                  <!--end::Statistics Widget 5-->
              </div>


              <div class="col-xl-4">
                  <!--begin::Statistics Widget 5-->
                  <a href="#" class="card bg-success hoverable card-xl-stretch mb-5 mb-xl-8">
                      <!--begin::Body-->
                      <div class="card-body">
                          <!--begin::Svg Icon | path: icons/duotune/graphs/gra005.svg-->
                          <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path opacity="0.3" d="M14 12V21H10V12C10 11.4 10.4 11 11 11H13C13.6 11 14 11.4 14 12ZM7 2H5C4.4 2 4 2.4 4 3V21H8V3C8 2.4 7.6 2 7 2Z" fill="currentColor"></path>
                                  <path d="M21 20H20V16C20 15.4 19.6 15 19 15H17C16.4 15 16 15.4 16 16V20H3C2.4 20 2 20.4 2 21C2 21.6 2.4 22 3 22H21C21.6 22 22 21.6 22 21C22 20.4 21.6 20 21 20Z" fill="currentColor"></path>
                              </svg>
                          </span>
                          <!--end::Svg Icon-->
                          <div class="text-white fw-bold fs-2 mb-2 mt-5">{{__('cms.user_model')}}</div>
                          <div class="fw-semibold text-white">{{$usermodel}}</div>
                      </div>
                      <!--end::Body-->
                  </a>
                  <!--end::Statistics Widget 5-->
              </div>
          </div>

          <!-- /** End Of Count */ -->

          @elseif (auth('user')->check())
          @if(auth('user')->user()->user_type=='agent')
          <div class="row g-5 g-xl-8">
              <div class="col-xl-6">
                  <!--begin::Statistics Widget 5-->
                  <a href="#" class="card bg-info hoverable card-xl-stretch mb-xl-8">

                      <!--begin::Body-->
                      <div class="card-body">
                          <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                          <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                  <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                  <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                              </svg>
                          </span>
                          <!--end::Svg Icon-->
                          <div class="text-white fw-bold fs-2 mb-2 mt-5">{{__('cms.problems')}}</div>
                          <div class="fw-semibold text-white">{{$problem}}</div>
                      </div>
                      <!--end::Body-->
                  </a>
                  <!--end::Statistics Widget 5-->
              </div>

              <div class="col-xl-6">
                  <!--begin::Statistics Widget 5-->
                  <a href="#" class="card bg-danger hoverable card-xl-stretch mb-xl-8">

                      <!--begin::Body-->
                      <div class="card-body">
                          <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                          <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                  <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                  <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                              </svg>
                          </span>
                          <!--end::Svg Icon-->
                          <div class="text-white fw-bold fs-2 mb-2 mt-5">{{__('cms.repair')}}</div>
                          <div class="fw-semibold text-white">{{$repair}}</div>
                      </div>
                      <!--end::Body-->
                  </a>
                  <!--end::Statistics Widget 5-->
              </div>
          </div>
          <div id="kt_app_content" class="app-content flex-column-fluid">
              <!--begin::Content container-->
              <div id="kt_app_content_container" class="app-container container-xxl">
                  <!--begin::Products-->
                  <div class="card card-flush">

                      <div class="card-body pt-0">
                          <div id="kt_ecommerce_products_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                              <div class="table-responsive">
                                  <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_ecommerce_products_table">
                                      <thead>
                                          <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                              <th class="min-w-125px sorting fs-4" tabindex="0" aria-controls="kt_table_users" aria-label="Two-step: activate to sort column ascending">#</th>
                                              <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" aria-label="Joined Date: activate to sort column ascending">{{__('cms.technical')}}</th>
                                              <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" aria-label="Two-step: activate to sort column ascending">{{__('cms.problem_details')}}</th>
                                      </thead>
                                      <tbody class="fw-semibold text-gray-600">
                                          @foreach ($repairs as $repair)
                                          <tr class="odd">
                                              <td>{{$loop->index+1}}</td>
                                              <td>
                                                  <span class="fw-bold">{{$repair->user->name??''}}</span>
                                              </td>
                                              <td> {{$repair->problem->details ??'لا يوجد تفاصيل'}}</td>

                                          </tr>
                                          @endforeach
                                      </tbody>
                                      <!--end::Table body-->
                                  </table>
                                  {{ $repairs->links() }}

                              </div>
                              <div class="row">
                                  <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                  </div>
                                  <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                      <div class="dataTables_paginate paging_simple_numbers" id="kt_table_users_paginate">
                                          <ul class="pagination">
                                              <li class="paginate_button page-item previous disabled" id="kt_table_users_previous"><a href="#" aria-controls="kt_table_users" data-dt-idx="0" tabindex="0" class="page-link"><i class="previous"></i></a></li>
                                              <li class="paginate_button page-item active"><a href="#" aria-controls="kt_table_users" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                              <li class="paginate_button page-item "><a href="#" aria-controls="kt_table_users" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                              <li class="paginate_button page-item next" id="kt_table_users_next"><a href="#" aria-controls="kt_table_users" data-dt-idx="4" tabindex="0" class="page-link"><i class="next"></i></a></li>
                                          </ul>
                                      </div>
                                  </div>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!--end::Content container-->

          @elseif(auth('user')->user()->user_type=='technical')
          <div id="kt_app_content" class="app-content flex-column-fluid">
              <!--begin::Content container-->
              <div id="kt_app_content_container" class="app-container container-xxl">
                  <!--begin::Products-->
                  <div class="card card-flush">
                      <!--begin::Card header-->
                      <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                          <!--begin::Card title-->
                          <div class="card-title">
                              <!--begin::Search-->

                              <!--end::Search-->
                          </div>
                          <!--end::Card title-->
                          <!--begin::Card toolbar-->
                          <div class="card-toolbar flex-row-fluid justify-content-end gap-5">

                          </div>
                          <!--end::Card toolbar-->
                      </div>
                      <!--end::Card header-->
                      <!--begin::Card body-->
                      <div class="card-body pt-0">
                          <!--begin::Table-->
                          <div id="kt_ecommerce_products_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                              <div class="table-responsive">
                                  <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_ecommerce_products_table">
                                      <!--begin::Table head-->
                                      <thead>
                                          <!--begin::Table row-->
                                          <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                          <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" aria-label="Two-step: activate to sort column ascending">
                                                  #</th>
                                              <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" aria-label="Two-step: activate to sort column ascending">
                                                  {{__('cms.problem_details')}}
                                              </th>

                                              <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" aria-label="Joined Date: activate to sort column ascending">{{__('cms.Status')}}
                                              </th>
                                              <th class=" min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">{{__('cms.actions')}}</th>
                                              <th class=" min-w-100px sorting_disabled" rowspan="1" colspan="1" aria-label="Actions">{{__('cms.spareparts')}}</th>
                                          </tr>
                                          <!--end::Table row-->
                                      </thead>
                                      <!--end::Table head-->
                                      <!--begin::Table body-->
                                      <tbody class="fw-semibold text-gray-600">
                                          @foreach ($repairs as $repair)
                                          <tr class="odd">
                                          <td>{{$loop->index+1}}</td>

                                              <td class="d-flex align-items-center">
                                                  <!--begin:: Avatar -->
                                                  <!--end::Avatar-->
                                                  <!--begin::User details-->
                                                  <div class="d-flex flex-column">
                                                      <p class="text-gray-800 text-hover-primary mb-1"> {{$repair->problem->details ??'NULL' }}
                                                      </p>
                                                  </div>
                                                  <!--begin::User details-->
                                              </td>

                                              <!--end::Two step=-->
                                              <!--begin::Joined-->
                                              <td>
                                                  <span class="fw-bold">{{$repair->app_status}}</span>
                                              </td>



                                              <td>
                                                  <div class="d-flex  flex-shrink-0">

                                                      <a href="{{route('repair.problem',$repair->problem->id )}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                          <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                          <span class="btn btn-info">
                                                              {{ __('cms.information') }}
                                                          </span>
                                                          <!--end::Svg Icon-->
                                                      </a>

                                                  </div>
                                              </td>

                                              <td>
                                                  <div class="d-flex  flex-shrink-0">

                                                      <a href="{{route('repair_problems.show', $repair->id )}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                                          <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                          <span class="btn btn-info">
                                                              {{ __('cms.count') }}:{{ $repair->spareparts_count }}
                                                          </span>
                                                          <!--end::Svg Icon-->
                                                      </a>

                                                  </div>
                                              </td>
                                              <!--end::Action=-->
                                          </tr>
                                          @endforeach
                                      </tbody>
                                      <!--end::Table body-->
                                  </table>
                              </div>
                              <div class="row">
                                  <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                  </div>

                              </div>
                          </div>
                      </div>
                      <!--end::Table-->
                  </div>
                  <!--end::Card body-->
              </div>
              <!--end::Products-->
          </div>
          <!--end::Content container-->
          </div>
          <!--end::Content container-->
          @else
          <div id="kt_app_content" class="app-content flex-column-fluid">
              <!--begin::Content container-->
              <div id="kt_app_content_container" class="app-container container-xxl">
                  <!--begin::Products-->
                  <div class="card card-flush">
                      <!--begin::Card header-->
                      <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                          <!--begin::Card title-->
                          <div class="card-title">
                          </div>

                          <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                            <button type="button" class="btn btn-primary"
                            data-bs-toggle="modal"
                             data-bs-target="#kt_modal_add_customer">{{__('cms.create_problem')}} </button>


                            <!--begin::Add product-->

                            <!--end::Add product-->
                        </div>
                          <!--end::Card toolbar-->
                      </div>
                      <!--end::Card header-->
                      <!--begin::Card body-->
                      <div class="card-body pt-0">
                          <!--begin::Table-->
                          <div id="kt_ecommerce_products_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                              <div class="table-responsive">
                                  <table class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer" id="kt_ecommerce_products_table">
                                      <!--begin::Table head-->
                                      <thead>
                                          <!--begin::Table row-->
                                          <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                              <th class="min-w-125px sorting" tabindex="0" aria-controls="kt_table_users" rowspan="1" colspan="1" aria-label="User: activate to sort column ascending" style="width: 206.375px;">#</th>
                                              <th>{{__('cms.choose')}}</th>

                                              <th class="min-w-200px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="Product: activate to sort column ascending" style="width: 206.828px;">{{__('cms.product_model')}}</th>

                                              <th class="text-end min-w-100px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="SKU: activate to sort column ascending" style="width: 103.562px;">{{__('cms.JOINED_DATE')}}</th>
                                              <th class="text-end min-w-100px sorting" tabindex="0" aria-controls="kt_ecommerce_products_table" rowspan="1" colspan="1" aria-label="SKU: activate to sort column ascending" style="width: 103.562px;"></th>

                                              <!--end::Table row-->
                                      </thead>
                                      <!--end::Table head-->
                                      <!--begin::Table body-->
                                      @foreach($user_models as $user_model)
                                      <tbody class="fw-semibold text-gray-600">
                                          <tr class="odd">
                                              <td>{{$loop->index+1}}</td>

                                              <td>
                                                  <div class="form-group clearfix align-middle">
                                                      <div class="icheck-success d-inline" id="model_id" >
                                                          <input class="form-check-input " type="checkbox" id="model_{{$user_model->id}}">
                                                          <label class="form-check-label ms-3" for="model_{{$user_model->id}}"></label>
                                                      </div>
                                                  </div>
                                              </td>
                                              <td class="text-left pe-0">
                                                  <span class="fw-bold">{{$user_model->models->name}}</span>
                                              </td>
                                              <!--end::SKU=-->
                                              <!--begin::Qty=-->
                                              <td class="text-end pe-0" data-order="16">
                                                  <span class="fw-bold ms-3">{{$user_model->created_at}}</span>
                                              </td>
                                              <td class="text-end pe-0">
                                                  <!--end::Action=-->
                                          </tr>
                                      </tbody>
                                      @endforeach
                                      <!--end::Table body-->
                                  </table>
                              </div>
                              <div class="row">
                                  <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                                  </div>

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>



          <!--begin::Modal - Customers - Add-->
          <div class="modal fade" id="kt_modal_add_customer" tabindex="-1" aria-hidden="true">
              <!--begin::Modal dialog-->
              <div class="modal-dialog modal-dialog-centered mw-650px">
                  <!--begin::Modal content-->
                  <div class="modal-content">
                      <!--begin::Form-->
                      <form class="form" action="#" id="kt_modal_add_customer_form" data-kt-redirect="../../demo1/dist/apps/customers/list.html">
                          <!--begin::Modal header-->
                          <div class="modal-header" id="kt_modal_add_customer_header">
                              <!--begin::Modal title-->
                              <h2 class="fw-bold">Add a Problem</h2>
                              <!--end::Modal title-->
                              <!--begin::Close-->
                              <div id="kt_modal_add_customer_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                                  <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                  <span class="svg-icon svg-icon-1">
                                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                          <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                      </svg>
                                  </span>
                                  <!--end::Svg Icon-->
                              </div>
                              <!--end::Close-->
                          </div>
                          <!--end::Modal header-->
                          <!--begin::Modal body-->
                          <div class="modal-body py-10 px-lg-17">
                              <!--begin::Scroll-->

                              <div class="fv-row mb-50">
                                  <!--begin::Label-->
                                  <label class="fs-6 fw-semibold mb-2">Description</label>
                                  <!--end::Label-->
                                  <!--begin::Input-->
                                  <input type="text" class="form-control form-control-solid" placeholder="" id="description" />
                                  <!--end::Input-->
                              </div>
                          </div>
                          <!--end::Modal body-->
                          <!--begin::Modal footer-->
                          <div class="modal-footer flex-center">
                              <!--begin::Button-->
                              <button type="reset" id="kt_modal_add_customer_cancel" class="btn btn-light me-3">Discard</button>
                              <!--end::Button-->
                              <!--begin::Button-->
                              <button type="button" onclick="performStore({{$user_models}})" id="kt_modal_add_customer_submit" class="btn btn-primary">
                                  <span class="indicator-label">Submit</span>
                                  <span class="indicator-progress">Please wait...
                                      <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                              </button>
                              <!--end::Button-->
                          </div>
                          <!--end::Modal footer-->
                      </form>
                      <!--end::Form-->
                  </div>
              </div>
          </div>
          </div>
          <!--end::Content container-->
          @endif
          @endif
          @endsection
          @section('scripts')
          <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script>
              $(function() {
                  bsCustomFileInput.init()
              });
          </script>
          <script>
              function performStore(modelsArray) {

                  var models = modelsArray;
                  const checked = [];

                  for (var i = 0; i < models.length; i++) {
                      if (document.getElementById(`model_${models[i].id}`).checked) {
                          checked[i] = models[i].model_id;
                      }

                  }
                  let data = {
                      models: checked,
                      description: document.getElementById('description').value
                  }
                  axios.post('/cms/problems', data)
                      .then(function(response) {
                          console.log(response);
                          toastr.success(response.data.message);

                      })
                      .catch(function(error) {
                          console.log(error.response);
                          toastr.error(error.response.data.message);
                      });
              }


              function confirmDelete(id, reference) {
                  Swal.fire({
                      title: 'Are you sure?',
                      text: "You won't be able to revert this!",
                      icon: 'warning',
                      showCancelButton: true,
                      cancelButtonColor: '#d33',
                      confirmButtonColor: '#3085d6',
                      confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                      if (result.isConfirmed) {
                          performDelete(id, reference);
                      }
                  });
              }

              function performDelete(id, reference) {
                  axios.delete('/cms/repair_problems/' + id)
                      .then(function(response) {
                          console.log(response);
                          toastr.success(response.data.message);
                          reference.closest('tr').remove();
                          // showMessage(response.data.message);
                      })
                      .catch(function(error) {
                          console.log(error.response);
                          toastr.error(error.response.data.message);
                          // showMessage(error.response.data.message);
                      });
              }

              function showMessage(data) {
                  Swal.fire(
                      data.title,
                      data.text,
                      data.icon
                  );
              }
          </script>
          @endsection

