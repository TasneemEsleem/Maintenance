<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="{{App::isLocale('en') ? 'en' : 'ar'}}" direction="{{App::isLocale('en') ? 'ltr' : 'rtl'}}">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <title></title>
    <meta charset="utf-8" />
    <meta name="description"
        content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Rails, Spring, Blazor, Django, Flask & Laravel Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Keenthemes | Metronic" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{asset('cms/assets/media/logos/favicon.ico')}}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->

    @if (App::isLocale('ar'))
    <link href="{{ asset('cms/assets/css/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    @else
    <link href="{{ asset('cms/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endif
    <link href="{{asset('cms/assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <!--begin::Theme mode setup on page load-->
    <script>
    var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-theme-mode");
        } else {
            if (localStorage.getItem("data-theme") !== null) {
                themeMode = localStorage.getItem("data-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-theme", themeMode);
    }
    </script>
    <!--end::Theme mode setup on page load-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Page bg image-->
        <style>
        body {
            background-image: url('{{asset('cms/assets/media/auth/bg4.jpg')}}');
        }

        [data-theme="dark"] body {
            background-image: url('{{asset('cms/assets/media/auth/bg4-dark.jpg')}}');
        }
        </style>
        <!--end::Page bg image-->
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <!--begin::Aside-->
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                <!--begin::Aside-->
                <div class="d-flex flex-center flex-lg-start flex-column">
                    <!--begin::Logo-->
                    <a href="" class="mb-7">
                        <img alt="Logo" src="{{asset('cms/assets/media/logos/custom-3.svg')}}" />
                    </a>
                    <!--end::Logo-->
                    <!--begin::Title-->
                    <h2 class="text-white fw-normal m-0">Register </h2>
                    <!--end::Title-->
                </div>
                <!--begin::Aside-->
            </div>
            <!--begin::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-center w-lg-50 p-10">
                <!--begin::Card-->
                <div class="card rounded-3 w-md-550px">
                    <!--begin::Card body-->
                    <div class="card-body p-10 p-lg-20">
                        <!--begin::Form-->
                        <form id="create-form" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                @csrf                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-dark fw-bolder mb-3">{{__('cms.Sign_Up')}}</h1>
                                <!--end::Title-->

                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group=-->

                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="{{__('cms.name')}}" name="name" id="name"
                                    autocomplete="off" class="form-control bg-transparent" />
                                <!--end::Email-->
                            </div>
                            <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="{{__('cms.email')}}" name="email" id="email"
                                    autocomplete="off" class="form-control bg-transparent" />
                                <!--end::Email-->
                            </div>
                            {{-- <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <select class="form-select form-select-solid form-select-lg" data-control="select2" id="country_id" data-select2-id="select2-data-10-uyhn">
                            <option value="-1" data-select2-id="select2-data-12-0cmm">{{__('cms.choose')}}</option>
                            @foreach($countries as $country)
                            <option value="{{$country->id}}">
                                  @if (app()->getLocale()=='ar')
                                        {{$country->name_ar}}
                                        @else
                                        {{$country->name_en}}
                                        @endif </option>
                            @endforeach
                        </select>
                                <!--end::Email-->
                            </div> --}}

                            {{-- <div class="fv-row mb-8">
                                <!--begin::Email-->

                        <select class="form-select form-select-solid form-select-lg" data-control="select2" id="city_id" data-select2-id="select2-data-10-uyhn" disabled>
                            <option value="-1" selected>Select Country</option>

                        </select>

                            </div> --}}
                            {{-- <div class="fv-row mb-8">
                                <!--begin::Email-->
                                <input type="text" placeholder="{{__('cms.region')}}" name="region" id="region"
                                    autocomplete="off" class="form-control bg-transparent" />
                                <!--end::Email-->
                            </div> --}}
                            <!--end::Input group=-->
                            <div class="fv-row mb-3">
                                <!--begin::Password-->
                                <input type="password" placeholder="{{__('cms.password')}}" name="password"
                                    id="password" autocomplete="off" class="form-control bg-transparent" />
                                <!--end::Password-->
                            </div>
                            <!--end::Input group=-->
                            <!--begin::Wrapper-->

                            <!--end::Wrapper-->
                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button onclick="performStore()" type="button" class="btn btn-primary">
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">{{__('cms.Sign_Up')}}</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">{{__('cms.Please_wait')}}...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Submit button-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->
    <!--begin::Javascript-->
    <script>
    var hostUrl = "cms/assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="{{asset('cms/assets/plugins/global/plugins.bundle.js')}}"></script>
    <script src="{{asset('cms/assets/js/scripts.bundle.js')}}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="{{asset('cms/assets/js/custom/authentication/sign-in/general.js')}}"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
$(function() {
    bsCustomFileInput.init()
});
</script>
<script type="text/javascript">
    $('#country_id').on('change', function() {
        if (this.value == -1) {
            $('#city_id').empty();
            $("#city_id").append('<option value=-1>Select Country</option>');
            $('#city_id').attr('disabled', true);
        } else {
            getCity(this.value);
        }
    });
    function getCity(country_id) {
var locale = document.getElementsByTagName("html")[0].getAttribute("lang");

axios.get('/country/' + country_id)
    .then(function(response) {
        console.log(response);
        console.log(response.data.cities);
        $('#city_id').empty();
        if (response.data.cities.length > 0) {
            $.each(response.data.cities, function(i, item) {
                console.log('Id: ' + item['id']);
                if (locale == 'ar') {
                    $('#city_id').append(new Option(item['name_ar'], item['id']));
                } else {
                    $('#city_id').append(new Option(item['name_en'], item['id']));
                }
                $('#city_id').attr('disabled', false);
            });
        } else {
            $('#city_id').empty();
            $('#city_id').attr('disabled', true);
        }
    })
    .catch(function(error) {});
}
</script>
<script>
function performStore() {
    var formData = new FormData();
    formData.append('name', document.getElementById('name').value);
    formData.append('email', document.getElementById('email').value);
    formData.append('password', document.getElementById('password').value);

    // formData.append('role_id', document.getElementById('role_id').value);

    // formData.append('country_id', document.getElementById('country_id').value);
    // formData.append('city_id', document.getElementById('city_id').value);
    // formData.append('region', document.getElementById('region').value);
    axios.post('/registers/store', formData)
        .then(function(response) {
            console.log(response);
            toastr.success(response.data.message);
            document.getElementById('create-form').reset();
            window.location.href = '/login/user';
        })
        .catch(function(error) {
            console.log(error.response);
            toastr.error(error.response.data.message);
        });
}
</script>
