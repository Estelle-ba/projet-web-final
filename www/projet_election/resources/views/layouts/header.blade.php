<header style="box-shadow: rgba(0, 0, 0, 0.4) 0px 60px 40px -7px; padding:10px; position: fixed; background-color: white; width:100%">
    <div >
        <div></div>
        <div>
            <div style="display:flex; flex-direction: row; width:100%">
                @auth
                <div>
                    <a class="fusion-logo-link"  href="{{route('login')}}" >
                        <!-- connection logo -->
                        <img decoding="async"
                             src="https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img,w_150,h_80/https://codingfactory.fr/wp-content/uploads/2023/10/Untitled-design-12.jpg"
                             width="150" height="80" alt="Coding Factory by ESIEE-IT Logo"/>
                    </a>
                </div>
                <div style="display: flex; width:100%;">
                    <form style="width:100%" method="Post" action="{{route('accountlogout')}}" >
                        @csrf
                        <!-- standard logo -->
                        <button type="submit" style="background-color: white; border:white; float:right; margin-right: 20px">
                            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fpngimg.com%2Fuploads%2Fexit%2Fexit_PNG45.png&f=1&nofb=1&ipt=291f7db923bd2bb30a13fd070b125b7281862c01898103e8ea62ede61b8c646b"
                                 width="80" height="80" alt="Se connecter">
                        </button>
                    </form>
                </div>
                @endauth
                @guest
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
                @endguest
            </div>
        </div>
    </div>
    <div></div>
</header>

