@extends('layouts.crm')
@section('title') My Mails | Doctor Display Dashboard @endsection

@section('contentbar')
  <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">
        <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
          <h6>New Message</h6> <a href="javascript:void(0)" id="infobar-settings-close"><i class="feather icon-x"></i></a>
        </div>
        <div class="infobar-settings-sidebar-body">
            <div class="custom-mode-setting">
                <div class="row pb-3">
                  <div class="card m-b-30 col-12">
                            <div class="card-body">
                                <form>
                                    <div class="form-group row">
                                        <label for="emailTo" class="col-sm-2 col-form-label">To</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="emailTo" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="emailCc" class="col-sm-2 col-form-label">CC</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="emailCc" placeholder="CC">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="emailBcc" class="col-sm-2 col-form-label">BCC</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="emailBcc" placeholder="BCC">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="emailSubject" class="col-sm-2 col-form-label">Subject</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="emailSubject" placeholder="Subject">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="emailSubject" class="col-sm-2 col-form-label">Message</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="Greetings for the day!!"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row text-right">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary-rgba my-1"><i class="feather icon-send mr-2"></i>Send</button>
                                            <button type="submit" class="btn btn-success-rgba my-1"><i class="feather icon-save mr-2"></i>Save</button>
                                            <button type="submit" class="btn btn-danger-rgba my-1"><i class="feather icon-trash mr-2"></i>Delete</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="infobar-settings-sidebar-overlay"></div>
  <div class="contentbar mt-100">
      <!-- Start row -->
      <div class="row">
        <div class="col-lg-3">
            <div class="email-leftbar">
                <div class="card m-b-30">
                    <div class="card-header text-center">
                        <a href="javascript:void(0)" id="infobar-settings-open" class="btn btn-danger-rgba btn-lg btn-block py-2 px-0 font-18"><i class="feather icon-plus mr-2"></i>Compose</a>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#" class="active"><i class="feather icon-inbox mr-2"></i>Inbox</a>
                                <span class="badge badge-primary-inverse text-primary">9</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#"><i class="feather icon-star mr-2"></i>Starred</a>
                                <span class="badge badge-secondary-inverse">2</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#"><i class="feather icon-clock mr-2"></i>Snoozed</a>
                                <span class="badge badge-secondary-inverse">3</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#"><i class="feather icon-send mr-2"></i>Sent</a>
                                <span class="badge badge-secondary-inverse">4</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#"><i class="feather icon-file mr-2"></i>Drafts</a>
                                <span class="badge badge-secondary-inverse">5</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#"><i class="feather icon-award mr-2"></i>Important</a>
                                <span class="badge badge-secondary-inverse">6</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#"><i class="feather icon-alert-octagon mr-2"></i>Spam</a>
                                <span class="badge badge-secondary-inverse">7</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <a href="#"><i class="feather icon-trash mr-2"></i>Trash</a>
                                <span class="badge badge-secondary-inverse">8</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <!-- Start col -->
        <div class="col-lg-9">
            <div class="email-rightbar">
                <div class="card m-b-30">
                    <div class="card-header">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><i class="feather icon-square font-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="feather icon-download font-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="feather icon-alert-octagon font-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="feather icon-trash font-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="feather icon-clock font-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="feather icon-folder font-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="feather icon-tag font-20"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="feather icon-more-vertical- font-20"></i></a></li>
                            <li class="list-inline-item float-right"><a href="#"><i class="feather icon-settings font-20"></i></a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless">
                                <tbody>
                                    <tr class="email-unread">
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck1">
                                                <label class="custom-control-label psn-abs" for="emailCheck1"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="#">Yes Bank Limited</a></td>
                                        <td><span class="badge badge-success-inverse mr-2">New</span>One Time Password for EVC signature
                                            <p class="mt-1 mb-0 font-14">This mail is in reference to the Returns & GSTR3B. Your One Time Password (OTP)  </p></td>
                                        <td>02:05 PM</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck2">
                                                <label class="custom-control-label psn-abs" for="emailCheck2"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="#">Google</a></td>
                                        <td>Welcome to Google - Thank you for beign part of us <p class="mt-1 mb-0 font-14">Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p></td>
                                        <td>08:20 AM</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck3">
                                                <label class="custom-control-label psn-abs" for="emailCheck3"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="#">Amazon</a></td>
                                        <td>Register Now and Start Selling on Amazon.in</td>
                                        <td>Sep 05</td>
                                    </tr>
                                    <tr class="email-unread">
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck4">
                                                <label class="custom-control-label psn-abs" for="emailCheck4"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="#">Twitter</a></td>
                                        <td>Welcome to Twitter - Thank you for beign part of us</td>
                                        <td>Sep 03</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck5">
                                                <label class="custom-control-label psn-abs" for="emailCheck5"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star-on font-18"></i></td>
                                        <td><a href="#">Youtube</a></td>
                                        <td><span class="badge badge-primary-inverse mr-2">Social</span> Welcome to Youtube - Thank you for beign part of us</td>
                                        <td>Sep 02</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck6">
                                                <label class="custom-control-label psn-abs" for="emailCheck6"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="#">MaxBupa </a></td>
                                        <td>Health Coverage upto 1 Crore.!</td>
                                        <td>Aug 26</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck7">
                                                <label class="custom-control-label psn-abs" for="emailCheck7"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="#">KredX </a></td>
                                        <td>Introducing A Hassle-Free Working Capital Solution For Your Business</td>
                                        <td>Aug 09</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck8">
                                                <label class="custom-control-label psn-abs" for="emailCheck8"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star-on font-18"></i></td>
                                        <td><a href="#">Swiggy</a></td>
                                        <td>What’s Sunday without biryani? 😋</td>
                                        <td>July 22</td>
                                    </tr>
                                    <tr class="email-unread">
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck9">
                                                <label class="custom-control-label psn-abs" for="emailCheck9"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="#">Instant Approval</a></td>
                                        <td><span class="badge badge-danger-inverse mr-2">Support</span> Need Quick Money? Get Loan up to 2 Lacs Today
                                            </td>
                                        <td>July 03</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emailCheck10">
                                                <label class="custom-control-label psn-abs" for="emailCheck10"></label>
                                            </div>
                                        </td>
                                        <td><i class="feather icon-star font-18"></i></td>
                                        <td><a href="#">Pinterest </a></td>
                                        <td>Save your ideas about Business Trip</td>
                                        <td>June 20</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6 col-md-6 align-self-center">
                                <div class="email-show-label">
                                    <span> Show : 1 - 10 of 590</span>
                                </div>
                            </div>
                            <div class="col-6 col-md-6 align-self-center">
                                <div class="email-pagination float-right">
                                  <ul class="pagination mb-0">
                                    <li class="page-item">
                                      <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                    </li>
                                    <li class="page-item">
                                      <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                    </li>
                                  </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- End row -->
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('assets\js\jquery.min.js') }}"></script>
  <script src="{{ asset('assets\js\popper.min.js') }}"></script>
  <script src="{{ asset('assets\js\bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets\js\modernizr.min.js') }}"></script>
  <script src="{{ asset('assets\js\detect.js') }}"></script>
  <script src="{{ asset('assets\js\jquery.slimscroll.js') }}"></script>
  <script src="{{ asset('assets\js\vertical-menu.js') }}"></script>
  <!-- Switchery js -->
  <script src="{{ asset('assets\plugins\switchery\switchery.min.js') }}"></script>

  <script src="{{ asset('assets\plugins\pnotify\js\pnotify.custom.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\sweet-alert2\sweetalert2.min.js') }}"></script>
  <!-- Core js -->
  <script src="{{ asset('assets\js\core.js') }}"></script>
@endsection
