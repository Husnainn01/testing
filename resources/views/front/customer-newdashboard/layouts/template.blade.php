<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('images/ssjapanfevico.png') }}">
    <title>Customer Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/003e68ae06.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets_customer/css/style.css') }}">
</head>

<body>
    <section class="container-fluid px-0 overflow-hidden">
        <section class="row">
            <div class="col-12">
                @include('front.customer-newdashboard.layouts.topnav')
            </div>
        </section>
        <section class="row">
            <div class="col-lg-2 col-md-12 col-sm-12">
                @include('front.customer-newdashboard.layouts.header')
            </div>
            <div class="col-lg-10 col-sm-12 col-md-12">
                @yield('content')
            </div>
            <div class="col-12">
                @include('front.customer-newdashboard.layouts.footer')
            </div>
        </section>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js "></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        $(document).ready(function() {
            var current_fs, previous_fs; // Fieldsets
            var animating = false; // Flag to prevent quick multi-click glitches

            $(".next").click(function() {
                if (animating) return false;
                animating = true;

                current_fs = $(this).closest('fieldset');
                var next_fs = $(this).closest('fieldset').next();

                // Activate next step on progressbar using the index of next_fs
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                // Show the next fieldset
                next_fs.show();
                // Hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now, mx) {
                        // As the opacity of current_fs reduces to 0 - stored in "now"
                        // 1. Scale current_fs down to 80%
                        var scale = 1 - (1 - now) * 0.2;
                        // 2. Bring next_fs from the right(50%)
                        var left = (now * 50) + "%";
                        // 3. Increase opacity of next_fs to 1 as it moves in
                        var opacity = 1 - now;
                        current_fs.css({
                            'transform': 'scale(' + scale + ')',
                            'position': 'absolute'
                        });
                        next_fs.css({
                            'left': left,
                            'opacity': opacity
                        });
                    },
                    duration: 800,
                    complete: function() {
                        current_fs.hide();
                        animating = false;
                    },
                    // This comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
            });

            $(".previous").click(function() {
                if (animating) return false;
                animating = true;

                current_fs = $(this).closest('fieldset');
                var previous_fs = $(this).closest('fieldset').prev();

                // De-activate current step on progressbar
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                // Show the previous fieldset
                previous_fs.show();
                // Hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now, mx) {
                        // As the opacity of current_fs reduces to 0 - stored in "now"
                        // 1. Scale previous_fs from 80% to 100%
                        var scale = 0.8 + (1 - now) * 0.2;
                        // 2. Take current_fs to the right(50%) - from 0%
                        var left = ((1 - now) * 50) + "%";
                        // 3. Increase opacity of previous_fs to 1 as it moves in
                        var opacity = 1 - now;
                        current_fs.css({
                            'left': left
                        });
                        previous_fs.css({
                            'transform': 'scale(' + scale + ')',
                            'opacity': opacity
                        });
                    },
                    duration: 800,
                    complete: function() {
                        current_fs.hide();
                        animating = false;
                    },
                    // This comes from the custom easing plugin
                    easing: 'easeInOutBack'
                });
            });
        });




        $('#add_new-tab-content').hide();
        $('#default-tab-content').show();

        $('#receiver_add_new-tab-content').hide();
        $('#receiver_default-tab-content').show();

        $('#add_new-tab').click(function() {
            $('#default-tab-content').hide(400);
            $('#add_new-tab-content').show(400);
            $("#add_new-tab").addClass('grey-active');
            $("#default-tab").removeClass('grey-active');
        });

        $('#default-tab').click(function() {
            $('#add_new-tab-content').hide(400);
            $('#default-tab-content').show(400);
            $("#default-tab").addClass('grey-active');
            $("#add_new-tab").removeClass('grey-active');
        });
        $('#receiver_add_new-tab').click(function() {
            $('#receiver_add_new-tab-content').show(400);
            $('#receiver_default-tab-content').hide(400);
            $("#receiver_add_new-tab").addClass('grey-active');
            $("#receiver_default-tab").removeClass('grey-active');
        });
        $('#receiver_default-tab').click(function() {
            $('#receiver_default-tab-content').show(400);
            $('#receiver_add_new-tab-content').hide(400);
            $("#receiver_default-tab").addClass('grey-active');
            $("#receiver_add_new-tab").removeClass('grey-active');
        });
        //----------------------------------------
        // document.getElementById('submitForm').addEventListener('click', function() {
        //     const mandatoryFields = [
        //         'offer_ids',
        //         'service',
        //         'country',
        //         'city',
        //         'container_port'
        //     ];
        //     //
        //     var checkedCheckboxes = $('#exampleModal input[name="offer_ids[]"]:checked');
        //     var checkedValues = checkedCheckboxes.map(function() {
        //         return $(this).val();
        //     }).get();
        //     if (checkedValues.length === 0) {
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'Oops...',
        //             text: 'Please select at least one offer!',
        //         });
        //         return;
        //     }
        //     //
        //     // offer_ids
        //     const formData = {
        //         offer_ids: checkedValues,
        //         service: document.getElementById('service').value,
        //         country: parseInt(document.getElementById('country').value),
        //         city: parseInt(document.getElementById('city').value),
        //         container_port: parseInt(document.getElementById('city').value),
        //         // container_port: 33,
        //         consignee_tab: $('#tabs-nav-consignee #tabs-nav .grey-active').attr('id'),
        //         receiver_tab: $('#tabs-nav-receiver #tabs-nav .grey-active').attr('id'),
        //     };
        //     let isValid = true;
        //     for (const field of mandatoryFields) {
        //         if (!formData[field]) {
        //             isValid = false;
        //             break;
        //         }
        //     }
        //     if (!isValid) {
        //         Swal.fire({
        //             icon: 'error',
        //             title: 'Validation Error',
        //             text: 'Please fill in all mandatory fields.',
        //         });
        //         return;
        //     }
        //     if (formData.consignee_tab === 'default-tab') {
        //         formData.consignee_id = parseInt({{ Auth::user()->id }});
        //         formData.default_name = document.querySelector('input[name="default_name"]').value;
        //         formData.default_company_name = document.querySelector('input[name="default_company_name"]').value;
        //         formData.default_email = document.querySelector('input[name="default_email"]').value;
        //         formData.default_phone_number = document.querySelector('input[name="default_phone_number"]').value;
        //         // formData.default_phone_2 = document.querySelector('input[name="default_phone_2"]').value;
        //         formData.default_address = document.querySelector('input[name="default_address"]').value;
        //         formData.address2 = document.querySelector('input[name="address2"]').value;
        //     } else {
        //         formData.consignee_id = parseInt({{ Auth::user()->id }});
        //         formData.default_name = document.querySelector('input[name="consignee_name"]').value;
        //         formData.default_company_name = document.querySelector('input[name="consignee_company_name"]')
        //             .value;
        //         formData.default_email = document.querySelector('input[name="consignee_email"]').value;
        //         formData.default_phone_number = document.querySelector('input[name="phone_number"]').value;
        //         // formData.default_phone_2 = document.querySelector('input[name="phone_number_2"]').value;
        //         formData.default_address = document.querySelector('input[name="address"]').value;
        //         formData.address2 = document.querySelector('input[name="address2"]').value;
        //     }

        //     if (formData.receiver_tab ===
        //         'receiver_default-tab') { // Use 'receiver_default' instead of 'receiver_default-tab'
        //         formData.receiver_id = parseInt({{ Auth::user()->id }});
        //         formData.receiver_default_name = document.querySelector('input[name="receiver_default_name"]')
        //             .value;
        //         formData.receiver_default_company_name = document.querySelector(
        //             'input[name="receiver_default_company_name"]').value;
        //         formData.receiver_default_email = document.querySelector('input[name="receiver_default_email"]')
        //             .value;
        //         formData.receiver_default_phone_number = document.querySelector(
        //             'input[name="receiver_default_phone_number"]').value;
        //         // formData.receiver_default_phone_2 = document.querySelector('input[name="receiver_default_phone_2"]')
        //         //     .value;
        //         formData.receiver_default_phone_2 = document.querySelector(
        //             'input[name="address2"]').value;
        //         formData.receiver_default_address = document.querySelector('input[name="receiver_default_address"]')
        //             .value;
        //     } else {
        //         formData.receiver_id = parseInt({{ Auth::user()->id }});
        //         formData.receiver_default_name = document.querySelector('input[name="receiver_add_name"]').value;
        //         formData.receiver_default_company_name = document.querySelector(
        //             'input[name="receiver_add_company_name"]').value;
        //         formData.receiver_default_email = document.querySelector('input[name="receiver_add_email"]').value;
        //         formData.receiver_default_phone_number = document.querySelector(
        //             'input[name="receiver_add_phone_number"]').value;
        //         formData.receiver_default_phone_2 = document.querySelector(
        //             'input[name="address2"]').value;
        //         formData.receiver_default_address = document.querySelector('input[name="receiver_add_address"]')
        //             .value;
        //     }

        //     const serviceCheckboxes = document.querySelectorAll('input[name^="service_name"]');
        //     const selectedServiceIds = [];
        //     serviceCheckboxes.forEach(checkbox => {
        //         if (checkbox.checked) {
        //             const matches = checkbox.name.match(/\[(\d+)\]/);
        //             if (matches && matches.length > 1) {
        //                 selectedServiceIds.push(matches[1]);
        //             }
        //         }
        //     });

        //     formData['service_name'] = selectedServiceIds;

        //     formData.deregistration_service = document.getElementById('deregistration_service').checked ? 1 : 0;
        //     formData.english_export_service = document.getElementById('english_export_service').checked ? 1 : 0;
        //     formData.photo_service = document.getElementById('photo_service').checked ? 1 : 0;
        //     formData.ss_custom_photo_service = document.getElementById('ss_custom_photo_service').checked ? 1 : 0;
        //     formData.ss_custom_inspection_service = document.getElementById('ss_custom_inspection_service')
        //         .checked ? 1 : 0;
        //     formData.ss_custom_cleaning_service = document.getElementById('ss_custom_cleaning_service').checked ?
        //         1 : 0;
        //     fetch("{{ route('place_order_shipping') }}", {
        //             method: "POST",
        //             headers: {
        //                 "Content-Type": "application/json",
        //                 "X-CSRF-TOKEN": "{{ csrf_token() }}",
        //             },
        //             body: JSON.stringify(formData),
        //         })
        //         .then(response => response.json())
        //         .then(data => {
        //             if (data && data.message) {
        //                 if (data.shippingOrder) {
        //                     const shippingOrder = data.shippingOrder;
        //                     console.log("Shipping Order:", shippingOrder);
        //                 }

        //                 if (data.message.toLowerCase().includes("success")) {
        //                     // Success message

        //                     Swal.fire({
        //                         icon: 'success',
        //                         title: 'Success',
        //                         text: data.message,
        //                     });
        //                     location.reload();
        //                     window.scrollTo(0, 0);
        //                 } else {
        //                     // Error message
        //                     Swal.fire({
        //                         icon: 'error',
        //                         title: 'Error',
        //                         text: data.message,
        //                     });
        //                 }
        //             } else {
        //                 // Handle cases where the response does not contain the expected data
        //                 Swal.fire({
        //                     icon: 'error',
        //                     title: 'Validation Error',
        //                     text: data.errors.offer_ids,
        //                 });
        //                 return;
        //                 console.error('Invalid response format:', data);
        //             }
        //         })
        //         .catch(error => {
        //             Swal.fire({
        //                 icon: 'error',
        //                 title: 'There was a problem with the fetch operation',
        //                 text: error,
        //             });
        //             return;
        //             console.error('There was a problem with the fetch operation:', error);
        //         });

        // });



        document.getElementById('submitForm').addEventListener('click', function() {
            const mandatoryFields = [
                'offer_ids',
                'service',
                'country',
                'city',
                'container_port'
            ];

            var checkedCheckboxes = $('#exampleModal input[name="offer_ids[]"]:checked');
            var checkedValues = checkedCheckboxes.map(function() {
                return $(this).val();
            }).get();
            if (checkedValues.length === 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select at least one offer!',
                });
                return;
            }

            const formData = {
                offer_ids: checkedValues,
                service: document.getElementById('service').value,
                country: parseInt(document.getElementById('country').value),
                city: parseInt(document.getElementById('city').value),
                container_port: parseInt(document.getElementById('city').value),
                consignee_tab: $('#tabs-nav-consignee #tabs-nav .grey-active').attr('id'),
                receiver_tab: $('#tabs-nav-receiver #tabs-nav .grey-active').attr('id'),
                consignee_id: parseInt({{ Auth::user()->id }}),
                receiver_id: parseInt({{ Auth::user()->id }})
            };
            let isValid = true;
            for (const field of mandatoryFields) {
                if (!formData[field]) {
                    isValid = false;
                    break;
                }
            }
            if (!isValid) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please fill in all mandatory fields.',
                });
                return;
            }
            if (formData.consignee_tab === 'default-tab') {
                formData.consignee_id = parseInt({{ Auth::user()->id }});
                formData.default_name = document.querySelector('input[name="default_name"]').value;
                formData.default_company_name = document.querySelector('input[name="default_company_name"]').value;
                formData.default_email = document.querySelector('input[name="default_email"]').value;
                formData.default_phone_number = document.querySelector('input[name="default_phone_number"]').value;
                // formData.default_phone_2 = document.querySelector('input[name="default_phone_2"]').value;
                formData.default_address = document.querySelector('input[name="default_address"]').value;
                formData.address2 = document.querySelector('input[name="address2"]').value;
            } else {
                formData.consignee_id = parseInt({{ Auth::user()->id }});
                formData.default_name = document.querySelector('input[name="consignee_name"]').value;
                formData.default_company_name = document.querySelector('input[name="consignee_company_name"]')
                    .value;
                formData.default_email = document.querySelector('input[name="consignee_email"]').value;
                formData.default_phone_number = document.querySelector('input[name="phone_number"]').value;
                // formData.default_phone_2 = document.querySelector('input[name="phone_number_2"]').value;
                formData.default_address = document.querySelector('input[name="address"]').value;
                formData.address2 = document.querySelector('input[name="address2"]').value;
            }

            if (formData.receiver_tab ===
                'receiver_default-tab') { // Use 'receiver_default' instead of 'receiver_default-tab'
                formData.receiver_id = parseInt({{ Auth::user()->id }});
                formData.receiver_default_name = document.querySelector('input[name="receiver_default_name"]')
                    .value;
                formData.receiver_default_company_name = document.querySelector(
                    'input[name="receiver_default_company_name"]').value;
                formData.receiver_default_email = document.querySelector('input[name="receiver_default_email"]')
                    .value;
                formData.receiver_default_phone_number = document.querySelector(
                    'input[name="receiver_default_phone_number"]').value;
                // formData.receiver_default_phone_2 = document.querySelector('input[name="receiver_default_phone_2"]')
                //     .value;
                formData.receiver_default_phone_2 = document.querySelector(
                    'input[name="address2"]').value;
                formData.receiver_default_address = document.querySelector('input[name="receiver_default_address"]')
                    .value;
            } else {
                formData.receiver_id = parseInt({{ Auth::user()->id }});
                formData.receiver_default_name = document.querySelector('input[name="receiver_add_name"]').value;
                formData.receiver_default_company_name = document.querySelector(
                    'input[name="receiver_add_company_name"]').value;
                formData.receiver_default_email = document.querySelector('input[name="receiver_add_email"]').value;
                formData.receiver_default_phone_number = document.querySelector(
                    'input[name="receiver_add_phone_number"]').value;
                formData.receiver_default_phone_2 = document.querySelector(
                    'input[name="address2"]').value;
                formData.receiver_default_address = document.querySelector('input[name="receiver_add_address"]')
                    .value;
            }

            const serviceCheckboxes = document.querySelectorAll('input[name^="service_name"]');
            const selectedServiceIds = [];
            serviceCheckboxes.forEach(checkbox => {
                if (checkbox.checked) {
                    const matches = checkbox.name.match(/\[(\d+)\]/);
                    if (matches && matches.length > 1) {
                        selectedServiceIds.push(matches[1]);
                    }
                }
            });

            formData['service_name'] = selectedServiceIds;

            formData.deregistration_service = document.getElementById('deregistration_service').checked ? 1 : 0;
            formData.english_export_service = document.getElementById('english_export_service').checked ? 1 : 0;
            formData.photo_service = document.getElementById('photo_service').checked ? 1 : 0;
            formData.ss_custom_photo_service = document.getElementById('ss_custom_photo_service').checked ? 1 : 0;
            formData.ss_custom_inspection_service = document.getElementById('ss_custom_inspection_service')
                .checked ? 1 : 0;
            formData.ss_custom_cleaning_service = document.getElementById('ss_custom_cleaning_service').checked ?
                1 : 0;

            for (const field of mandatoryFields) {
                if (!formData[field]) {
                    isValid = false;
                    break;
                }
            }
            if (!isValid) {
                Swal.fire({
                    icon: 'error',
                    title: 'Validation Error',
                    text: 'Please fill in all mandatory fields.',
                });
                return;
            }

            // Confirmation dialog before sending offer
            Swal.fire({
                icon: 'warning',
                title: 'Confirmation',
                text: 'Are you sure you want to send this offer?',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with sending the offer
                    sendOffer(formData);
                }
            });
        });

        function sendOffer(formData) {
            fetch("{{ route('place_order_shipping') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    body: JSON.stringify(formData),
                })
                .then(response => response.json())
                .then(data => {
                    if (data && data.message) {
                        if (data.shippingOrder) {
                            const shippingOrder = data.shippingOrder;
                            console.log("Shipping Order:", shippingOrder);
                        }

                        if (data.message.toLowerCase().includes("success")) {
                            // Success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: data.message,
                            });
                            location.reload();
                            window.scrollTo(0, 0);
                        } else {
                            // Error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: data.message,
                            });
                        }
                    } else {
                        // Handle cases where the response does not contain the expected data
                        Swal.fire({
                            icon: 'error',
                            title: 'Validation Error',
                            text: data.errors.offer_ids,
                        });
                        console.error('Invalid response format:', data);
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'There was a problem with the fetch operation',
                        text: error,
                    });
                    console.error('There was a problem with the fetch operation:', error);
                });
        }




        jQuery(document).ready(function() {
            ImgUpload();
        });

        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html =
                                        "<div class='upload__img-box'><div style='background-image: url(" +
                                        e.target.result + ")' data-number='" + $(
                                            ".upload__img-close").length + "' data-file='" + f
                                        .name +
                                        "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
        let items = document.querySelectorAll('.carousel .carousel-item')

        items.forEach((el) => {
            const minPerSlide = 4
            let next = el.nextElementSibling
            for (var i = 1; i < minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
    </script>
</body>

</html>
