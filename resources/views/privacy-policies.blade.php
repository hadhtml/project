<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link href="{{asset('public/assetsindex/assets/css/bootstrap.min.css')}}" rel="stylesheet" />

        <link href="{{asset('public/assetsindex/assets/css/bootstrap-icons.css')}}" rel="stylesheet" />

        <link rel="stylesheet" href="{{asset('public/assetsindex/assets/css/swiper-bundle.min.css')}}" />

        <link rel="stylesheet" href="{{asset('public/assetsindex/assets/css/nice-select.css')}}" />

        <link rel="stylesheet" href="{{asset('public/assetsindex/assets/css/animate.min.css')}}" />
        <link rel="stylesheet" href="{{asset('public/assetsindex/assets/css/jquery.fancybox.min.css')}}" />

        <link href="{{asset('public/assetsindex/assets/css/boxicons.min.css" rel="stylesheet')}}" />
        <link rel="stylesheet" href="{{asset('public/assetsindex/assets/css/style.css')}}" />

        <title>Privacy & Policies</title>
        <link rel="icon" href="{{asset('public/assetsindex/assets/img/logo2.png')}}" type="image/gif" sizes="20x20" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    </head>
    <style>
        .nav-tabs {
            border-width: 0; /* Removes the border width */
        }
    </style>
    <body id="body" class="tt-smooth-scroll tt-magic-cursor">
        <div id="magic-cursor">
            <div id="ball"></div>
        </div>

        <div class="circle-container three">
            <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <g>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.03516 0.416666L7.03516 15H8.28516L8.28516 0.416666H7.03516Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.28516 1.04115C8.28516 3.98115 5.70016 6.38281 2.94349 6.38281H2.31849V5.13281H2.94349C5.03599 5.13281 7.03516 3.26448 7.03516 1.04115V0.416979H8.28516V1.04115Z" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.03333 1.04115C7.03333 3.98115 9.61833 6.38281 12.375 6.38281H13V5.13281H12.375C10.2817 5.13281 8.28333 3.26448 8.28333 1.04115V0.416979H7.03333V1.04115Z" />
                </g>
            </svg>
        </div>

        <div class="sidebar-area">
            <div class="sidebar-menu-top-area two">
                <div class="sidebar-menu-logo">
                    <a class="logo-light" href="index.html"><img alt="image" class="img-fluid" src="{{asset('public/assetsindex/assets/img/logo.png')}}" /></a>
                </div>
                <div class="nav-right d-flex jsutify-content-end align-items-center">
                    <div class="sidebar-menu-close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M18 0L11.1686 8.99601L18 18L9.0041 11.1605L0 18L6.83156 8.99601L0 0L9.0041 6.83156L18 0Z"></path>
                        </svg>
                    </div>
                    <a href="#" class="header-btn btn-hover">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                            <path
                                d="M1.82326 6.42493C4.49302 5.27479 6.44651 2.87535 6.98915 0C7.53178 2.87535 9.48527 5.27479 12.1767 6.42493C12.6977 6.64306 14 7 14 7C14 7 12.6977 7.35694 12.1767 7.57507C9.50698 8.74504 7.55349 11.1246 6.98915 14C6.44651 11.1445 4.49302 8.74504 1.82326 7.5949C1.30233 7.35694 0 7.01983 0 7.01983C0 7.01983 1.30233 6.66289 1.82326 6.42493Z"
                            />
                        </svg>
                        Get in Touch
                        <span></span>
                    </a>
                </div>
            </div>
            <div class="container">
                <div class="row g-lg-4 gy-5">
                    <div class="col-lg-8 order-lg-2 order-1">
                        <div class="sidebar-menu-wrap">
                            <ul class="main-menu">
                                <li>
                                    <a href="url('/')">Home</a>
                                </li>
                                <li>
                                    <a href="#">FAQ's</a>
                                </li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('site-components.header')

        <div class="breadcrumb-section" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{asset('public/assetsindex/assets/img/innerpage/breadcrumb-bg3.jpg')}}');">
            <svg class="vector" xmlns="http://www.w3.org/2000/svg" width="300" height="374" viewBox="0 0 300 374" fill="none">
                <path d="M49.999 359.57C49.999 530.694 188.228 669.14 358.399 669.14C528.57 669.14 666.799 530.694 666.799 359.57C666.799 188.445 528.57 50 358.399 50C188.228 50 49.999 188.445 49.999 359.57Z" stroke-width="100" />
            </svg>
            <div class="container">
                <div class="banner-wrapper">
                    <div class="banner-content">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="section-title white">
                                    <h1><span>Privacy Policy of OutcomeMet</span></h1>
                                </div>
                            </div>
                            <div class="col-lg-7 d-flex align-items-end">
                                <div class="dash-and-paragraph">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 338 44">
                                        <path
                                            d="M0.333333 3C0.333333 4.47276 1.52724 5.66667 3 5.66667C4.47276 5.66667 5.66667 4.47276 5.66667 3C5.66667 1.52724 4.47276 0.333333 3 0.333333C1.52724 0.333333 0.333333 1.52724 0.333333 3ZM337.001 3L337.163 3.47297C337.394 3.3937 337.534 3.15889 337.494 2.9178C337.454 2.67671 337.245 2.5 337.001 2.5V3ZM324.001 44L324.222 38.2307L319.115 40.924L324.001 44ZM3 3.5H337.001V2.5H3V3.5ZM336.839 2.52703C328.657 5.33201 323.03 10.8388 320.343 17.6231C317.657 24.4031 317.923 32.4183 321.444 40.223L322.356 39.8117C318.933 32.2249 318.697 24.4919 321.272 17.9914C323.846 11.4951 329.241 6.18899 337.163 3.47297L336.839 2.52703Z"
                                        />
                                    </svg>
                                    <div class="btn-and-paragraph">
                                        <p>In order to receive information about your Personal Data, the purposes and the parties the Data is shared with, contact the Owner.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="breadcrumb-list">
                        <li><a href="https://demo-egenslab.b-cdn.net/">Home</a></li>
                        <li>Privacy & Policies</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="terms-and-conditions-page pt-130 mb-130">
            <div class="container-lg container-fluid">
                <div class="row">
                    <div class="col-lg-12 mb-40">
                        <div class="terms-and-conditions">
                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Owner and Data Controller</h4>
                                    <p>
                                        OutcomeMet Limited, 128 City Road, London, United Kingdom, EC1V 2NX
                                    </p>

                                    <p>
                                        Owner contact email: support@outcomemet.co.uk
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Types of Data collected</h4>
                                    <p>
                                        The owner does not provide a list of Personal Data types collected.
                                    </p>

                                    <p>
                                        Complete details on each type of Personal Data collected are provided in the dedicated sections of this privacy policy or by specific explanation texts displayed prior to the Data collection. Personal
                                        Data may be freely provided by the User, or, in case of Usage Data, collected automatically when using this Application.
                                    </p>
                                    <p>
                                        Unless specified otherwise, all Data requested by this Application is mandatory and failure to provide this Data may make it impossible for this Application to provide its services. In cases where
                                        this Application specifically states that some Data is not mandatory, Users are free not to communicate this Data without consequences to the availability or the functioning of the Service.
                                    </p>
                                    <p>
                                        Users who are uncertain about which Personal Data is mandatory are welcome to contact the Owner. Any use of Cookies – or of other tracking tools — by this Application or by the owners of third-party
                                        services used by this Application serves the purpose of providing the Service required by the User, in addition to any other purposes described in the present document and in the Cookie Policy. Users
                                        are responsible for any third-party Personal Data obtained, published or shared through this Application.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Mode and place of processing the Data</h4>
                                    <b>Methods of processing</b>
                                    <p>
                                        The Owner takes appropriate security measures to prevent unauthorised access, disclosure, modification, or unauthorised destruction of the Data.
                                    </p>

                                    <p>
                                        The Data processing is carried out using computers and/or IT enabled tools, following organisational procedures and modes strictly related to the purposes indicated. In addition to the Owner, in some
                                        cases, the Data may be accessible to certain types of persons in charge, involved with the operation of this Application (administration, sales, marketing, legal, system administration) or external
                                        parties (such as third-party technical service providers, mail carriers, hosting providers, IT companies, communications agencies) appointed, if necessary, as Data Processors by the Owner. The updated
                                        list of these parties may be requested from the Owner at any time.
                                    </p>
                                    <b>Place</b>
                                    <p>The Data is processed at the Owner's operating offices and in any other places where the parties involved in the processing are located.</p>
                                    <p>
                                        Depending on the User's location, data transfers may involve transferring the User's Data to a country other than their own. To find out more about the place of processing of such transferred Data,
                                        Users can check the section containing details about the processing of Personal Data.
                                    </p>
                                    <b>Retention time</b>
                                    <p>
                                        Unless specified otherwise in this document, Personal Data shall be processed and stored for as long as required by the purpose they have been collected for and may be retained for longer due to
                                        applicable legal obligation or based on the Users’ consent.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Cookie Policy</h4>
                                    <p>
                                        This Application uses Trackers. To learn more, Users may consult the Cookie Policy.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Further Information for Users</h4>
                                    <b>Legal basis of processing</b>
                                    <p>
                                        The Owner may process Personal Data relating to Users if one of the following applies:
                                    </p>
                                    <ul>
                                        <li>Users have given their consent for one or more specific purposes.</li>
                                        <li>provision of Data is necessary for the performance of an agreement with the User and/or for any pre-contractual obligations thereof;</li>
                                        <li>processing is necessary for compliance with a legal obligation to which the Owner is subject;</li>
                                        <li>processing is related to a task that is carried out in the public interest or in the exercise of official authority vested in the Owner;</li>
                                        <li>processing is necessary for the purposes of the legitimate interests pursued by the Owner or by a third party.</li>
                                    </ul>
                                    <p>
                                        In any case, the Owner will gladly help to clarify the specific legal basis that applies to the processing, and in particular whether the provision of Personal Data is a statutory or contractual
                                        requirement, or a requirement necessary to enter into a contract.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Further information about retention time</h4>
                                    <p>
                                        Unless specified otherwise in this document, Personal Data shall be processed and stored for as long as required by the purpose they have been collected for and may be retained for longer due to
                                        applicable legal obligation or based on the Users’ consent. Therefore:
                                    </p>
                                    <ul>
                                        <li>Personal Data collected for purposes related to the performance of a contract between the Owner and the User shall be retained until such contract has been fully performed.</li>
                                        <li>
                                            Personal Data collected for the purposes of the Owner’s legitimate interests shall be retained as long as needed to fulfill such purposes. Users may find specific information regarding the
                                            legitimate interests pursued by the Owner within the relevant sections of this document or by contacting the Owner.
                                        </li>
                                    </ul>
                                    <p>
                                        The Owner may be allowed to retain Personal Data for a longer period whenever the User has given consent to such processing, as long as such consent is not withdrawn. Furthermore, the Owner may be
                                        obliged to retain Personal Data for a longer period whenever required to fulfil a legal obligation or upon order of an authority.
                                    </p>
                                    <p>
                                        Once the retention period expires, Personal Data shall be deleted. Therefore, the right of access, the right to erasure, the right to rectification and the right to data portability cannot be enforced
                                        after expiration of the retention period.
                                    </p>

                                    <b>The rights of Users based on the General Data Protection Regulation (GDPR)</b>
                                    <p>Users may exercise certain rights regarding their Data processed by the Owner.</p>
                                    <p>In particular, Users have the right to do the following, to the extent permitted by law:</p>

                                    <ul>
                                        <li><strong>● Withdraw their consent at any time.</strong>Users have the right to withdraw consent where they have previously given their consent to the processing of their Personal Data.</li>
                                        <li><strong>● Object to processing of their Data. </strong>Users have the right to object to the processing of their Data if the processing is carried out on a legal basis other than consent.</li>
                                        <li>
                                            <strong>● Access their Data. </strong>Users have the right to learn if Data is being processed by the Owner, obtain disclosure regarding certain aspects of the processing and obtain a copy of the
                                            Data undergoing processing.
                                        </li>
                                        <li><strong>● Verify and seek rectification. </strong>Users have the right to verify the accuracy of their Data and ask for it to be updated or corrected.</li>
                                        <li>
                                            <strong>● Restrict the processing of their Data.</strong>Users have the right to restrict the processing of their Data. In this case, the Owner will not process their Data for any purpose other
                                            than storing it.
                                        </li>
                                        <li><strong>● Have their Personal Data deleted or otherwise removed.</strong>Users have the right to obtain the erasure of their Data from the Owner.</li>
                                        <li>
                                            <strong>● Receive their Data and have it transferred to another controller. </strong>Users have the right to receive their Data in a structured, commonly used and machine readable format and, if
                                            technically feasible, to have it transmitted to another controller without any hindrance.
                                        </li>
                                        <li><strong>● Lodge a complaint. </strong> Users have the right to bring a claim before their competent data protection authority.</li>
                                    </ul>
                                    <p>
                                        Users are also entitled to learn about the legal basis for Data transfers abroad, including to any international organisation governed by public international law or set up by two or more countries,
                                        such as the UN, and about the security measures taken by the Owner to safeguard their Data.
                                    </p>

                                    <b>Details about the right to object to processing</b>
                                    <p>
                                        Where Personal Data is processed for a public interest, in the exercise of an official authority vested in the Owner or for the purposes of the legitimate interests pursued by the Owner, Users may
                                        object to such processing by providing a ground related to their particular situation to justify the objection.
                                    </p>
                                    <p>
                                        Users must know that, however, should their Personal Data be processed for direct marketing purposes, they can object to that processing at any time, free of charge and without providing any
                                        justification. Where the User objects to processing for direct marketing purposes, the Personal Data will no longer be processed for such purposes. To learn whether the Owner is processing Personal
                                        Data for direct marketing purposes, Users may refer to the relevant sections of this document.
                                    </p>
                                    <b>How to exercise these rights</b>
                                    <p>
                                        Any requests to exercise User rights can be directed to the Owner through the contact details provided in this document. Such requests are free of charge and will be answered by the Owner as early as
                                        possible and always within one month, providing Users with the information required by law. Any rectification or erasure of Personal Data or restriction of processing will be communicated by the Owner
                                        to each recipient, if any, to whom the Personal Data has been disclosed unless this proves impossible or involves disproportionate effort. At the Users’ request, the Owner will inform them about those
                                        recipients.
                                    </p>
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-lg-12">
                                    <h4>Additional information about Data collection and processing</h4>
                                    <b>Legal action</b>
                                    <p>
                                        The User's Personal Data may be used for legal purposes by the Owner in Court or in the stages leading to possible legal action arising from improper use of this Application or the related Services.
                                        The User declares to be aware that the Owner may be required to reveal personal data upon request of public authorities.
                                    </p>
                                    <b>Additional information about User's Personal Data</b>
                                    <p>
                                        In addition to the information contained in this privacy policy, this Application may provide the User with additional and contextual information concerning particular Services or the collection and
                                        processing of Personal Data upon request.
                                    </p>
                                    <b>System logs and maintenance</b>
                                    <p>
                                        For operation and maintenance purposes, this Application and any third-party services may collect files that record interaction with this Application (System logs) or use other Personal Data (such as
                                        the IP Address) for this purpose.
                                    </p>

                                    <b>Information not contained in this policy</b>
                                    <p>
                                        More details concerning the collection or processing of Personal Data may be requested from the Owner at any time. Please see the contact information at the beginning of this document.
                                    </p>

                                    <b>Changes to this privacy policy</b>
                                    <p>
                                        The Owner reserves the right to make changes to this privacy policy at any time by notifying its Users on this page and possibly within this Application and/or - as far as technically and legally
                                        feasible - sending a notice to Users via any contact information available to the Owner. It is strongly recommended to check this page often, referring to the date of the last modification listed at
                                        the bottom.
                                    </p>

                                    <p>Should the changes affect processing activities performed on the basis of the User’s consent, the Owner shall collect new consent from the User, where required.</p>

                                    <h3>Definitions and legal references</h3>
                                    <b>Personal Data (or Data)</b>
                                    <p>
                                        Any information that directly, indirectly, or in connection with other information — including a personal identification number — allows for the identification or identifiability of a natural person.
                                    </p>

                                    <b>Usage Data</b>
                                    <p>
                                        Information collected automatically through this Application (or third-party services employed in this Application), which can include: the IP addresses or domain names of the computers utilised by
                                        the Users who use this Application, the URI addresses (Uniform Resource Identifier), the time of the request, the method utilised to submit the request to the server, the size of the file received in
                                        response, the numerical code indicating the status of the server's answer (successful outcome, error, etc.), the country of origin, the features of the browser and the operating system utilised by the
                                        User, the various time details per visit (e.g., the time spent on each page within the Application) and the details about the path followed within the Application with special reference to the
                                        sequence of pages visited, and other parameters about the device operating system and/or the User's IT environment.
                                    </p>

                                    <b>User</b>
                                    <p>
                                        The individual using this Application who, unless otherwise specified, coincides with the Data Subject.
                                    </p>

                                    <b>Data Subject</b>
                                    <p>
                                        The natural person to whom the Personal Data refers.
                                    </p>

                                    <b>Data Processor (or Processor)</b>
                                    <p>
                                        The natural or legal person, public authority, agency or other body which processes Personal Data on behalf of the Controller, as described in this privacy policy.
                                    </p>

                                    <b>Data Controller (or Owner)</b>
                                    <p>
                                        The natural or legal person, public authority, agency or other body which, alone or jointly with others, determines the purposes and means of the processing of Personal Data, including the security
                                        measures concerning the operation and use of this Application. The Data Controller, unless otherwise specified, is the Owner of this Application.
                                    </p>

                                    <b>This Application</b>
                                    <p>
                                        The means by which the Personal Data of the User is collected and processed.
                                    </p>

                                    <b>Service</b>
                                    <p>
                                        The service provided by this Application as described in the relative terms (if available) and on this site/application.
                                    </p>

                                    <b>European Union (or EU)</b>
                                    <p>
                                        Unless otherwise specified, all references made within this document to the European Union include all current member states to the European Union and the European Economic Area.
                                    </p>

                                    <b>Legal information</b>
                                    <p>
                                        This privacy policy relates solely to this Application, if not stated otherwise within this document. Latest update: 23 May 2024
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Call to action -->

        @include('site-components.cta')

        <!-- Footer -->

        @include('site-components.footer')

        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
        <script src="{{asset('public/assetsindex/assets/js/jquery-3.7.1.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/popper.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/bootstrap.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/swiper-bundle.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/slick.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/waypoints.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/jquery.counterup.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/jquery.nice-select.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/jquery.fancybox.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/imagesloaded.pkgd.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/gsap.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/ScrollTrigger.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/SmoothScroll.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/simpleParallax.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/TweenMax.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/SplitText.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/DrawSVGPlugin3.min.js')}}"></script>

        <script src="{{asset('public/assetsindex/assets/js/jquery.marquee.min.js')}}"></script>
        <script src="{{asset('public/assetsindex/assets/js/main.js')}}"></script>

        <script>
            function SaveContact() {
                var name = $("#name").val();
                var email = $("#email").val();
                var phone = $("#number").val();
                var comment = $("#comment").val();

                var response = grecaptcha.getResponse();
                if (response.length == 0) {
                    e.preventDefault();
                    return false;
                } else {
                }

                if ($("input[type=checkbox]").is(":checked")) {
                    $(this).prop("checked", true);
                } else {
                    return false;
                }
                $.ajax({
                    type: "POST",
                    url: "{{ url('save-contact') }}",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        comment: comment,
                    },
                    success: function (res) {
                        $("#name").val("");
                        $("#email").val("");
                        $("#number").val("");
                        $("#comment").val("");
                        $('input[type="checkbox"]').prop("checked", false);
                        grecaptcha.reset();
                        $("#error").html('<div class="alert alert-success" role="alert"> Contact Submitted Successfully</div>');
                        $("#epic-feild-error").html("");
                        setTimeout(function () {
                            $("#error").html("");
                        }, 3000);
                    },
                });
            }

            $("#faq").click(function () {
                $("html, body").animate(
                    {
                        scrollTop: $("#faqs").offset().top,
                    },
                    2000
                );
            });

            $("#contact").click(function () {
                $("html, body").animate(
                    {
                        scrollTop: $("#contactus").offset().top,
                    },
                    2000
                );
            });

            $("#about").click(function () {
                $("html, body").animate(
                    {
                        scrollTop: $(".feature").offset().top,
                    },
                    2000
                );
            });
        </script>
    </body>
</html>
