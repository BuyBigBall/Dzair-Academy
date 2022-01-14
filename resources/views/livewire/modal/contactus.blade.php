<div>
    <!-- Let's also add the backdrop / overlay here -->
    <div
            class="modal-backdrop fade show"
            id="backdrop"
            style="display: @if($show === true)
                                    block
                            @else
                                    none
                            @endif;"></div>
    <!-- Modal -->
    <div class="modal fade @if($show === true) show @endif"
            style="display: @if($show === true) block @else none @endif;" 
            id="exampleModal" tabindex="-1" role="dialog" 
            aria-labelledby="exampleModalLabel" 
            aria-hidden="true">
        <div class="modal-dialog" role="document" style="margin-top:6rem;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ translate('Contact Us') }}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"
                        wire:click.prevent="doClose()">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="contact" action="{{ route('save-contact') }}" 
                        onsubmit="contactSend(event)"
                        method="post">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 py-1">
                                <fieldset>
                                    <input name="name" 
                                        wire:model="fulllname"
                                        type="text" class="form-control" id="name" placeholder="Full Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 py-1">
                                <fieldset>
                                    <input name="email" 
                                        wire:model="email"
                                        type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
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
                    </form>
                </div>
            </div>
        </div>
    </div>
<script>
    function contactSend(e)
    {
        e.preventDefault();
        window.livewire.emit('save', '');
    }
    
    //wire:click.prevent="save()"
</script>
    
</div>