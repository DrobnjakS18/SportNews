<footer class="footer footer-main ">
  @auth
        @if(Auth::user()->role->name === "user")
            <div class="loading" delay-hide="50000"></div>
            <div class="modal fade" id="modalUserAccount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <img class="img-fluid user-profile-image ml-4" src="{{Auth::user()->profile_picture}}"  data-user-id="{{Auth::id()}}"  alt="profile">
                                        <a href="#" class="text-dark modal-update-image"><i class="fa fa-camera"></i></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="modal-text">
                                            <h4 class="pt-3 text-dark font-weight-bold user-modal-name">{{Auth::user()->name}}</h4>
                                            <p>{{Auth::user()->email}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body mx-3">
                            <form id="modalUserForm">
                                <div class="input-group mb-5">
                                    <label class="w-100" data-error="wrong" data-success="right" for="modalUpdateName">Your Name</label>
                                    <input type="text" id="modalUpdateName" class="form-control validate text-right" value="{{Auth::user()->name}}" readonly autocomplete="on">
                                    <button class="modal-update-button modal-name"><span class="input-group-addon"><i class="fa fa-edit"></i></span></button>
                                    <div class="modal-error error-name"></div>
                                </div>
                                <div class="input-group mb-4">
                                    <label class="w-100" data-error="wrong" data-success="right" for="modalUpdatePassClick">Your password</label>
                                    <input type="password" id="modalUpdatePassClick" class="form-control validate text-right" value="..........." readonly autocomplete="off">
                                    <button class="modal-update-button modal-pass"><span class="input-group-addon"><i class="fa fa-edit"></i></span></button>
                                </div>
                                <div class="input-group  modal-update-password mb-4 d-none">
                                    <label class="w-100" data-error="wrong" data-success="right" for="modalUpdatePassNew">New Password</label>
                                    <input type="password" id="modalUpdatePassNew" class="form-control validate" placeholder="Insert new password" autocomplete="off">
                                    <button class="modal-update-button modal-pass" disabled><span class="input-group-addon"></span></button>
                                </div>
                                <div class="input-group modal-update-password mb-4 d-none">
                                    <label class="w-100" data-error="wrong" data-success="right" for="modalUpdatePassConfirm">Confirm password</label>
                                    <input type="password" id="modalUpdatePassConfirm" class="form-control validate" placeholder="Confirm new password" autocomplete="off">
                                    <button class="modal-update-button modal-pass" disabled><span class="input-group-addon"></span></button>
                                    <div class="modal-error error-password"></div>
                                </div>
                                <input type="hidden" id="userModalId" value="{{Auth::id()}}">
                                <input type="hidden" id="userModalRoleId" value="{{Auth::user()->role_id}}">
                            </form>
                        </div>
                        <div class="modal-footer d-flex justify-content-center">
                            <button class="btn modal-user-save" id="modalUserSave">Save</button>
                        </div>
                        <div class="mx-auto">
                            <p class="modal-update-success"></p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
      @endauth

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 col-lg-6 text-center">
                <a href="{{route('home')}}"><img src="{{asset('images/footer-logo.png')}}" alt="Sport News logo" class="footer-logo"></a>
                <p class="mt-4">We perfectly balances the simplicity of a clean, eye-catching blog with the flexibility to create unique page layouts.</p>

                <ul class="list-inline footer-social">
                    <li class="li list-inline-item">
                        <button class="button" data-sharer="facebook"  data-url="https://sportnewsmag.com/"><i class="fa fa-facebook"></i></button>
                    </li>
                    <li class="li list-inline-item">
                        <button class="button" data-sharer="twitter" data-title="Sports News" data-url="https://sportnewsmag.com/"><i class="fa fa-twitter"></i></button>
                    </li>
                    <li class="li list-inline-item">
                        <button class="button" data-sharer="linkedin" data-url="https://sportnewsmag.com/"><i class="fa fa-linkedin"></i></button>
                    </li>
                    <li class="li list-inline-item">
                        <button class="button" data-sharer="pinterest" data-url="https://sportnewsmag.com/"><i class="fa fa-pinterest"></i></button>
                    </li>
                    <li class="li list-inline-item">
                        <button class="button" data-sharer="email" data-title="Sports News" data-url="https://sportnewsmag.com/" data-subject="Sports News" data-to=""><i class="fa fa-envelope"></i></button>
                    </li>
                </ul>

                <div class="copyright-text text-center">
                    <p class="mb-0">© All Copyright Reserved to - <span class="text-light">Stefan Drobnjak</span></p>
                </div>
            </div>

            <div class="scroll-to-top">
                <button class="btn btn-secondary btn-lg" title="Back to Top">
                    <i class="fa fa-angle-up"></i>
                </button>
            </div>
        </div>
    </div>
</footer>
