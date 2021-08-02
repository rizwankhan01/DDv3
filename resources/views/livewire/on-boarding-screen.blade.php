<div>
  @if(auth()->user()->onBoarding!==0)
  <div class="col-lg-12" style="z-index:2000">
      <div class="modal fade" id="onboardingScreens" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                  <div class="modal-header bg-white border-0">
                      <button wire:click="onBoardingScreen" type="button" class="close text-muted" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body border-0">
                      <div id="onboard-screen" class="onboard-screen">
                          <!--<div class="onboard-screen-list">
                              <img src="assets/images/ui-onboard/responsive.svg" class="img-fluid" alt="onboard">
                              <h5 class="card-title my-4">Highly Responsive</h5>
                              <p class="text-muted">Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                          </div>
                          <div class="onboard-screen-list">
                              <img src="assets/images/ui-onboard/customisable.svg" class="img-fluid" alt="onboard">
                              <h5 class="card-title my-4">Customisable</h5>
                              <p class="text-muted">Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
                          </div>-->
                          <div class="onboard-screen-list">
                              <img src="assets/images/ui-onboard/easily-editable-code.svg" class="img-fluid" alt="onboard">
                              <h5 class="card-title my-4">Your Digital Mobile Repair Station</h5>
                              <p class="text-muted">Your journey with Doctor Display starts here. All your Orders, Tickets, Leads, Leaves and everything in between will be accessible here.</p>
                          </div>
                          <div class="onboard-screen-list">
                              <iframe width="560" height="315" src="https://www.youtube.com/embed/rTzhLkHC9yA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                              <h5 class="card-title my-4">A Message from CEO.</h5>
                              <p class="text-muted">~ Rizwan Khan</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  @endif
</div>
