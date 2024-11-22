<div class="nftmax-smenu">
    <!-- Admin Menu -->
    <div class="admin-menu">
        <!-- Logo -->
        <div class="logo">
            <img class="nftmax-logo__main" src="img/logo11.png" alt="#" style="width: 150px; height: 150px;">

            <a href="index.html">
                <img class="nftmax-logo__main" src="img/UTIC.png" alt="#">
            </a>
            <div class="nftmax__sicon close-icon"><img src="img/menu-toggle.svg" alt="#"></div>

        </div>
        <!-- Author Details -->
        <div class="admin-menu__one">
            <h4 class="admin-menu__title nftmax-scolor">Menu</h4>
            <!-- Nav Menu -->
            <div class="menu-bar">
                <ul class="menu-bar__one">

                    <li class="{{ Route::is('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"><span
                                class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v1"><svg
                                        class="nftmax-svg-icon" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" viewBox="0 0 16 16">
                                        <path
                                            d="M0.800781 2.60005V7.40005H7.40078V0.800049H2.60078C2.12339 0.800049 1.66555 0.989691 1.32799 1.32726C0.990424 1.66482 0.800781 2.12266 0.800781 2.60005H0.800781Z">
                                        </path>
                                        <path
                                            d="M13.4016 0.800049H8.60156V7.40005H15.2016V2.60005C15.2016 2.12266 15.0119 1.66482 14.6744 1.32726C14.3368 0.989691 13.879 0.800049 13.4016 0.800049V0.800049Z">
                                        </path>
                                        <path
                                            d="M0.800781 13.4001C0.800781 13.8775 0.990424 14.3353 1.32799 14.6729C1.66555 15.0105 2.12339 15.2001 2.60078 15.2001H7.40078V8.6001H0.800781V13.4001Z">
                                        </path>
                                        <path
                                            d="M8.60156 15.2001H13.4016C13.879 15.2001 14.3368 15.0105 14.6744 14.6729C15.0119 14.3353 15.2016 13.8775 15.2016 13.4001V8.6001H8.60156V15.2001Z">
                                        </path>
                                    </svg></span><span class="menu-bar__name">Dashboard</span></span></a></li>

                    {{-- USUARIO --}}
                    <li class="{{ Route::is('usuarios.index') ? 'active' : '' }}">
                        <a href="{{ route('usuarios.index') }}">
                            <span class="menu-bar__name">Usuario</span>
                        </a>
                    </li>


                    <li class="{{ Route::is('prueba') ? 'active' : '' }}"><a href="{{ route('prueba') }}">
                            <span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v2"><svg><li>
                                        class="{{ Route::is('prueba') ? 'active' : '' }}"><a
                                            href="{{ route('prueba') }}"><span><li
                                                class="{{ Route::is('area.index') ? 'active' : '' }}"><a
                                                    href="{{ route('area.index') }}"><span class="menu-bar__text"><span
                                                            class="nftmax-menu-icon nftmax-svg-icon__v2"><svg
                                                                class="nftmax-svg-icon" viewBox="0 0 16 16"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M8.40093 8.39892C8.07534 8.74593 7.8023 9.13874 7.59052 9.56484L13.3422 15.3165C13.4732 15.4475 13.651 15.5211 13.8362 15.5211C14.0215 15.5211 14.1992 15.4475 14.3303 15.3165L15.3185 14.3283C15.3834 14.2634 15.4349 14.1864 15.47 14.1016C15.5052 14.0168 15.5232 13.9259 15.5232 13.8342C15.5232 13.7424 15.5052 13.6515 15.47 13.5667C15.4349 13.482 15.3834 13.4049 15.3185 13.34L9.56685 7.5899C9.13999 7.79984 8.74699 8.07254 8.40093 8.39892Z">
                                                                </path>
                                                                <path
                                                                    d="M4.94216 4.94003C4.41373 5.43043 3.80202 5.8226 3.1358 6.09809L6.74747 9.70976C7.02543 9.04469 7.41799 8.43359 7.90728 7.90427C8.43576 7.4139 9.04746 7.02168 9.71363 6.74604L6.10179 3.13507C5.82373 3.79989 5.43125 4.41079 4.94216 4.94003Z">
                                                                </path>
                                                                <path
                                                                    d="M7.4116 0.494075L6.42351 1.48216C6.15066 1.75501 6.15066 2.19739 6.42351 2.47024L10.3758 6.42256C10.6487 6.69541 11.0911 6.69541 11.3639 6.42256L12.352 5.43448C12.6249 5.16163 12.6249 4.71925 12.352 4.4464L8.39968 0.494075C8.12683 0.221224 7.68445 0.221224 7.4116 0.494075Z">
                                                                </path>
                                                                <path
                                                                    d="M1.48209 6.42236L0.49401 7.41044C0.221159 7.68329 0.221159 8.12567 0.49401 8.39852L4.44633 12.3508C4.71919 12.6237 5.16156 12.6237 5.43441 12.3508L6.4225 11.3628C6.69535 11.0899 6.69535 10.6475 6.4225 10.3747L2.47017 6.42236C2.19732 6.14951 1.75494 6.14951 1.48209 6.42236Z">
                                                                </path>
                                                            </svg></span><span
                                                            class="menu-bar__name">Area</span></span></a></li>

                    <li class="{{ Route::is('curso') ? 'active' : '' }}"><a href="{{ route('curso') }}"><span
                                class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v2"><svg
                                        class="nftmax-svg-icon" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.40093 8.39892C8.07534 8.74593 7.8023 9.13874 7.59052 9.56484L13.3422 15.3165C13.4732 15.4475 13.651 15.5211 13.8362 15.5211C14.0215 15.5211 14.1992 15.4475 14.3303 15.3165L15.3185 14.3283C15.3834 14.2634 15.4349 14.1864 15.47 14.1016C15.5052 14.0168 15.5232 13.9259 15.5232 13.8342C15.5232 13.7424 15.5052 13.6515 15.47 13.5667C15.4349 13.482 15.3834 13.4049 15.3185 13.34L9.56685 7.5899C9.13999 7.79984 8.74699 8.07254 8.40093 8.39892Z">
                                        </path>
                                        <path
                                            d="M4.94216 4.94003C4.41373 5.43043 3.80202 5.8226 3.1358 6.09809L6.74747 9.70976C7.02543 9.04469 7.41799 8.43359 7.90728 7.90427C8.43576 7.4139 9.04746 7.02168 9.71363 6.74604L6.10179 3.13507C5.82373 3.79989 5.43125 4.41079 4.94216 4.94003Z">
                                        </path>
                                        <path
                                            d="M7.4116 0.494075L6.42351 1.48216C6.15066 1.75501 6.15066 2.19739 6.42351 2.47024L10.3758 6.42256C10.6487 6.69541 11.0911 6.69541 11.3639 6.42256L12.352 5.43448C12.6249 5.16163 12.6249 4.71925 12.352 4.4464L8.39968 0.494075C8.12683 0.221224 7.68445 0.221224 7.4116 0.494075Z">
                                        </path>
                                        <path
                                            d="M1.48209 6.42236L0.49401 7.41044C0.221159 7.68329 0.221159 8.12567 0.49401 8.39852L4.44633 12.3508C4.71919 12.6237 5.16156 12.6237 5.43441 12.3508L6.4225 11.3628C6.69535 11.0899 6.69535 10.6475 6.4225 10.3747L2.47017 6.42236C2.19732 6.14951 1.75494 6.14951 1.48209 6.42236Z">
                                        </path>
                                    </svg></span><span class="menu-bar__name">Cursos</span></span></a></li>

                    <li class="{{ Route::is('expositor') ? 'active' : '' }}"><a href="{{ route('expositor') }}"><span
                                class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v6"><svg
                                        class="nftmax-svg-icon" viewBox="0 0 16 13"xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.7481 5.26312C13.5414 5.97928 13.3729 6.66044 13.1345 7.31719C13.0759 7.47914 12.7927 7.65899 12.6104 7.66062C10.4807 7.68503 8.3509 7.67689 6.22115 7.67771C5.90621 7.67771 5.7052 7.52227 5.63277 7.22116C5.29585 5.81082 4.95567 4.4013 4.63422 2.9877C4.53656 2.56045 4.73106 2.29677 5.14285 2.29433C6.87872 2.28294 8.61377 2.28945 10.3928 2.28945C10.3716 3.2115 10.6231 4.01636 11.3205 4.63079C12.0049 5.23464 12.813 5.41531 13.7481 5.26312Z">
                                        </path>
                                        <path
                                            d="M5.19379 8.17081C6.62692 8.17081 8.03482 8.17081 9.44271 8.17081C10.364 8.17081 11.286 8.16837 12.2072 8.17162C12.6361 8.17325 12.8803 8.36531 12.8917 8.69735C12.9039 9.04729 12.6524 9.25969 12.2056 9.25969C9.7658 9.26132 7.3268 9.26132 4.88699 9.25969C4.393 9.25888 4.25547 9.13925 4.14723 8.63957C3.68336 6.49598 3.21623 4.3524 2.76131 2.20718C2.70759 1.9549 2.60912 1.8133 2.34952 1.73354C1.75462 1.55125 1.17112 1.33152 0.584356 1.124C0.0911849 0.949842 -0.0911093 0.683725 0.0423561 0.34111C0.174194 0.00256369 0.46147 -0.0828867 0.929413 0.0798759C1.65859 0.332972 2.38126 0.605599 3.11694 0.834281C3.48804 0.949842 3.66545 1.15981 3.74439 1.53579C4.19362 3.66879 4.66075 5.79854 5.12218 7.92911C5.13683 7.9934 5.16043 8.05687 5.19379 8.17081Z">
                                        </path>
                                        <path
                                            d="M10.7344 2.61573C10.7271 1.28596 11.8054 0.206025 13.1352 0.210094C14.4381 0.214164 15.5107 1.29654 15.5082 2.60596C15.5066 3.91213 14.4291 4.99125 13.1246 4.9945C11.82 4.99694 10.7417 3.92434 10.7344 2.61573ZM14.1402 1.55533C13.7089 2.01839 13.2849 2.47168 12.782 3.01124C12.5411 2.6849 12.3474 2.42285 12.1252 2.12174C11.9022 2.35612 11.7549 2.50993 11.6589 2.61084C12.0666 3.03159 12.4564 3.43442 12.817 3.80552C13.4013 3.21958 14.0027 2.61654 14.6554 1.96223C14.5488 1.8776 14.421 1.77587 14.2932 1.67414C14.2533 1.64241 14.2118 1.61067 14.1402 1.55533Z">
                                        </path>
                                        <path
                                            d="M11.6107 9.7032C12.4571 9.69506 13.1464 10.3599 13.1618 11.1998C13.1781 12.0535 12.4847 12.7542 11.6245 12.7542C10.7847 12.7542 10.097 12.0714 10.0938 11.2348C10.0913 10.3933 10.7668 9.71134 11.6107 9.7032ZM12.3024 11.2234C12.3008 10.8523 12.0103 10.552 11.6441 10.5439C11.2648 10.5349 10.9483 10.8482 10.9507 11.2307C10.9531 11.5978 11.2486 11.9029 11.6107 11.9119C11.9899 11.9217 12.3041 11.6091 12.3024 11.2234Z">
                                        </path>
                                        <path
                                            d="M5.41555 12.7526C4.57082 12.7461 3.8921 12.0665 3.89454 11.2291C3.89698 10.364 4.58221 9.69181 5.45218 9.70239C6.29122 9.71216 6.96506 10.4039 6.95448 11.2454C6.94471 12.0877 6.25867 12.7591 5.41555 12.7526ZM6.1016 11.2299C6.10241 10.845 5.78828 10.5349 5.40579 10.5447C5.04527 10.5536 4.73846 10.8661 4.73765 11.2234C4.73683 11.5831 5.0412 11.8981 5.40009 11.9103C5.78014 11.9241 6.10079 11.6132 6.1016 11.2299Z">
                                        </path>
                                    </svg></span><span class="menu-bar__name">Expositor</span></span></a></li>
                    <li><a href="saved.html"><span class="menu-bar__text"><span
                                    class="nftmax-menu-icon nftmax-svg-icon__v7"><svg class="nftmax-svg-icon"
                                        viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3.79296 0C4.44956 0.010169 5.09184 0.192671 5.65493 0.529075C6.21803 0.86548 6.682 1.34387 7 1.91595C7.318 1.34387 7.78197 0.86548 8.34507 0.529075C8.90816 0.192671 9.55044 0.010169 10.207 0C11.2537 0.0452807 12.2399 0.501197 12.9501 1.26814C13.6602 2.03509 14.0367 3.05073 13.9972 4.09316C13.9972 8.02666 7.60875 12.5698 7.33703 12.7625L7 13L6.66297 12.7625C6.39125 12.5709 0.00282288 8.02666 0.00282288 4.09316C-0.0366831 3.05073 0.339771 2.03509 1.04994 1.26814C1.76011 0.501197 2.74626 0.0452807 3.79296 0Z">
                                        </path>
                                    </svg></span><span class="menu-bar__name">Saved</span><span
                                    class="menu-bar__count ntfmax__bgc--7">32</span></span></a></li>
                    <li><a href="chat-messages.html"><span class="menu-bar__text"><span
                                    class="nftmax-menu-icon nftmax-svg-icon__v8"><svg class="nftmax-svg-icon"
                                        viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.9729 3L9.06236 7.82172C7.92242 8.93841 6.07703 8.93841 4.93709 7.82172L0.0267964 3C0.0185934 3.09048 0 3.17238 0 3.26232V10.1359C0.00191403 11.7168 1.30673 12.9981 2.9167 13H11.0833C12.6933 12.9981 13.9981 11.7168 14 10.1359V3.26232C13.9997 3.17238 13.9811 3.09048 13.9729 3Z">
                                        </path>
                                        <path
                                            d="M8.31954 6.50593L14 1.35845C13.4403 0.517707 12.4369 0.00264136 11.353 0H2.64666C1.5631 0.00264136 0.559417 0.517707 0 1.35845L5.68046 6.50593C6.40983 7.16469 7.58988 7.16469 8.31954 6.50593Z">
                                        </path>
                                    </svg></span><span class="menu-bar__name">Message</span><span
                                    class="menu-bar__count  ntfmax__bgc--3">19</span></span></a></li>
                    <li><a href="history.html"><span class="menu-bar__text"><span
                                    class="nftmax-menu-icon nftmax-svg-icon__v9"><svg class="nftmax-svg-icon"
                                        viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M9.37855 15.6715C10.5752 15.6715 11.745 15.3166 12.74 14.6518C13.7349 13.987 14.5104 13.042 14.9684 11.9365C15.4263 10.8309 15.5461 9.61436 15.3127 8.4407C15.0792 7.26704 14.503 6.18896 13.6568 5.3428C12.8107 4.49664 11.7326 3.92039 10.5589 3.68694C9.38526 3.45348 8.16873 3.5733 7.06316 4.03124C5.9576 4.48918 5.01266 5.26467 4.34783 6.25966C3.683 7.25464 3.32816 8.42442 3.32816 9.62107C3.33057 11.225 3.9688 12.7625 5.10295 13.8967C6.23709 15.0308 7.77463 15.669 9.37855 15.6715ZM8.70628 7.60428C8.70628 7.42598 8.77711 7.25499 8.90318 7.12891C9.02926 7.00284 9.20025 6.93201 9.37855 6.93201C9.55684 6.93201 9.72784 7.00284 9.85391 7.12891C9.97999 7.25499 10.0508 7.42598 10.0508 7.60428V9.33872L11.2811 10.569C11.4068 10.6957 11.4772 10.8672 11.4768 11.0457C11.4765 11.2243 11.4054 11.3954 11.2791 11.5216C11.1529 11.6479 10.9817 11.719 10.8032 11.7193C10.6246 11.7197 10.4532 11.6493 10.3264 11.5236L8.90124 10.0984C8.7779 9.96987 8.70818 9.79918 8.70628 9.62107V7.60428Z">
                                        </path>
                                        <path
                                            d="M9.37854 0.209365C9.20024 0.209365 9.02925 0.280193 8.90317 0.406267C8.7771 0.532342 8.70627 0.703335 8.70627 0.881631C8.70627 1.05993 8.7771 1.23092 8.90317 1.35699C9.02925 1.48307 9.20024 1.5539 9.37854 1.5539C11.2605 1.54612 13.0865 2.19384 14.5428 3.38583C15.9992 4.57782 16.9951 6.23969 17.3595 8.08605C17.7239 9.93241 17.4341 11.848 16.5398 13.504C15.6455 15.1599 14.2026 16.4528 12.4588 17.1606C10.715 17.8685 8.77918 17.9471 6.98374 17.3829C5.1883 16.8188 3.64531 15.6471 2.61973 14.0691C1.59415 12.4911 1.15 10.6053 1.36354 8.73548C1.57707 6.86565 2.43498 5.12852 3.78993 3.82239L3.74435 4.17009C3.72117 4.3469 3.76918 4.52568 3.87782 4.6671C3.98646 4.80852 4.14682 4.90099 4.32364 4.92417C4.50045 4.94734 4.67924 4.89933 4.82065 4.7907C4.96207 4.68206 5.05454 4.52169 5.07772 4.34487L5.33936 2.34515C5.35537 2.16962 5.30457 1.99451 5.19711 1.8548C5.08964 1.71508 4.93343 1.62105 4.75967 1.59148L2.75995 1.33003C2.6712 1.31592 2.58053 1.31974 2.49328 1.34127C2.40604 1.3628 2.324 1.40161 2.25201 1.45539C2.18002 1.50917 2.11954 1.57684 2.07415 1.6544C2.02876 1.73195 1.99938 1.81782 1.98775 1.90693C1.97612 1.99603 1.98247 2.08657 2.00643 2.17318C2.03038 2.25979 2.07146 2.34071 2.12723 2.41118C2.183 2.48164 2.25233 2.5402 2.33112 2.58341C2.40991 2.62662 2.49657 2.65359 2.58597 2.66273L3.00459 2.71759C1.3997 4.20681 0.365311 6.20977 0.0800858 8.38051C-0.20514 10.5512 0.27671 12.7534 1.44241 14.6067C2.6081 16.46 4.38444 17.8479 6.4646 18.5308C8.54476 19.2138 10.7981 19.1487 12.8354 18.347C14.8728 17.5453 16.5661 16.0573 17.623 14.1399C18.6799 12.2225 19.034 9.99617 18.6241 7.84549C18.2142 5.69482 17.0661 3.75482 15.378 2.3606C13.6899 0.966386 11.5679 0.205498 9.37854 0.209365Z">
                                        </path>
                                    </svg></span><span class="menu-bar__name">History</span></span></a></li>
                </ul>
            </div>
            <!-- End Nav Menu -->
        </div>

        <div class="admin-menu__two mg-top-50">
            <h4 class="admin-menu__title nftmax-scolor">Settings</h4>
            <!-- Nav Menu -->
            <div class="menu-bar">
                <ul class="menu-bar__one">
                    <li><a href="profile.html"><span class="menu-bar__text"><span
                                    class="nftmax-menu-icon nftmax-svg-icon__v10"><svg class="nftmax-svg-icon"
                                        viewBox="0 0 15 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.8692 11.6667H4.13085C3.03569 11.668 1.98576 12.1036 1.21136 12.878C0.436961 13.6524 0.00132319 14.7023 0 15.7975V20H15.0001V15.7975C14.9987 14.7023 14.5631 13.6524 13.7887 12.878C13.0143 12.1036 11.9644 11.668 10.8692 11.6667Z">
                                        </path>
                                        <path
                                            d="M7.49953 10C10.261 10 12.4995 7.76145 12.4995 5.00002C12.4995 2.23858 10.261 0 7.49953 0C4.7381 0 2.49951 2.23858 2.49951 5.00002C2.49951 7.76145 4.7381 10 7.49953 10Z">
                                        </path>
                                    </svg></span><span class="menu-bar__name">My Profile</span> </span></a>
                    </li>
                    <li><a href="settings.html"><span class="menu-bar__text"><span
                                    class="nftmax-menu-icon nftmax-svg-icon__v11"><svg class="nftmax-svg-icon"
                                        viewBox="0 0 14 16" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.259306 11.548C0.789972 12.469 1.96681 12.7854 2.88783 12.2548C2.88846 12.2544 2.88906 12.254 2.88969 12.2537L3.17517 12.0888C3.71408 12.5499 4.33352 12.9074 5.00231 13.1435V13.4727C5.00231 14.5356 5.86402 15.3973 6.92698 15.3973C7.98993 15.3973 8.85164 14.5356 8.85164 13.4727V13.1435C9.52052 12.9071 10.14 12.5491 10.6788 12.0875L10.9656 12.253C11.8868 12.7845 13.0645 12.4686 13.5959 11.5473C14.1274 10.6261 13.8115 9.44842 12.8902 8.91694L12.6054 8.75271C12.7336 8.05499 12.7336 7.33974 12.6054 6.64199L12.8902 6.47776C13.8114 5.94628 14.1274 4.76863 13.5959 3.84738C13.0645 2.92615 11.8868 2.61018 10.9656 3.14165L10.6801 3.30654C10.1406 2.84604 9.52076 2.48913 8.85164 2.25378V1.92467C8.85164 0.861709 7.98993 0 6.92698 0C5.86402 0 5.00231 0.861709 5.00231 1.92467V2.25378C4.33343 2.49025 3.71396 2.84823 3.17517 3.30979L2.8884 3.14364C1.96715 2.61213 0.789491 2.92811 0.258013 3.84933C-0.273465 4.77055 0.0424806 5.94824 0.963734 6.47972L1.24858 6.64394C1.12035 7.34166 1.12035 8.05692 1.24858 8.75467L0.963734 8.9189C0.0450368 9.45179 -0.269887 10.6272 0.259306 11.548ZM6.92698 5.13245C8.34425 5.13245 9.49319 6.28139 9.49319 7.69866C9.49319 9.11594 8.34425 10.2649 6.92698 10.2649C5.5097 10.2649 4.36077 9.11594 4.36077 7.69866C4.36077 6.28139 5.5097 5.13245 6.92698 5.13245Z">
                                        </path>
                                    </svg></span><span class="menu-bar__name">Settings</span></span></a></li>
                </ul>
            </div>
            <!-- End Nav Menu -->
        </div>

        <!-- Logout Button -->
        <div class="logout-button">
            <a class="nftmax-btn primary" href="#" data-bs-toggle="modal" data-bs-target="#logout_modal">
                <div class="logo-button__icon"><img src="img/logout.png" alt="#"></div><span
                    class="menu-bar__name">Salir</span>
            </a>
        </div>
    </div>
    <!-- End Admin Menu -->
</div>
@include('dashboard.modalsalir')
