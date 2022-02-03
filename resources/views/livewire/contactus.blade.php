@if (empty(Auth::id()))
  <style>
      .top-gap{
        margin-top: 8rem !important;
      }
      @media (min-width: 992px) {
        .top-gap{
          margin-top: 6rem !important;
        }
      }
  </style>
@endif
  
  <main class="body-content top-gap">
   <div class="{{ !empty(Auth::user()) ? 'container-fluid' : 'container' }} py-4">
     <div class="row">
       <div class="col-md-12">
         <div class="card">
           <div class="card-header">
             <div class="row">
               <div class="col-md-4 col-sm-6  d-flex align-items-center justify-content-start">
                 <h4 class="title">{{ translate('Contact us')}}</h4>
               </div>
               <div class="col-md-8 col-sm-6 p-1 d-none d-md-block" style='min-height:60px;'>
                {!! topAdvertise() !!}
                </div>
             </div>
           </div>
           <style>
             .click-here
             {
               color:#000099;
             }
           </style>
           <div class="card-body p-3">
             <form wire:submit.prevent="sendmessage">
               @csrf
               <div class="row">
                 <div class="col-md-9 col-sm-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 py-1">
                            <fieldset>
                                <input name="name" 
                                    wire:model="fullname"
                                    type="text" class="form-control" id="name" placeholder="Full Name">
                            </fieldset>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 py-1">
                            <fieldset>
                                <input name="email" 
                                    wire:model="email"
                                    type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="{{ translate('EMail Address') }}" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 py-1">
                            <fieldset>
                                <input name="subject" 
                                    wire:model="subject"
                                    type="text" class="form-control" id="name" placeholder="Subject" required="">
                            </fieldset>
                        </div>
                        <div class="col-lg-12 py-1">
                            <fieldset>
                                <textarea name="message" 
                                    wire:model="msg"
                                    rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                            </fieldset>
                        </div>
                        <div class="col-lg-12 py-1">
                            <fieldset>
                                <button type="submit" class="btn btn-primary"
                                >{{ translate('Send Message') }}</button>
                            </fieldset>
                        </div>
                        
                    </div>
                   
                 </div>
                 <div class="col-md-3 text-center d-flex justify-content-start align-items-start d-none d-sm-block">
                                <div class="w-100" style="min-height:50vh;overflow-x:hidden;">
                                    {!! rightAdvertise() !!}
                                </div>
                            </div>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </main>
