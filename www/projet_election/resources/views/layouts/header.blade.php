{{--The header when the user is connected--}}
@auth
    <header class="header_home">
        <div class="icons">

            <!-- Home logo -->
            <a href="{{route('login')}}" >
                <img class="img_computer" decoding="async"
                     src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.licdn.com%2Fdms%2Fimage%2Fv2%2FD4E0BAQG5ExMYDECh5A%2Fcompany-logo_200_200%2Fcompany-logo_200_200%2F0%2F1727422512214%2Fcoding_factory_esiee_it_logo%3Fe%3D2147483647%26v%3Dbeta%26t%3Dv6Rl30Vikct3aiZ_MvjYzsMzZ0enLeHpqW_-6ZHwKi4&f=1&nofb=1&ipt=f989dde994942728a1ad7c083efd0329ef68933f53cef4d6dc6e2e286dcf49d1"
                     alt="Coding Factory by ESIEE-IT Logo"/>
                <img class="img_phone" decoding="async"
                     src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Flogodix.com%2Flogo%2F1633508.png&f=1&nofb=1&ipt=9864e6db1aa17e99b43f2306c116c08915c2e4d673f478598ad677b2d3fcf7c8"
                     alt="Logo Home"/>
            </a>
            <div class="menu">

                <!--  Timetable logo -->
                <a href="{{route('login')}}" >
                    <div class="img_computer">
                        <img decoding="async"
                             src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwebstockreview.net%2Fimages%2Fcalendar-icon-png-transparent-3.png&f=1&nofb=1&ipt=5f588ef96c2fefb89773e64fbf63dac1f53e7cb92291da0129f17fcf705eed1f"
                             alt="Logo Home"/>
                        <p>Emploi du temps</p>
                    </div>
                    <img class="img_phone" decoding="async"
                         src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwebstockreview.net%2Fimages%2Fcalendar-icon-png-transparent-3.png&f=1&nofb=1&ipt=5f588ef96c2fefb89773e64fbf63dac1f53e7cb92291da0129f17fcf705eed1f"
                         alt="Logo Home"/>
                </a>

                <!-- On verra logo -->
                <a href="{{route('login')}}" >
                    <div class="img_computer">
                        <img decoding="async"
                             src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn-icons-png.flaticon.com%2F512%2F0%2F827.png&f=1&nofb=1&ipt=f37bad672cd3a6d962e00a36125286934fe09b50f1e3dccff3bc24e43959a517"
                             alt="Logo Home"/>
                        <p>On verra</p>
                    </div>
                    <img class="img_phone" decoding="async"
                         src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn-icons-png.flaticon.com%2F512%2F0%2F827.png&f=1&nofb=1&ipt=f37bad672cd3a6d962e00a36125286934fe09b50f1e3dccff3bc24e43959a517"
                         alt="Logo Home"/>
                </a>

                <!-- On verra logo -->
                <a href="{{route('login')}}" >
                    <div class="img_computer">
                        <img decoding="async"
                             src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn-icons-png.flaticon.com%2F512%2F0%2F827.png&f=1&nofb=1&ipt=f37bad672cd3a6d962e00a36125286934fe09b50f1e3dccff3bc24e43959a517"
                             alt="Logo Home"/>
                        <p>On verra</p>
                    </div>
                    <img class="img_phone" decoding="async"
                         src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn-icons-png.flaticon.com%2F512%2F0%2F827.png&f=1&nofb=1&ipt=f37bad672cd3a6d962e00a36125286934fe09b50f1e3dccff3bc24e43959a517"
                         alt="Logo Home"/>
                </a>

                <!-- Common Life logo -->
                @can('isStudent')
                    {{--Change the route of the classroom if the user is a student or not--}}
                    <a href="{{route('election.index')}}" >
                        <div class="img_computer">
                            <img decoding="async"
                                 src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F010%2F159%2F990%2Fnon_2x%2Fpeople-icon-sign-symbol-design-free-png.png&f=1&nofb=1&ipt=0d8e52b7ccda88f0176d59c1783a55c9933ca93e7222cf3c694b9c8b0f620a85"
                                 alt="Logo Home"/>
                            <p>Vie de classe</p>
                        </div>
                        <img class="img_phone" decoding="async"
                             src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F010%2F159%2F990%2Fnon_2x%2Fpeople-icon-sign-symbol-design-free-png.png&f=1&nofb=1&ipt=0d8e52b7ccda88f0176d59c1783a55c9933ca93e7222cf3c694b9c8b0f620a85"
                             alt="Logo Home"/>
                    </a>
                @else
                    <a href="{{route('classroom-manager')}}" >
                        <div class="img_computer">
                            <img decoding="async"
                                 src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F010%2F159%2F990%2Fnon_2x%2Fpeople-icon-sign-symbol-design-free-png.png&f=1&nofb=1&ipt=0d8e52b7ccda88f0176d59c1783a55c9933ca93e7222cf3c694b9c8b0f620a85"
                                 alt="Logo Home"/>
                            <p>Vie de classe</p>
                        </div>
                        <img class="img_phone" decoding="async"
                             src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fstatic.vecteezy.com%2Fsystem%2Fresources%2Fpreviews%2F010%2F159%2F990%2Fnon_2x%2Fpeople-icon-sign-symbol-design-free-png.png&f=1&nofb=1&ipt=0d8e52b7ccda88f0176d59c1783a55c9933ca93e7222cf3c694b9c8b0f620a85"
                             alt="Logo Home"/>
                    </a>
                @endcan

                <!-- Account logo -->
                <a href="{{route('account')}}" >
                    {{--Take the user's profile picture or put a default one if there's no one--}}
                    @if($picture == null)
                        <img class="img_computer" style="border-radius: 100%;" decoding="async"
                            src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.istockphoto.com%2Fvectors%2Fvector-illustration-male-silhouette-profile-picture-with-question-on-vector-id937695038%3Fk%3D20%26m%3D937695038%26s%3D170667a%26w%3D0%26h%3DVwqo48FSEf_hE_ZaESBiEGH6YCbq7n7y6opPpWr1lzg%3D&f=1&nofb=1&ipt=81847cb771d101797b29929664a5ed1b57ef0716efecff7475bb51e2f44d352e"
                            alt=""/>
                        <img class="img_phone" style="border-radius: 100%;" decoding="async"
                             src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.istockphoto.com%2Fvectors%2Fvector-illustration-male-silhouette-profile-picture-with-question-on-vector-id937695038%3Fk%3D20%26m%3D937695038%26s%3D170667a%26w%3D0%26h%3DVwqo48FSEf_hE_ZaESBiEGH6YCbq7n7y6opPpWr1lzg%3D&f=1&nofb=1&ipt=81847cb771d101797b29929664a5ed1b57ef0716efecff7475bb51e2f44d352e"
                             alt=""/>
                    @else()
                        <img class="img_computer" style="border-radius: 100%;" decoding="async"
                            src="{{asset('storage/' . $picture->image)}}"
                            alt=""/>
                        <img class="img_phone" style="border-radius: 100%;" decoding="async"
                             src="{{asset('storage/' . $picture->image)}}"
                             alt=""/>
                    @endif
                </a>

            </div>
        </div>
    </header>
    <div class="space_home"></div>
@endauth


{{--The header when the user is not connected--}}
@guest
    <header class="header_welcome">
        <div >
            <div></div>
            <div>
                <div style="display:flex; flex-direction: row; width:100%">

                        <div>
                            <a class="fusion-logo-link"  href="{{route('/')}}" >
                                <!-- connection logo -->
                                <img decoding="async"
                                     src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_150,h_80/https://codingfactory.fr/wp-content/uploads/2023/10/Untitled-design-12.jpg"
                                     width="150" height="80" alt="Coding Factory by ESIEE-IT Logo"/>
                            </a>
                        </div>
                        <div style="display: flex; width:100%;">
                            <a style="width:100%" href="{{route('login')}}" >
                                <!-- standard logo -->
                                <img style="float:right; margin-right: 20px"
                                     src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ficon-library.com%2Fimages%2Flogin-icon-images%2Flogin-icon-images-0.jpg&f=1&nofb=1&ipt=6efc5f90577cf528a6387fe48c9508b067fd54b0869bde8bd922e20bb8ea2b09"
                                     width="80" height="80" alt="Se connecter"/>
                            </a>
                        </div>

                </div>
            </div>
        </div>
    </header>
    <div class="space_welcome"></div>
@endguest
